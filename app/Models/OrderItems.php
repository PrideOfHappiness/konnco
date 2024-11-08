<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $table = 'order_items';
    protected $fillable = [
        'idOrder',
        'productID',
        'hargaPesan',
        'qty',
    ];

    public function getProductID(){
        return $this->belongsTo(Produk::class, 'productID');
    }

    public function getOrderID(){
        return $this->belongsTo(Order::class, 'idOrder');
    }
}
