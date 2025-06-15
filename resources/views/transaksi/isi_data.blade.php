<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #E9DCCC;
        color: #452725;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 50px auto;
        background-color: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 30px;
        color: #452725;
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 6px;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 6px;
        margin-top: 4px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    button {
        background-color: #452725;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 14px;
    }

    button:hover {
        background-color: #5a342f;
    }

    .alert {
        padding: 12px 18px;
        border-radius: 6px;
        margin-bottom: 20px;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border-left: 5px solid #28a745;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border-left: 5px solid #dc3545;
    }
</style>


@extends('layouts.app')

@section('content')
<div class="container">
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

        <div class="form-group">
            <label for="no_hp">Nomor HP:</label>
            <input type="text" name="no_hp" id="no_hp" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea name="alamat" id="alamat" rows="4" class="form-control" required></textarea>
        </div>

        <button type="submit">Simpan Data</button>
    </form>
</div>
@endsection
