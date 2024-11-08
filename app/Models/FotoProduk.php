<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FotoProduk extends Model
{
    protected $table = 'foto_produk';
    protected $fillable = [
        'idProduct',
        'namaFile',
        'noUrut'
    ];

    public function getProdukID(){
        return $this->belongsTo(Produk::class, 'idProduct');
    }
}
