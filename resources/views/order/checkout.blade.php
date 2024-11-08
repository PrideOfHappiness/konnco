<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Checkout</title>
</head>
<body>
    @include('template/navbar')
    <div class="container">
        <h2>Checkout</h2>
        <p>Silakan periksa pesanan Anda sebelum melanjutkan ke pembayaran.</p>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>Rp {{ $item['price'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>Rp {{ $item['price'] * $item['quantity'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p><strong>Total: Rp {{ $total }}</strong></p>
        <form action="{{ route('payment') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Lanjutkan ke Pembayaran</button>
        </form>
    </div>
</body>
</html>