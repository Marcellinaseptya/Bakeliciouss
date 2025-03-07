<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjang = Keranjang::where('user_id', auth()->id())->with('produk')->get();
        return view('keranjang.index', compact('keranjang'));
    }

    public function tambah(Request $request, $id)
    {
        if (!auth()->check()) {
            return redirect('/login')->with('error', 'Silakan login dulu untuk membeli!');
        }
    
        $produk = Produk::findOrFail($id);
        Keranjang::create([
            'user_id' => auth()->id(),
            'produk_id' => $produk->id,
            'jumlah' => 1
        ]);
    
        return redirect()->back()->with('success', 'Produk ditambahkan ke keranjang!');
    }
}
