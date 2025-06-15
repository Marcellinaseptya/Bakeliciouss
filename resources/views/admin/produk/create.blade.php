<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #E9DCCC;
        margin: 0;
        padding: 0;
        color: #452725;
    }

    .container {
        max-width: 600px;
        margin: 40px auto;
        padding: 30px;
        background: white;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #452725;
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 6px;
    }

    input[type="text"],
    input[type="number"],
    input[type="file"],
    select,
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        margin-bottom: 20px;
        font-size: 14px;
    }

    button {
        background-color: #452725;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }

    button:hover {
        background-color: #5a342f;
    }

    .success-message {
        background-color: #d4edda;
        color: #155724;
        padding: 10px;
        border-left: 4px solid #28a745;
        margin-bottom: 20px;
        border-radius: 6px;
    }

    .error-message {
        background-color: #f8d7da;
        color: #721c24;
        padding: 10px;
        border-left: 4px solid #dc3545;
        margin-bottom: 20px;
        border-radius: 6px;
    }
</style>


@extends('admin.layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<div class="container">
    <h2>Tambah Produk</h2>

    @if ($errors->any())
        <div class="error-message">
            <ul style="margin: 0; padding-left: 18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Nama Produk</label>
        <input type="text" name="nama" required>

        <label>Deskripsi</label>
        <textarea name="deskripsi"></textarea>

        <label>Harga</label>
        <input type="number" name="harga" required>

        <label>Stok</label>
        <input type="number" name="stok" required>

        <label>Kategori</label>
        <select name="kategori" required>
            <option value="Cake">Cake</option>
            <option value="Pastry">Pastry</option>
        </select>

        <label>Gambar Produk</label>
        <input type="file" name="gambar">

        <button type="submit">Simpan Produk</button>
    </form>
</div>
@endsection
