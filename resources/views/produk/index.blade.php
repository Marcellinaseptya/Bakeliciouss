<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Daftar Produk</h2>

        <!-- Tombol Tambah Produk -->
        <a href="{{ url('/produk/tambah') }}" class="btn btn-primary mb-3">Tambah Produk</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Gambar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produk as $item)
                <tr>
                    <td>{{ $item->id_produk }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>Rp {{ $item->harga }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>
                        @if($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar {{ $item->nama }}" width="50">
                        @else
                            Tidak ada gambar
                        @endif
                    </td>
                    <td><a href="{{ url('produk/' . $item->id_produk . '/edit') }}">Edit</a></td>
                <td><form action="{{ url('produk/' . $item->id_produk) }}" method="POST">
                    <input name="_method" type="hidden" value="DELETE">
                    @csrf
                    <button>Delete</button>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
