<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller {
    public function index() {
        return response()->json(Kategori::all(), 200);
    }

    public function store(Request $request) {
        $request->validate([
            'nama_kategori' => 'required|string',
            'deskripsi' => 'nullable|string',
        ]);

        $kategori = Kategori::create($request->all());
        return response()->json($kategori, 201);
    }

    public function show($id) {
        return response()->json(Kategori::findOrFail($id), 200);
    }

    public function update(Request $request, $id) {
        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->all());
        return response()->json($kategori, 200);
    }

    public function destroy($id) {
        Kategori::destroy($id);
        return response()->json(['message' => 'Kategori berhasil dihapus'], 200);
    }
};
