@extends('layouts.navbar')

@section('content')
<div class="container" style="max-width: 600px; margin: 50px auto;">
    <h2>Lengkapi Data Pelanggan</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('transaksi.simpanDataPelanggan', ['id' => $transaksi->id]) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama_pelanggan">Nama Pelanggan:</label>
            <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label for="no_hp">Nomor HP:</label>
            <input type="text" name="no_hp" id="no_hp" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label for="alamat">Alamat:</label>
            <textarea name="alamat" id="alamat" rows="4" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Simpan Data</button>
    </form>
</div>
@endsection
