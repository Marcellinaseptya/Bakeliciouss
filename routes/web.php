<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\KomunitasController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\AdminController;

Route::get('/', [LandingPageController::class, 'index'])->name('landing');

Route::get('/about', function () {
    return view('about');
})->name('about');


Route::get('/admin', [AdminController::class, 'dashboard']);
Route::get('/admin/produk', [AdminController::class, 'produk']);
Route::get('/admin/transaksi', [AdminController::class, 'transaksi']);



Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');

Route::prefix('admin')->group(function () {
    Route::get('/produk', [ AdminProdukController::class, 'index'])->name('admin.produk.index');
    Route::get('/produk/create', [AdminProdukController::class, 'create'])->name('admin.produk.create');
    Route::post('/produk', [AdminProdukController::class, 'store'])->name('admin.produk.store');
    Route::get('/produk/{id}/edit', [AdminProdukController::class, 'edit'])->name('admin.produk.edit');
    Route::put('/produk/{id}', [AdminProdukController::class, 'update'])->name('admin.produk.update');
    Route::delete('/produk/{id}', [AdminProdukController::class, 'destroy'])->name('admin.produk.destroy');
});
Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
Route::post('/keranjang/tambah', [KeranjangController::class, 'store'])->name('keranjang.tambah');
Route::delete('/keranjang/hapus/{id}', [KeranjangController::class, 'hapus'])->name('keranjang.hapus');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'prosesCheckout'])->name('checkout');
Route::get('/riwayat', [CheckoutController::class, 'riwayat'])->name('checkout.riwayat');


Route::get('/transaksi/{id}/isi-data', [CheckoutController::class, 'formIsiData'])->name('transaksi.form.isiData');
Route::post('/transaksi/{id}/isi-data', [CheckoutController::class, 'simpanDataPelanggan'])->name('transaksi.simpanDataPelanggan');

Route::get('/riwayat-transaksi', [TransaksiController::class, 'riwayat'])->name('transaksi.riwayat');
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang.index');

Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');

Route::get('/komunitas', [KomunitasController::class, 'index'])->name('komunitas.index');
Route::get('/komunitas/tanya', [KomunitasController::class, 'createPertanyaan'])->name('komunitas.create');
Route::post('/komunitas/tanya', [KomunitasController::class, 'storePertanyaan'])->name('komunitas.store');
Route::get('/komunitas/{id}', [KomunitasController::class, 'show'])->name('komunitas.show');
Route::post('/komunitas/{id}/jawab', [KomunitasController::class, 'storeJawaban'])->name('komunitas.jawab');

// Route::prefix('admin')->group(function () {
//     Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

//     // Produk CRUD
//     Route::resource('/produk', ProdukController::class);

//     // Komunitas (Pertanyaan & Jawaban)
//     Route::resource('/pertanyaan', PertanyaanController::class);
//     Route::resource('/jawaban', JawabanController::class);

//     // Transaksi
//     Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
//     Route::post('/transaksi/{id}/ubah-status', [TransaksiController::class, 'ubahStatus'])->name('transaksi.ubahStatus');
// });
