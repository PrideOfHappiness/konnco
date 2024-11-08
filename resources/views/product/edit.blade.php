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
                <form action="{{route('product.update', $data->id) }}" method="post" enctype="multipart/form-data"> 
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="namaBarang" class="form-label">Nama Barang</label>
                        <input type="text" name="namaBarang" id="namaBarang" class="form-control" value="{{$data->namaProduk}}">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control">{{$data->description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Barang</label>
                        <input type="number" name="harga" id="harga" class="form-control" value="{{$data->harga}}">
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" name="stok" id="stok" class="form-control" value="{{$data->stokProduk}}">
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-control">Jenis Pengguna</label>
                        <select class="form-control" name="status" placeholder="Pilih Jenis Pengguna">
                            <option value="{{$data->statusProduk}}">{{$data->statusProduk}}</option>
                            <option value="Admin">Active</option>
                            <option value="Customer">Inactive</option>
                        </select>
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