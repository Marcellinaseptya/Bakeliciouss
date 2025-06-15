@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/produk.css') }}">

<div class="banner">
    <img src="{{ asset('img/why4.jpeg') }}" alt="Cake">
    <h1 class="banner-title">Semua Produk</h1>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- Section Kategori Cake --}}
<section class="produk-section">
    <h2>Cake</h2>
    <div class="produk-grid">
        @forelse ($cake as $item)
            <div class="produk-card">
                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}">
                <h3>{{ $item->nama }}</h3>
                <p>Rp{{ number_format($item->harga) }}</p>

                <form method="POST" action="{{ route('keranjang.tambah') }}">
                    @csrf
                    <input type="hidden" name="id_produk" value="{{ $item->id_produk }}">
                    <label>Jumlah:</label>
                    <input type="number" name="jumlah" value="1" min="1" required>
                    <button type="submit" class="keranjang-btn">Tambah ke Keranjang</button>
                </form>
            </div>
        @empty
            <p>Tidak ada produk Cake.</p>
        @endforelse
    </div>
</section>

{{-- Section Kategori Pastry --}}
<section class="produk-section">
    <h2>Pastry</h2>
    <div class="produk-grid">
        @forelse ($pastry as $item)
            <div class="produk-card">
                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}">
                <h3>{{ $item->nama }}</h3>
                <p>Rp{{ number_format($item->harga) }}</p>

                <form method="POST" action="{{ route('keranjang.tambah') }}">
                    @csrf
                    <input type="hidden" name="id_produk" value="{{ $item->id_produk }}">
                    <label>Jumlah:</label>
                    <input type="number" name="jumlah" value="1" min="1" required>
                    <button type="submit" class="keranjang-btn">Tambah ke Keranjang</button>
                </form>
            </div>
        @empty
            <p>Tidak ada produk Pastry.</p>
        @endforelse
    </div>
    
</section>
@include('layouts.footer')
@endsection
