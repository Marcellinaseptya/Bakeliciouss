<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertanyaan;
use App\Models\Jawaban;

class KomunitasController extends Controller
{
    public function index()
    {
        // Ambil semua pertanyaan beserta jawaban yang terkait
        $pertanyaans = Pertanyaan::with('jawabans')->latest()->get();

        return view('komunitas.index', compact('pertanyaans'));
    }

    public function storePertanyaan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'judul' => 'required|string|max:255',
            'isi' => 'required',
        ]);

        Pertanyaan::create([
            'nama' => $request->nama,
            'judul' => $request->judul,
            'isi'   => $request->isi,
        ]);

        return back()->with('success', 'Pertanyaan berhasil dikirim!');
    }

    public function storeJawaban(Request $request, $pertanyaan_id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'isi' => 'required',
        ]);

        Jawaban::create([
            'pertanyaan_id' => $pertanyaan_id,
            'nama' => $request->nama,
            'isi' => $request->isi,
        ]);

        return back()->with('success', 'Jawaban berhasil dikirim!');
    }

    public function show($id)
    {
        $pertanyaan = Pertanyaan::with('jawabans')->findOrFail($id);
        return view('komunitas.show', compact('pertanyaan'));
    }
}
    