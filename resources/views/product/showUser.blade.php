<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data produk</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')

    <div class="container">
        <div class="mt-2"> 
            <section class="content"> 
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                    <div class="mb-3">
                        <label for="namaBarang" class="form-label">Nama Barang</label>
                        <input type="text" name="namaBarang" id="namaBarang" class="form-control" value="{{$data->namaProduk}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" readonly>{{$data->description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Barang</label>
                        <input type="number" name="harga" id="harga" class="form-control" value="{{$data->harga}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" name="stok" id="qty" class="form-control" min="1" max="{{ $data->stokProduk }}" value="1">
                    </div>
                    <button type="button" class="btn btn-primary" onclick="addToCart({{ $data->id }}, '{{ $data->namaProduk }}', {{ $data->harga }})">Tambah Ke Keranjang</button>
            </section>
        </div>
    </div>
    @include('template/footer')
    <script>
        function addToCart(productId, productName, productPrice) {
            const quantity = document.getElementById('qty').value;

            // Ambil data cart dari local storage
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            // Cek apakah item sudah ada di keranjang
            const existingItem = cart.find(item => item.product_id === productId);
            if (existingItem) {
                existingItem.quantity = parseInt(existingItem.quantity) + parseInt(quantity);
            } else {
                cart.push({
                    product_id: productId,
                    name: productName,
                    price: productPrice,
                    quantity: parseInt(quantity)
                });
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            alert('Item ditambahkan ke keranjang');

            fetch('/checkout', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ cart })
            })
            .then(response => response.json())
            .then(data => {
                if (data.order_id) {
                    alert('Item berhasil ditambahkan dan order dibuat dengan ID: ' + data.order_id);
                } else {
                    alert('Gagal menambah item ke keranjang');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menambah item ke keranjang');
            });
        }

        function checkout() {
            // Ambil data keranjang dari localStorage
            const cart = JSON.parse(localStorage.getItem('cart'));

            // Kirim data keranjang ke server
            fetch('/checkout', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ cart: cart })
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                    alert('Checkout berhasil');
                    localStorage.removeItem('cart');
                    window.location.href = '/order/success';
                }
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
</body>
</html>