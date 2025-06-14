<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function riwayat()
    {
        $riwayat = Transaksi::orderBy('created_at', 'desc')->get();
        return view('transaksi.riwayat', compact('riwayat'));
    }
}
