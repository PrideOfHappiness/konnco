<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function createPayment(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);
        
        // Atur parameter untuk pembayaran Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => $order->id,
                'gross_amount' => $order->hargaPesanan,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ],
        ];

        // Buat URL transaksi pembayaran dengan Midtrans Snap
        $snapToken = Snap::getSnapToken($params);
        
        return view('payment.checkout', compact('snapToken', 'order'));
    }

    public function handlePaymentNotification(Request $request)
    {
        $serverKey = env('MIDTRANS_SERVER_KEY');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);

        if ($hashed === $request->signature_key && $request->transaction_status === 'settlement') {
            DB::beginTransaction();
            try {
                $order = Order::findOrFail($request->order_id);
                $order->update(['status' => 'completed']);

                foreach ($order->orderItems as $item) {
                    $product = $item->getProductID;
                    $product->stokProduk -= $item->qty;
                    $product->save();
                }

                Payments::create([
                    'idOrder' => $order->id,
                    'payment_status' => 'paid',
                    'transaction_id' => $request->transaction_id,
                    'payment_method' => $request->payment_type,
                ]);

                DB::commit();
                return redirect()->route('order.success')->with('success', 'Pembayaran berhasil!');
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['error' => 'Pembayaran gagal diproses'], 500);
            }
        }
    }
}
