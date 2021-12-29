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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);    

// Pengecekan role pengguna yang masuk 
Route::get('/auth', [App\Http\Controllers\ProfileController::class, 'profile_check']);

Auth::routes();

// ROUTE HOME - Halaman awal dan landing page.
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home/cari', [App\Http\Controllers\HomeController::class, 'cari']);

// ROUTE Detail, untuk melihat detil produk dan jika user cocok akan dimasukkan keranjang.
Route::get('/view/{id}', 'App\Http\Controllers\HomeController@viewProduct');
Route::get('/detail/{id}', 'App\Http\Controllers\DetailController@index');
Route::post('/detail/{id}','App\Http\Controllers\DetailController@detail');

// ROUTE untuk checkout, ketika sudah masuk ke keranjang maka untuk pembayaran user diarahkan ke check-out.
Route::get('check-out', 'App\Http\Controllers\DetailController@check_out');
Route::delete('/check-out/{id}','App\Http\Controllers\DetailController@delete');
Route::get('konfirmasi-check-out', 'App\Http\Controllers\DetailController@konfirmasi');

// Rute riwayat pemesanan
Route::get('history', 'App\Http\Controllers\PesanController@riwayat');
Route::get('history/{id}', 'App\Http\Controllers\PesanController@detail_riwayat');

// Rute untuk profil pengguna, baik user ataupun admin
Route::get('profile', 'App\Http\Controllers\ProfileController@index');
Route::post('edit-profile', 'App\Http\Controllers\ProfileController@edit_profile');

// RUTE ADMIN - CRUD Produk, CRUD User, CRUD Pesanan, CRUD 
Route::get('dashboard', 'App\Http\Controllers\ProfileController@AdminDashboard');

// Rute admin - produk. CRUD produk disini
Route::get('produk', 'App\Http\Controllers\ProdukController@index');
Route::get('produk/create', 'App\Http\Controllers\ProdukController@create');
Route::post('produk/create', 'App\Http\Controllers\ProdukController@create');
Route::get('produk/update/{id}', 'App\Http\Controllers\ProdukController@update');
Route::post('produk/update/{id}', 'App\Http\Controllers\ProdukController@update');
Route::delete('produk/delete/{id}', 'App\Http\Controllers\ProdukController@delete');

// Rute admin - pengguna. CRUD pengguna (pembeli dan admin) disini
Route::get('account', 'App\Http\Controllers\ProfileController@showUsers');
Route::get('account/me', 'App\Http\Controllers\ProfileController@adminProfile');
Route::get('account/create', 'App\Http\Controllers\ProfileController@create');
Route::post('account/create', 'App\Http\Controllers\ProfileController@create');
Route::get('account/update/{id}', 'App\Http\Controllers\ProfileController@update');
Route::post('account/update/{id}', 'App\Http\Controllers\ProfileController@update');
Route::delete('account/delete/{id}', 'App\Http\Controllers\ProfileController@delete');

// Rute admin - pesanan. Menerima dan melihat pesanan pembeli ada disini
Route::get('pesanan', 'App\Http\Controllers\PesanController@index');
Route::get('pesanan/detail', 'App\Http\Controllers\PesanController@detail');
Route::get('pesanan/update/{id}', 'App\Http\Controllers\PesanController@update');
Route::post('pesanan/update/{id}', 'App\Http\Controllers\PesanController@update');
