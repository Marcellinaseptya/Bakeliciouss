@include('admin.layouts.app')

<!-- @section('title', 'Produk') -->

<!-- @section('content') -->

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #E9DCCC;
        margin: 0;
        padding: 0;
        color: #452725;
    }

    h2 {
        color: #452725;
        margin-bottom: 20px;
    }

    a {
        text-decoration: none;
        color: #452725;
    }

    a:hover {
        text-decoration: underline;
    }

    .btn-danger {
        background-color: #452725;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
    }

    .btn-danger:hover {
        background-color: #5a342f;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: white;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    table th, table td {
        padding: 10px;
        border: 1px solid #ccc;
        text-align: center;
    }

    table th {
        background-color: #452725;
        color: white;
    }

    img {
        border-radius: 8px;
    }

    .container {
        padding: 40px;
    }

    .success-message {
        background-color: #d4edda;
        color: #155724;
        padding: 10px;
        border-left: 4px solid #28a745;
        margin-bottom: 20px;
    }

    .add-button {
        background-color: #452725;
        color: white;
        padding: 8px 14px;
        border-radius: 4px;
        display: inline-block;
        margin-bottom: 20px;
    }

    .add-button:hover {
        background-color: #5a342f;
    }
</style>

<div class="container">
    <h2>Daftar Produk</h2>
    <a href="/admin/produk/create" class="add-button">+ Tambah Produk</a>

    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <table>
        <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Gambar</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
        @foreach($produk as $item)
        <tr>
            <td>{{ $item->nama }}</td>
            <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
            <td>{{ $item->stok }}</td>
            <td>
                @if ($item->gambar)
                    <img src="{{ asset('storage/' . $item->gambar) }}" width="80">
                @else
                    <em>Tidak ada gambar</em>
                @endif
            </td>
            <td>{{ $item->kategori }}</td>
            <td>
                <a href="{{ route('admin.produk.edit', $item->id_produk) }}">Edit</a> |
                <form action="{{ route('admin.produk.destroy', $item->id_produk) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin ingin menghapus produk ini?')" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
