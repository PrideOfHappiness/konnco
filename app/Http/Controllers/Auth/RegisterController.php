<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'alamat' => ['required', 'string'],
            'kelurahan' => ['required', 'string'],
            'kecamatan' => ['required', 'string'],
            'kab_kota' => ['required', 'string'],
            'provinsi' => ['required'],
            'status' => ['required'],
            'kode_pos' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => $data['status'],
        ]);
    }

    public function register(Request $request){
        $this->validator($request->all());
        $user = $this->create($request->all());
        if($user){
            $data = $request->all();
            if($data['status'] == 'Admin'){
                Supplier::create([
                    'userID' => $user->id,
                    'name' => $data['name'],
                    'alamat' => $data['alamat'],
                    'kelurahan' => $data['kelurahan'],
                    'kecamatan' => $data['kelurahan'],
                    'kota' => $data['kab_kota'],
                    'provinsi' => $data['provinsi'],
                    'kode_pos' => $data['kode_pos'],
                    'no_telp' => $data['no_telp'],
                ]);
            }else{
                Customer::create([
                    'userID' => $user->id,
                    'name' => $data['name'],
                    'alamat' => $data['alamat'],
                    'tgl_lahir' => $data['tgl_lahir'],
                    'kelurahan' => $data['kelurahan'],
                    'kecamatan' => $data['kelurahan'],
                    'kota' => $data['kab_kota'],
                    'provinsi' => $data['provinsi'],
                    'kode_pos' => $data['kode_pos'],
                    'no_telp' => $data['no_telp'],
                ]);
            }
            return redirect()->route('login')
                ->with('success', 'Data berhasil diregistrasi!');
        }else{
            return redirect()->route('register')
                ->with('success', 'Data gagal diregistrasi!');
        }
    }
}
