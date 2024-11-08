<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $table = 'payments';
    protected $fillable = [
        'idOrder',
        'payment_status',
        'transaction_id',
        'payment_method',
    ];

    public function getOrderID(){
        return $this->belongsTo(Order::class, 'idOrder');
    }
}
