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
                @php
                    $count = 0;
                @endphp
                @foreach($data as $dataItem)
                    @php
                        $count++;
                        $foto = $dataItem->setFotoproduk->first();
                        $fotoPath = $foto ? asset('foto/' . $foto->namaFile) : asset('foto/default.png');
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
                                    <a href="{{ route('showProduct', $dataItem->id)}}" class="btn btn-primary">Lihat Detail</a>
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