<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ProdukController;

Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/tambah', [ProdukController::class, 'create']);
Route::post('/produk/store', [ProdukController::class, 'store']);
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::patch('/produk', [ProdukController::class, 'edit'])->name('produk.edit');
Route::get('/produk', [ProdukController::class, 'delete'])->name('produk.delete');



Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');

Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');

Route::get('/about', function () {
    return view('about');
})->name('about');



use App\Http\Controllers\LandingPageController;

Route::get('/', [LandingPageController::class, 'index']);


use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\RiwayatTransaksiController;
use App\Http\Controllers\RatingController;

Route::apiResource('produk', ProdukController::class);
Route::apiResource('kategori', KategoriController::class);
Route::apiResource('transaksi', TransaksiController::class);
Route::apiResource('riwayat_transaksi', RiwayatTransaksiController::class);
Route::apiResource('rating', RatingController::class);

Route::middleware('auth')->group(function () {
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
    Route::post('/keranjang/tambah/{id}', [KeranjangController::class, 'tambah'])->name('keranjang.tambah');
    Route::post('/checkout', [TransaksiController::class, 'checkout'])->name('checkout');
});


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->middleware('role:admin')->name('admin.dashboard');

    Route::get('/landing', function () {
        return view('landing');
    })->middleware('role:user')->name('user.landing');
});
