<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Tes Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin1234567'),
                'status' => 'Admin',
            ],
            [
                'name' => 'Tes User',
                'email' => 'user@admin.com',
                'password' => bcrypt('user1234567'),
                'status' => 'Customer',
            ],
        ];
        foreach($data as $user){
            $user = User::create($user); 
            if($user){
                if($user->status == 'Admin'){
                    $data2 = [
                        'userID' => $user->id,
                        'name' => $user->name,
                        'alamat' => 'Jalan Hasyim Asyari 252',
                        'kelurahan' => 'Tebet Barat',
                        'kecamatan' => 'Tebet',
                        'kota' => 'Jakarta Selatan',
                        'provinsi' => 'DKI Jakarta',
                        'kode_pos' => '12820',
                        'no_telp' => '123456789012345',
                    ];
                    Supplier::create($data2);
                }else{
                    $data3 = [
                        'userID' => $user->id,
                        'name' => $user->name,
                        'tgl_lahir' => '1998-10-10',
                        'alamat' => 'Jalan Hasyim Asyari 252',
                        'kelurahan' => 'Tebet Barat',
                        'kecamatan' => 'Tebet',
                        'kota' => 'Jakarta Selatan',
                        'provinsi' => 'DKI Jakarta',
                        'kode_pos' => '12820',
                        'no_telp' => '123456789012346',
                    ];
                    Customer::create($data3);
                }
            }
        }
    }
}
