@extends('admin.layout')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="card-container">
        <div class="card">
            <h4>Total Produk</h4>
            <p>{{ $totalProduk ?? 0 }}</p>
        </div>
        <div class="card">
            <h4>Pertanyaan</h4>
            <p>{{ $totalPertanyaan ?? 0 }}</p>
        </div>
        <div class="card">
            <h4>Jawaban</h4>
            <p>{{ $totalJawaban ?? 0 }}</p>
        </div>
        <div class="card">
            <h4>Total Transaksi</h4>
            <p>{{ $totalTransaksi ?? 0 }}</p>
        </div>
    </div>

    <section class="recent-activity">
        <h4>Aktivitas Terbaru</h4>
        <ul>
            <li>Produk baru ditambahkan: <strong>Coco Cake</strong></li>
            <li>Jawaban baru oleh Marcellina: “mungkin kurang baking soda”</li>
            <li>Transaksi oleh Cece: Total Rp225.000</li>
        </ul>
    </section>
@endsection
