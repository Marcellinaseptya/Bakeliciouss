<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller {
    public function index() {
        return response()->json(Rating::all(), 200);
    }

    public function store(Request $request) {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'id_produk' => 'required|integer|exists:produk,id_produk',
            'rating' => 'required|integer|min:1|max:5',
            'ulasan' => 'nullable|string',
        ]);

        $rating = Rating::create($request->all());
        return response()->json($rating, 201);
    }

    public function show($id) {
        return response()->json(Rating::findOrFail($id), 200);
    }

    public function update(Request $request, $id) {
        $rating = Rating::findOrFail($id);
        $rating->update($request->all());
        return response()->json($rating, 200);
    }

    public function destroy($id) {
        Rating::destroy($id);
        return response()->json(['message' => 'Rating berhasil dihapus'], 200);
    }
}

