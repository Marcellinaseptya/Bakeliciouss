@extends('layouts.navbar')

@section('content')
<link rel="stylesheet" href="{{ asset('css/riwayat.css') }}">

<div class="invoice-container">
    <h2 class="invoice-title">Invoice Transaksi</h2>

    @foreach($riwayat as $trx)
    <div class="invoice-box">
        <div class="invoice-header">
            <div>
                <h4>Transaksi #{{ $trx->id_transaksi }}</h4>
                <p><strong>Status:</strong> {{ ucfirst($trx->status) }}</p>
                <p><strong>Tanggal:</strong> {{ $trx->created_at->format('d M Y, H:i') }}</p>
            </div>
            <div class="invoice-total">
                <h4>Total:</h4>
                <p>Rp{{ number_format($trx->total, 0, ',', '.') }}</p>
            </div>
        </div>

        <hr>

        <div class="invoice-body">
            <p><strong>Nama Pelanggan:</strong> {{ $trx->nama_pelanggan ?? 'Belum diisi' }}</p>
            <p><strong>No HP:</strong> {{ $trx->no_hp ?? '-' }}</p>
            <p><strong>Alamat:</strong> {{ $trx->alamat ?? '-' }}</p>
        </div>

        <div class="invoice-items">
            <h5>Detail Produk</h5>
            <table>
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trx->detailTransaksi as $item)
                    <tr>
                        <td>{{ $item->nama_produk }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>Rp{{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td>Rp{{ number_format($item->harga * $item->jumlah, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endforeach
</div>
@endsection
