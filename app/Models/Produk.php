<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'product';
    protected $fillable = [
        'sku_plu',
        'namaProduk',
        'description',
        'harga',
        'stokProduk',
        'statusProduk',
        'namaFile',
    ];

    public function setOrderItems() {
        return $this->hasMany(OrderItems::class, 'productID');
    }

    public function setFotoproduk(){
        return $this->hasMany(FotoProduk::class, 'idProduct');
    }
}
