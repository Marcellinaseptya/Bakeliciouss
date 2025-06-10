<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\RiwayatTransaksiController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\KomunitasController;

Route::get('/', [LandingPageController::class, 'index'])->name('landing');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/tambah', [ProdukController::class, 'create'])->name('produk.create');
Route::post('/produk/store', [ProdukController::class, 'store'])->name('produk.store');
Route::patch('/produk', [ProdukController::class, 'edit'])->name('produk.edit');
Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
Route::post('/keranjang/tambah', [KeranjangController::class, 'tambah'])->name('keranjang.tambah');
Route::post('/keranjang/checkout', [KeranjangController::class, 'checkout'])->name('keranjang.checkout');
// Route::delete('/keranjang/hapus/{id}', [KeranjangController::class, 'hapus'])->name('keranjang.hapus');

Route::resource('kategori', KategoriController::class)->only([
    'index', 'create', 'store', 'edit', 'update', 'destroy'
]);

Route::resource('transaksi', TransaksiController::class)->only([
    'index', 'store'
]);

Route::resource('riwayat_transaksi', RiwayatTransaksiController::class)->only([
    'index'
]);

Route::resource('rating', RatingController::class)->only([
    'store'
]);



Route::get('/komunitas', [KomunitasController::class, 'index'])->name('komunitas.index');
Route::get('/komunitas/tanya', [KomunitasController::class, 'createPertanyaan'])->name('komunitas.create');
Route::post('/komunitas/tanya', [KomunitasController::class, 'storePertanyaan'])->name('komunitas.store');
Route::get('/komunitas/{id}', [KomunitasController::class, 'show'])->name('komunitas.show');
Route::post('/komunitas/{id}/jawab', [KomunitasController::class, 'storeJawaban'])->name('komunitas.jawab');
