<?php

namespace App\Http\Controllers\Api; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk; 

class ProdukController extends Controller
{
    public function index()
    {
        try {
            
            $produks = Produk::all();

            
            return response()->json([
                'status' => 'success',
                'message' => 'Daftar produk berhasil diambil',
                'data' => $produks
            ], 200);
        } catch (\Exception $e) {

            return response()->json([
                'status' => 'error',
                'message' => 'Gagal mengambil data produk: ' . $e->getMessage(),
                'code' => $e->getCode()
            ], 500);
        }
    }

   
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'kategori' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        try {
            if ($request->hasFile('gambar')) {
                $validatedData['gambar'] = $request->file('gambar')->store('produk', 'public');
            }

            $produk = Produk::create($validatedData);

            return response()->json([
                'status' => 'success',
                'message' => 'Produk berhasil ditambahkan',
                'data' => $produk
            ], 201); 
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal menambahkan produk: ' . $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $produk = Produk::findOrFail($id);
            return response()->json([
                'status' => 'success',
                'data' => $produk
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Produk tidak ditemukan'
            ], 404); 
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $produk = Produk::findOrFail($id);
            $validatedData = $request->validate([
                'nama' => 'required|string|max:255',
                'deskripsi' => 'nullable|string',
                'harga' => 'required|numeric',
                'stok' => 'required|integer',
                'kategori' => 'required|string|max:255',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($request->hasFile('gambar')) {
                $validatedData['gambar'] = $request->file('gambar')->store('produk', 'public');
            }

            $produk->update($validatedData);

            return response()->json([
                'status' => 'success',
                'message' => 'Produk berhasil diperbarui',
                'data' => $produk
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal memperbarui produk: ' . $e->getMessage()
            ], 500);
        }
    }


    public function destroy($id)
    {
        try {
            $produk = Produk::findOrFail($id);
            $produk->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Produk berhasil dihapus'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal menghapus produk: ' . $e->getMessage()
            ], 500);
        }
    }
}