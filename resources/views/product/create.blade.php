<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data produk</title>
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
                <form action={{route('product.store') }} method="post" enctype="multipart/form-data"> 
                    @csrf
                    <div class="mb-3">
                        <label for="namaBarang" class="form-label">Nama Barang</label>
                        <input type="text" name="namaBarang" id="namaBarang" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Barang</label>
                        <input type="number" name="harga" id="harga" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" name="stok" id="stok" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="fotoBarang" class="form-label">Foto Barang</label>
                        <input type="file" class="form-control" id="fotoBarang" name="fotoBarang">
                    </div>
                    <button type="submit" class="btn btn-primary">Unggah Data</button>
                </form>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>
</html>