<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function login(Request $request){
        $inputEmail = $request->input('inputEmail');
        $inputPassword = $request->input('inputPassword');
        if(Auth::attempt(['email' => $inputEmail, 'password' => $inputPassword])) {
            $users = Auth::user();
            //dd($users);
            if ($users->status == 'Admin') {
                return redirect()->route('adminHome');
            } elseif ($users->status == 'Customer') {
                return redirect()->route('usersHome');
            } else {
                return redirect()->route('home');
            }
        } else {
            return redirect('/login')->with('error', 'Maaf, Email dan/atau Password anda salah atau belum terdaftar.');
        }
    }
}
