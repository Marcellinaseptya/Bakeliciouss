<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller {
    public function index() {
        $produk = Produk::all(); // Ambil semua produk dari database
        return view('produk.index', compact('produk'));
    }

    public function create() {
        return view('produk.create'); 
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
        $gambarPath = $request->file('gambar')->store('produk', 'public');
        }

        Produk::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $gambarPath,
        ]);
    
        return redirect('/produk')->with('success', 'Produk berhasil ditambahkan!');

        $produk = Produk::create($request->all());
        return response()->json($produk, 201);
    }

    public function show($id) {
        return response()->json(Produk::findOrFail($id), 200);
    }

    public function edit(string $id)
    {
        $row = mahasiswa::findOrFail($id);
        return view('produk.edit', compact('item'));
    }
    

    public function update(Request $request, $id) {
        $produk = Produk::findOrFail($id);
        $produk->update($request->all());
        return response()->json($produk, 200);
    }

    public function destroy($id) {
        Produk::destroy($id);
        return response()->json(['message' => 'Produk berhasil dihapus'], 200);
    }
};