@extends('layouts.navbar')

@section('content')
<div class="container">
    <h2>Checkout</h2>

    @if(session('error'))
        <div class="alert-error">{{ session('error') }}</div>
    @endif

    <form action="{{ route('checkout.proses') }}" method="POST">
        @csrf
        <label>Nama:</label>
        <input type="text" name="nama_pelanggan" required>

        <label>Alamat:</label>
        <textarea name="alamat" required></textarea>

        <label>No HP:</label>
        <input type="text" name="no_hp" required>

        <h3>Ringkasan Belanja</h3>
        <ul>
            @foreach($keranjang as $item)
                <li>{{ $item['nama'] }} x {{ $item['jumlah'] }} = Rp{{ number_format($item['harga'] * $item['jumlah']) }}</li>
            @endforeach
        </ul>

        <p><strong>Total: Rp{{ number_format($total) }}</strong></p>

        <button type="submit">Bayar Sekarang</button>
    </form>
</div>
@endsection
