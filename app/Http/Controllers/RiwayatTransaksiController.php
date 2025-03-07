<?php

namespace App\Http\Controllers;

use App\Models\RiwayatTransaksi;
use Illuminate\Http\Request;

class RiwayatTransaksiController extends Controller {
    public function index() {
        return response()->json(RiwayatTransaksi::all(), 200);
    }

    public function store(Request $request) {
        $request->validate([
            'id_transaksi' => 'required|integer|exists:transaksi,id_transaksi',
            'id_produk' => 'required|integer|exists:produk,id_produk',
            'jumlah' => 'required|integer',
            'sub_total' => 'required|numeric',
        ]);

        $riwayat = RiwayatTransaksi::create($request->all());
        return response()->json($riwayat, 201);
    }

    public function show($id) {
        return response()->json(RiwayatTransaksi::findOrFail($id), 200);
    }

    public function update(Request $request, $id) {
        $riwayat = RiwayatTransaksi::findOrFail($id);
        $riwayat->update($request->all());
        return response()->json($riwayat, 200);
    }

    public function destroy($id) {
        RiwayatTransaksi::destroy($id);
        return response()->json(['message' => 'Riwayat transaksi berhasil dihapus'], 200);
    }
}

