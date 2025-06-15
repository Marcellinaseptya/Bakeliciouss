@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/keranjang.css') }}">

<div class="keranjang-container">
    <h1>Keranjang Belanja</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(count($keranjang) > 0)
        <table class="keranjang-table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($keranjang as $id => $item)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $item['gambar']) }}" alt="{{ $item['nama'] }}" width="80">
                            <div>{{ $item['nama'] }}</div>
                        </td>
                        <td>Rp{{ number_format($item['harga'], 0, ',', '.') }}</td>
                        <td>{{ $item['jumlah'] }}</td>
                        <td>Rp{{ number_format($item['harga'] * $item['jumlah'], 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('keranjang.hapus', $id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="hapus-btn">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr class="total-row">
                    <td colspan="3" align="right"><strong>Total:</strong></td>
                    <td colspan="2"><strong>Rp{{ number_format($total, 0, ',', '.') }}</strong></td>
                    
                </tr>
            </tbody>
        </table>

        <div style="margin-top: 20px; text-align: right;">
    <form action="{{ route('checkout') }}" method="POST">
        @csrf
        <button type="submit" class="checkout-btn">Checkout Sekarang</button>
    </form>
</div>



    @else
        <p>Keranjang kamu masih kosong.</p>
    @endif
</div>
@endsection
