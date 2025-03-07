<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class LandingPageController extends Controller
{
    public function index()
    {
        $produkUnggulan = Produk::all(); // Ambil 4 produk terbaru
        return view('landing', compact('produkUnggulan'));
    }
}

