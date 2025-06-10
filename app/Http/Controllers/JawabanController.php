<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class jawaban extends Controller
{
   
    public function store(Request $request) {
        Jawaban::create([
    'pertanyaan_id' => $pertanyaan_id,
    'nama' => $request->nama,
    'isi'  => $request->isi,
    ]);
    }
}

