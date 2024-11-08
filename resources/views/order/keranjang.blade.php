<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Keranjang Belanja</title>
</head>
<body>
    @include('template/navbar')
    <div class="container">
        <h2>Keranjang Belanja</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody id="cart-items"></tbody>
        </table>
        <form action="{{ route('checkout') }}" method="POST" onsubmit="sendCartData(event)">
            @csrf
            <button type="submit" class="btn btn-success">Lanjutkan ke Checkout</button>
        </form>
    </div>

    <script>
        function loadCart() {
            const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
            let cartHTML = '';
            let total = 0;
            cartItems.forEach(item => {
                const subtotal = item.price * item.quantity;
                total += subtotal;
                cartHTML += `
                    <tr>
                        <td>${item.name}</td>
                        <td>Rp ${item.price}</td>
                        <td>${item.quantity}</td>
                        <td>Rp ${subtotal}</td>
                    </tr>
                `;
            });
            document.getElementById('cart-items').innerHTML = cartHTML;
        }

        function sendCartData(event) {
            event.preventDefault();
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const form = event.target;
            const cartInput = document.createElement('input');
            cartInput.type = 'hidden';
            cartInput.name = 'cart';
            cartInput.value = JSON.stringify(cart);
            form.appendChild(cartInput);
            form.submit();
        }

        loadCart();
    </script>
</body>
</html>