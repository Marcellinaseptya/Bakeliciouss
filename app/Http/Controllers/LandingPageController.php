<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class LandingPageController extends Controller
{
    public function index()
    {
        $produkUnggulan = Produk::all(); 
        return view('landing', compact('produkUnggulan'));
    }
}

