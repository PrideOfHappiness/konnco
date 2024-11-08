<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'seller';
    protected $fillable = [
        'userID',
        'name',
        'alamat',
        'kelurahan',
        'kecamatan',
        'kota',
        'provinsi',
        'kode_pos',
        'no_telp',
    ];

    public function getUserID(){
        return $this->belongsTo(User::class, 'userID');
    }
}
