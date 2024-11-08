<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Mobil</title>
    <style>
        .card {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')

    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif 
        <div class="mt-4"> 
            <section class="content"> 
                <h4>Inventori Produk</h4>
                <br>
                <div class = "pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('product.create')}}"> 
                        <i class="fa-solid fa-plus"></i>
                            Tambah Data Produk
                    </a>
                </div>
        
                @php
                    $count = 0;
                @endphp
                @foreach($data as $dataItem)
                    @php
                        $count++;
                    @endphp
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <img src="{{ asset('foto/default.png') }}" class="card-img-top" alt="namaMobil">
                                <div class="card-body">
                                    <h5 class="card-title">{{$dataItem->namaProduk}}</h5>
                                    <p class="card-text">Total Stok {{$dataItem->stokProduk}}</p>
                                    <p class="card-text">Harga: Rp. {{$dataItem->harga}}</p>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('product.show', $dataItem->id)}}" class="btn btn-primary">Lihat Detail</a>
                                    <a href="{{ route('product.edit', $dataItem->id)}}" class="btn btn-success">Ubah Data</a>
                                    <a href="{{ route('product.destroy', $dataItem->id)}}" class="btn btn-danger">Hapus Data</a>

                                </div>
                            </div>
                            @if($count % 3 == 0)
                            <br>
                            @endif
                        </div>
                    </div>
                @endforeach
</body>
@include('template/footer')
</html>