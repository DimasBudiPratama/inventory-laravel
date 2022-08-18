<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrgMasukController;
use App\Http\Controllers\BrgKeluarController;
use App\Http\Controllers\LaporanController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'admin'], function() {
    /* Data Master (User) */
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::post('/user/store', [UserController::class, 'store']);
    Route::post('/user/{id}/update', [UserController::class, 'update']);
    Route::get('/user/{id}/destroy', [UserController::class, 'destroy']);

    /* Data Master (Kategori) */
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
    Route::post('/kategori/store', [KategoriController::class, 'store']);
    Route::post('/kategori/{id}/update', [KategoriController::class, 'update']);
    Route::get('/kategori/{id}/destroy', [KategoriController::class, 'destroy']);

    /* Data Master (Barang) */
    Route::get('/barang', [BarangController::class, 'index'])->name('barang');
    Route::post('/barang/store', [BarangController::class, 'store']);
    Route::post('/barang/{id}/update', [BarangController::class, 'update']);
    Route::get('/barang/{id}/destroy', [BarangController::class, 'destroy']);

     /* Data Laporan */
    Route::get('/lap_barang_masuk', [LaporanController::class, 'lap_barang_masuk'])->name('lap_barang_masuk');
    Route::get('/lap_barang_masuk/cetak_barang_masuk', [LaporanController::class, 'cetak_barang_masuk']);

    Route::get('/lap_barang_keluar', [LaporanController::class, 'lap_barang_keluar'])->name('lap_barang_keluar');
    Route::get('/lap_barang_keluar/cetak_barang_keluar', [LaporanController::class, 'cetak_barang_keluar']);

    Route::get('/lap_barang', [LaporanController::class, 'lap_barang'])->name('lap_barang');
    Route::get('/lap_barang/cetak_barang', [LaporanController::class, 'cetak_barang']);

     /* Data Barang (Barang Masuk) */
    Route::get('/brg_masuk1', [BrgMasukController::class, 'index'])->name('brg_masuk1');
    
     /* Data Barang (Barang Keluar) */
    Route::get('/brg_keluar1', [BrgKeluarController::class, 'index'])->name('brg_keluar1');
    
});

Route::group(['middleware' => 'user'], function() {
    /* Data Barang (Barang Masuk) */
    Route::get('/brg_masuk', [BrgMasukController::class, 'index'])->name('brg_masuk');
    Route::get('/brg_masuk/ajax', [BrgMasukController::class, 'ajax']);
    Route::get('/brg_masuk/create', [BrgMasukController::class, 'create']);
    Route::post('/brg_masuk/store', [BrgMasukController::class, 'store']);
});
Route::group(['middleware' => 'teknisi'], function() {
    /* Data Barang (Barang Keluar) */
    Route::get('/brg_keluar', [BrgKeluarController::class, 'index'])->name('brg_keluar');
    Route::get('/brg_keluar/ajax', [BrgKeluarController::class, 'ajax']);
    Route::get('/brg_keluar/create', [BrgKeluarController::class, 'create']);
    Route::post('/brg_keluar/store', [BrgKeluarController::class, 'store']);
});




