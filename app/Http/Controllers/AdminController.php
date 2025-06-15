<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'totalProduk' => Produk::count(),
            'totalTransaksi' => Transaksi::count()
        ]);
    }

    public function produk()
    {
        $produks = Produk::all();
        return view('admin.produk', compact('produks'));
    }

    public function transaksi()
    {
        $transaksis = Transaksi::all();
        return view('admin.transaksi', compact('transaksis'));
    }
}
