<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pertanyaan extends Controller
{
    public function store(Request $request) {
        Pertanyaan::create([
    'nama' => $request->nama,
    'judul' => $request->judul,
    'isi'   => $request->isi,
    ]);
    }
}
