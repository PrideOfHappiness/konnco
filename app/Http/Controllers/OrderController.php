<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function checkout(Request $request){ 
        $cartItems = $request->input('cart');  // pastikan data 'cart' terambil

        DB::beginTransaction();
        try {
            $order = Order::create([
                'idUser' => auth()->id(),
                'status' => 'pending',
                'hargaPesanan' => 0,
            ]);
    
            $totalPrice = 0;
            foreach ($cartItems as $item) {
                $product = Produk::findOrFail($item['product_id']);
                
                if ($product->stokProduk < $item['quantity']) {
                    throw new \Exception("Stok untuk produk {$product->namaProduk} tidak mencukupi.");
                }
    
                $orderItem = OrderItems::create([
                    'idOrder' => $order->id,
                    'productID' => $product->id,
                    'hargaPesan' => $product->harga,
                    'qty' => $item['quantity'],
                ]);
    
                $totalPrice += $product->harga * $item['quantity'];
            }
    
            $order->update(['hargaPesanan' => $totalPrice]);
            
            DB::commit();
    
            return response()->json(['order_id' => $order->id, 'total_price' => $totalPrice], 200);
    
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 400);
        }
    } 
}
