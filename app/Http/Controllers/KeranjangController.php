<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class KeranjangController extends Controller
{
    // Menambahkan produk ke keranjang
    public function store(Request $request)
    {
        $request->validate([
            'id_produk' => 'required|exists:produk,id_produk', 
            'jumlah' => 'required|integer|min:1'
        ]);

        $id_produk = $request->id_produk;
        $jumlah = $request->jumlah;

        $produk = Produk::findOrFail($id_produk);

        $keranjang = session()->get('keranjang', []);

        if (isset($keranjang[$id_produk])) {
            $keranjang[$id_produk]['jumlah'] += $jumlah;
        } else {
            $keranjang[$id_produk] = [
                'nama' => $produk->nama,
                'harga' => $produk->harga,
                'gambar' => $produk->gambar,
                'jumlah' => $jumlah
            ];
        }

        session()->put('keranjang', $keranjang);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    // Menampilkan isi keranjang
    public function index()
    {
        $keranjang = session()->get('keranjang', []);
        $total = 0;

        foreach ($keranjang as $item) {
            $total += $item['harga'] * $item['jumlah'];
        }

        return view('keranjang.index', compact('keranjang', 'total'));
    }

    // Menghapus item dari keranjang
    public function hapus($id)
    {
        $keranjang = session()->get('keranjang', []);

        if (isset($keranjang[$id])) {
            unset($keranjang[$id]);
            session()->put('keranjang', $keranjang);
            return redirect()->route('keranjang.index')->with('success', 'Produk berhasil dihapus dari keranjang.');
        }

        return redirect()->route('keranjang.index')->with('error', 'Produk tidak ditemukan di keranjang.');
    }
}
