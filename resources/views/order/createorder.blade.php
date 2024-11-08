<!DOCTYPE html>
<html lang="en">
<head>
    <title>Checkout</title>
    @include('template/header')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')
    <h3>Checkout</h3>
    <p>Total Harga: Rp. {{ number_format($order->hargaPesanan) }}</p>

    <button id="pay-button">Bayar Sekarang</button>

    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function () {
            snap.pay("{{ $snapToken }}", {
                onSuccess: function(result){
                    alert("Pembayaran berhasil!");
                    window.location.href = "/order/confirmation";
                },
                onPending: function(result){
                    alert("Menunggu pembayaran.");
                },
                onError: function(result){
                    alert("Pembayaran gagal!");
                }
            });
        };
    </script>
</body>
</html>