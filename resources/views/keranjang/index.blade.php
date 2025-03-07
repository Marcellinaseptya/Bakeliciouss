@extends('layouts.app')

@section('content')
@include('layouts.navbar')

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center mb-6">Keranjang Belanja</h1>

    <div class="text-center text-gray-600">
        <p>Keranjang Anda masih kosong!</p>
        <a href="/produk" class="mt-4 inline-block bg-pink-500 text-white px-6 py-3 rounded-lg">Belanja Sekarang</a>
    </div>
</div>
@endsection
