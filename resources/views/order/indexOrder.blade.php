<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Jenis Kendaraan</title>
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
                <br>
        
                <table class="table">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Qty</th>
                        <th>Harga Satuan</th>
                        <th>Harga Total</th>
                        <th>Status Pesanan</th>
                    </tr>
                    </thead>
                    <tbody> 
                        @php $i = 1 @endphp
                        @foreach ($data as $wilayah)
                        <tr>
                            <td>{{ $i++ }} </td>
                            <td>{{ $wilayah->getProductID->namaProduk }} </td>
                            <td>{{ $wilayah->qty }} </td>
                            <td>{{ $wilayah->hargaPesan }} </td>
                            <td>{{ $wilayah->getOrderID->hargaPesanan }} </td>
                            <td>{{ $wilayah->getOrderID->status }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>