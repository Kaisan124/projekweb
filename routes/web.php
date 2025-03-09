<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authentikasicontroller;
use App\Http\Controllers\produkcontroller;
use App\Http\Controllers\mapelcontroller;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/kucing', function () {
    return view('meong');
});
// Route::get('/', '')->name('user');
Route::get('/register', [authentikasicontroller::class, 'register'])->name('register');
Route::post('/registerproses', [authentikasicontroller::class, 'registerproses'])->name('registerproses');

Route::get('/', [authentikasicontroller::class, 'login'])->name('login');
Route::post('/loginproses', [authentikasicontroller::class, 'loginproses'])->name('loginproses');

Route::get('home', [authentikasicontroller::class, 'home'])->name('home')->middleware('auth');
Route::get('portal', [authentikasicontroller::class, 'portal'])->name('portal')->middleware('auth');


Route::get('logout', [authentikasicontroller::class, 'logout'])->name('actionlogout')->middleware('auth');

Route::get('produk', [produkcontroller::class, 'produk'])->name('produk')->middleware('auth');

Route::get('produktambah', [produkcontroller::class, 'produktambah'])->name('produktambah')->middleware('auth');
Route::post('produkproses', [produkcontroller::class, 'produkproses'])->name('produkproses')->middleware('auth');

Route::get('editproduk/{id}', [produkcontroller::class, 'editproduk'])->name('editproduk')->middleware('auth');
Route::post('editproses', [produkcontroller::class, 'editproses'])->name('editproses')->middleware('auth');
Route::get('hapus/{id}', [produkcontroller::class, 'hapus'])->name('hapus')->middleware('auth');
Route::get('cetak', [produkcontroller::class, 'cetak'])->name('cetak')->middleware('auth');

//mapel
Route::get('mapel', [mapelcontroller::class, 'mapel'])->name('mapel')->middleware('auth');

Route::get('mapeltambah', [mapelcontroller::class, 'mapeltambah'])->name('mapeltambah')->middleware('auth');
Route::post('mapelproses', [mapelcontroller::class, 'mapelproses'])->name('mapelproses')->middleware('auth');

Route::get('editmapel/{id}', [mapelcontroller::class, 'editmapel'])->name('editmapel')->middleware('auth');
Route::post('editmapelproses', [mapelcontroller::class, 'editmapelproses'])->name('editmapelproses')->middleware('auth');
Route::get('hapus/{id}', [mapelcontroller::class, 'hapus'])->name('hapus')->middleware('auth');
Route::get('cetakmapel', [mapelcontroller::class, 'cetakmapel'])->name('cetakmapel')->middleware('auth');