@extends('layouts.app') 

@section('content') 

<div class="container"> 
    <h3>Edit Data produk</h3>
    <form action="{{ url('/produk/' . $item->id_produk) }}" method="POST">
        <input name="_method" type="hidden" value="PATCH">
        @csrf
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td><input type="text" name="deskripsi"></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td><input type="number" name="harga"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="number" name="stok"></td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td><input type="file" name="gambar"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Save"></td>
            </tr>
        </table>
    </form>
</div>

@endsection