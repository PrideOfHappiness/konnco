<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/login', function () {
    return view('auth/login');
});

Auth::routes();
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::middleware(['auth'])->group(function(){
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});
Route::middleware(['Admin'])->group(function() {
    Route::get('/admin/home', [HomeController::class, 'dashboardAdmin'])->name('adminHome');
    Route::resource('admin/product', ProductController::class);
});

Route::middleware(['Users'])->group(function() {
    Route::get('/users/home', [HomeController::class, 'dashboardUsers'])->name('usersHome');
    Route::get('/users/product', [ProductController::class, 'indexUser']);
    Route::get('users/product/{id}', [ProductController::class, 'showUser'])->name('showProduct');
    Route::get('/cart', function () { return view('cart'); })->name('cart');
    Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/payment', [PaymentController::class, 'payment'])->name('payment');
    Route::get('/order/success', function () { return view('order.success'); })->name('order.success');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
