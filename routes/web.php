<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\KomunitasController;
use App\Http\Controllers\TransaksiController;



Route::get('/', [LandingPageController::class, 'index'])->name('landing');

Route::get('/about', function () {
    return view('about');
})->name('about');


Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/store', [ProdukController::class, 'create'])->name('produk.create');
Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit'); // ✅ diperbaiki
Route::patch('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
Route::post('/keranjang/tambah', [KeranjangController::class, 'store'])->name('keranjang.tambah');
Route::delete('/keranjang/hapus/{id}', [KeranjangController::class, 'hapus'])->name('keranjang.hapus');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'prosesCheckout'])->name('checkout');
Route::get('/riwayat', [CheckoutController::class, 'riwayat'])->name('checkout.riwayat');


Route::get('/transaksi/{id}/isi-data', [CheckoutController::class, 'formIsiData'])->name('transaksi.form.isiData');
Route::post('/transaksi/{id}/isi-data', [CheckoutController::class, 'simpanDataPelanggan'])->name('transaksi.simpanDataPelanggan');



Route::get('/riwayat-transaksi', [TransaksiController::class, 'riwayat'])->name('transaksi.riwayat');
Route::get('/tentang_kami', [TransaksiController::class, 'index'])->name('tentang.index');


Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');

// Route::get('/tentang-kami', function () {
//     return view('tentang');
// })->name('tentang');



Route::get('/komunitas', [KomunitasController::class, 'index'])->name('komunitas.index');
Route::get('/komunitas/tanya', [KomunitasController::class, 'createPertanyaan'])->name('komunitas.create');
Route::post('/komunitas/tanya', [KomunitasController::class, 'storePertanyaan'])->name('komunitas.store');
Route::get('/komunitas/{id}', [KomunitasController::class, 'show'])->name('komunitas.show');
Route::post('/komunitas/{id}/jawab', [KomunitasController::class, 'storeJawaban'])->name('komunitas.jawab');
