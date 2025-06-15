<style>
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

    img.preview {
        display: block;
        margin-bottom: 15px;
        max-width: 120px;
        border-radius: 6px;
    }
</style>



@extends('admin.layouts.app')

@section('title', 'Edit Produk')

@section('content')
<div class="container">
    <h2>Edit Produk</h2>

    <form action="{{ route('admin.produk.update', $item->id_produk) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Nama Produk</label>
        <input type="text" name="nama" value="{{ $item->nama }}" required>

        <label>Deskripsi</label>
        <textarea name="deskripsi">{{ $item->deskripsi }}</textarea>

        <label>Harga</label>
        <input type="number" name="harga" value="{{ $item->harga }}" required>

        <label>Stok</label>
        <input type="number" name="stok" value="{{ $item->stok }}" required>

        <label>Kategori</label>
        <select name="kategori" required>
            <option value="Cake" {{ $item->kategori == 'Cake' ? 'selected' : '' }}>Cake</option>
            <option value="Pastry" {{ $item->kategori == 'Pastry' ? 'selected' : '' }}>Pastry</option>
        </select>

        <label>Gambar</label>
        @if ($item->gambar)
            <img src="{{ asset('storage/' . $item->gambar) }}" class="preview">
        @endif
        <input type="file" name="gambar">

        <button type="submit">Update Produk</button>
    </form>
</div>
@endsection
