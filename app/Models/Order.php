<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = [
        'idUser',
        'status',
        'hargaPesanan',
    ];

    public function getUserIDUsers(){
        return $this->belongsTo(User::class, 'idUser');
    }
}
