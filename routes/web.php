<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\IndexController@indexhome')->name('index');
// Route::get('/index', function () {
//     return view('layouts/index');
// })->name('index');
Route::get('/registrasi', 'App\Http\Controllers\userController@registindex')->name('registrasi');
Route::get('/buattoko', 'App\Http\Controllers\TokoController@buattoko')->name('buattoko');
Route::post('/tambahtoko', 'App\Http\Controllers\TokoController@tambahtoko')->name('tambahtoko');
Route::get('/{id_toko}/{nama_toko}', 'App\Http\Controllers\TokoController@profiletokonolog')->name('profiletokonolog');

Route::get('/profile/{id_user}/{nama_user}', 'App\Http\Controllers\UserController@profileuser')->name('profileuser');
Route::post('/updateprofile', 'App\Http\Controllers\UserController@updateprofile')->name('updateprofile');

Route::get('/tambahproduk', 'App\Http\Controllers\TokoController@tambahproduk')->name('tambahproduk');
Route::post('/tambahprodukdb', 'App\Http\Controllers\ProdukController@tambahprodukdb')->name('tambahprodukdb');
Route::get('/produk/produkdetail/{id}', 'App\Http\Controllers\ProdukController@produkdetail')->name('produkdetail');
Route::post('/produk/produkdetail/update/{id}', 'App\Http\Controllers\ProdukController@updateproduk')->name('updateproduk');

Route::get('/cart', 'App\Http\Controllers\CartController@carthome')->name('cart');
Route::get('/checkout', 'App\Http\Controllers\CartController@checkout')->name('checkout');

Route::post('/checkoutlagi', 'App\Http\Controllers\OrderController@masukorder')->name('masukorder');
Route::get('/userorder', 'App\Http\Controllers\OrderController@userorder')->name('userorder');
Route::get('/ordertoko', 'App\Http\Controllers\OrderController@ordertoko')->name('ordertoko');


Route::get('/cart/delete/{id}', 'App\Http\Controllers\CartController@hapuscart')->name('hapuscart');
Route::post('/cartadd', 'App\Http\Controllers\CartController@masukkeranjang')->name('masukkeranjang');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
