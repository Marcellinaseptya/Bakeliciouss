@extends('layouts.navbar')

@section('content')
<link rel="stylesheet" href="{{ asset('css/keranjang.css') }}">

<div class="container py-4">
    <h2 class="text-2xl font-bold mb-4">Keranjang Belanja</h2>

    @if(session('success'))
        <div class="alert-success mb-4">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert-danger mb-4">{{ session('error') }}</div>
    @endif

    @if(count($keranjang) > 0)
        <table class="w-full border-collapse mb-6">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="p-2">Gambar</th>
                    <th class="p-2">Produk</th>
                    <th class="p-2">Harga</th>
                    <th class="p-2">Jumlah</th>
                    <th class="p-2">Subtotal</th>
                    <th class="p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($keranjang as $id => $item)
                    <tr class="border-b">
                        <td class="p-2">
                            <img src="{{ asset('storage/' . $item['gambar']) }}" alt="{{ $item['nama'] }}" width="80">
                        </td>
                        <td class="p-2">{{ $item['nama'] }}</td>
                        <td class="p-2">Rp{{ number_format($item['harga'], 0, ',', '.') }}</td>
                        <td class="p-2">{{ $item['jumlah'] }}</td>
                        <td class="p-2">Rp{{ number_format($item['harga'] * $item['jumlah'], 0, ',', '.') }}</td>
                        <td class="p-2">
                            <form action="{{ route('keranjang.hapus', $id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-right text-xl font-semibold mb-6">
            Total: Rp{{ number_format($total, 0, ',', '.') }}
        </div>

        <form action="{{ route('checkout.proses') }}" method="POST" class="bg-gray-100 p-4 rounded">
            @csrf
            <div class="mb-4">
                <label for="nama_pelanggan" class="block">Nama:</label>
                <input type="text" name="nama_pelanggan" class="w-full p-2 border" required>
            </div>
            <div class="mb-4">
                <label for="nomor_hp" class="block">Nomor HP:</label>
                <input type="text" name="nomor_hp" class="w-full p-2 border" required>
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Checkout Sekarang
            </button>
        </form>

    @else
        <p class="text-center text-gray-600">Keranjang masih kosong. Yuk, belanja dulu!</p>
    @endif
</div>
@endsection
