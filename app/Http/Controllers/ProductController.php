<?php

namespace App\Http\Controllers;

use App\Models\FotoProduk;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $data = Produk::with('setFotoproduk')->get();
        // $data = Produk::where('stokProduk', '>', 0)->where('statusProduk', 'Active')->get();
        return view('product.index', compact('data'));
    }
    public function indexUser(){
        $data = Produk::where('stokProduk', '>', 0)->where('statusProduk', 'Active')
            ->with('setFotoproduk')->get();
        return view('product.indexUser', compact('data'));
    }

    public function create(){
        return view('product.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'namaBarang' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'fotoBarang' => 'max:2048|mimes:jpg,png,jpeg',
        ]);

        $nama = $request->input('namaBarang');
        $deskripsi = $request->input('deskripsi');
        $harga = $request->input('harga');
        $stok = $request->input('stok');

        if($stok > 0){
            $status = 'Active';
        }else{
            $status = 'Inactive';
        }

        if($request->hasFile('fotoBarang')){
            $plu = mt_rand(1000,9999);
            while (Produk::where('sku_plu', $plu)->exists()){
                $plu = mt_rand(1000,9999);
            }
            $file = $request->file('fotoBarang');
            $nama = $file->getClientOriginalName();
            $file->move('foto/', $nama);

            $product = Produk::create([
                'sku_plu' => $plu,
                'namaProduk' => $nama,
                'description' => $deskripsi,
                'harga' => $harga,
                'stokProduk' => $stok,
                'statusProduk' => $status,
            ]);

            FotoProduk::create([
                'idProduct' => $product->id,
                'namaFile' => $nama,
                'noUrut' => 1,
            ]);
        }else{
            $plu = mt_rand(1000,9999);
            while (Produk::where('sku_plu', $plu)->exists()){
                $plu = mt_rand(1000,9999);
            }
            $product = Produk::create([
                'sku_plu' => $plu,
                'namaProduk' => $nama,
                'description' => $deskripsi,
                'harga' => $harga,
                'stokProduk' => $stok,
                'statusProduk' => $status,
            ]);
        }
        return redirect()->route('product.index')
            ->with('success', 'Data berhasil ditambahkan!'); 
    }

    public function show($id){
        $data = Produk::find($id);
        $foto = $data->setFotoproduk();
        return view('product.show', compact('data', 'foto'));
    }

     public function showUser($id){
        $data = Produk::find($id);
        $foto = $data->setFotoproduk();
        return view('product.showUser', compact('data', 'foto'));
    }

    public function edit($id){
        $data = Produk::find($id);
        return view('product.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $data = Produk::find($id);
        $this->validate($request, [
            'namaBarang' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'fotoBarang' => 'max:2048|mimes:jpg,png,jpeg',
        ]);
        $plu = $data->sku_plu;
        $nama = $request->input('namaBarang');
        $deskripsi = $request->input('deskripsi');
        $harga = $request->input('harga');
        $stok = $request->input('stok');

        if($stok > 0){
            $status = 'Active';
        }else{
            $status = 'Inactive';
        }

        if($request->hasFile('fotoBarang')){
            $file = $request->file('fotoBarang');
            $nama = $file->getClientOriginalName();
            $file->move('foto/', $nama);

            $data->sku_plu = $plu;
            $data->namaProduk = $nama;
            $data->description = $deskripsi;
            $data->harga = $harga;
            $data->stokProduk = $stok;
            $data->statusProduk = $status;
            $data->namaFile = $nama;
            $data->update();

            // FotoProduk::create([
            //     'idProduct' => $product->id,
            //     'namaFile' => $nama,
            //     'noUrut' => 1,
            // ]);
        }else{
            $data->sku_plu = $plu;
            $data->namaProduk = $nama;
            $data->description = $deskripsi;
            $data->harga = $harga;
            $data->stokProduk = $stok;
            $data->statusProduk = $status;
            $data->update();
        }
        return redirect()->route('product.index')
            ->with('success', 'Data berhasil diubah!'); 
    }

    public function destroy($id){
        $dataItem = Produk::find($id);
        $dataItem->delete();
        return redirect()->route('product.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
