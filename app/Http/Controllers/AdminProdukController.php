<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Keranjang;
use Illuminate\Http\Request;

class AdminProdukController extends Controller
{
    public function index(Request $request)
    {
        {
            $produk = Produk::all();
            return view('admin.produk.index', compact('produk'));
        }
    }

    public function create()
    {
        return view('admin.produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'kategori' => 'required|string',
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
            'kategori' => $request->kategori,
            'gambar' => $gambarPath,
        ]);
       

        return redirect('/admin/produk')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function show($id)
    {
        return response()->json(Produk::findOrFail($id), 200);
    }

    public function edit(string $id)
    {
        $item = Produk::findOrFail($id);
        return view('admin.produk.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'kategori' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $produk = Produk::findOrFail($id);

        $data = $request->only(['nama', 'deskripsi', 'harga', 'stok', 'kategori']);

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('produk', 'public');
            $data['gambar'] = $gambarPath;
        }

        $produk->update($data);

        return redirect('/admin/produk')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return redirect('/admin/produk')->with('success', 'Produk berhasil dihapus.');
    }
}
