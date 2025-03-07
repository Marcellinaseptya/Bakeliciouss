<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function checkout()
    {
        $keranjang = Keranjang::where('user_id', auth()->id())->with('produk')->get();
        $totalHarga = $keranjang->sum(function ($item) {
            return $item->produk->harga * $item->jumlah;
        });

        $transaksi = Transaksi::create([
            'user_id' => auth()->id(),
            'total_harga' => $totalHarga,
            'status' => 'pending'
        ]);

        Keranjang::where('user_id', auth()->id())->delete(); // Kosongkan keranjang
        return redirect('/')->with('success', 'Pesanan berhasil dibuat!');
    }
}
