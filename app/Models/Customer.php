<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $fillable = [
        'userID',
        'name',
        'tgl_lahir',
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
