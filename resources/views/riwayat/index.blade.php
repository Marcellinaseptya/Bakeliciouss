@extends('layouts.navbar')

@section('content')
<h1>Riwayat Transaksi</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Total</th>
            <th>Status</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transaksi as $item)
        <tr>
            <td>{{ $item->id_transaksi }}</td>
            <td>Rp{{ number_format($item->total_harga, 0, ',', '.') }}</td>
            <td>{{ ucfirst($item->status) }}</td>
            <td>{{ $item->created_at->format('d M Y H:i') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
