<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Daftar Produk</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }
    h2 {
      margin-bottom: 15px;
    }
    .alert-success {
      padding: 10px;
      background-color: #d4edda;
      color: #155724;
      border-radius: 5px;
      margin-bottom: 20px;
    }
    .btn-keranjang {
      display: inline-block;
      padding: 8px 12px;
      background-color: #f39c12;
      color: white;
      text-decoration: none;
      border-radius: 4px;
      margin-bottom: 20px;
    }
    form.search-form {
      margin-bottom: 20px;
    }
    form.search-form input[type="text"] {
      padding: 5px 8px;
      width: 200px;
      border: 1px solid #aaa;
      border-radius: 4px;
    }
    form.search-form button {
      padding: 6px 12px;
      background-color: #1976d2;
      border: none;
      color: white;
      border-radius: 4px;
      cursor: pointer;
    }
    form.search-form button:hover {
      background-color: #145ca8;
    }
    .produk-grid {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }
    .produk-card {
      border: 1px solid #ddd;
      border-radius: 8px;
      width: 30%;
      box-sizing: border-box;
      padding: 10px;
      text-align: center;
    }
    .produk-card img {
      width: 100%;
      height: 150px;
      object-fit: cover;
      border-radius: 6px;
    }
    .produk-card h4 {
      margin: 10px 0 6px 0;
      font-size: 18px;
    }
    .produk-card p {
      font-weight: bold;
      margin-bottom: 10px;
      color: #444;
    }
    .produk-card form {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 6px;
    }
    .produk-card label {
      font-size: 14px;
    }
    .produk-card input[type="number"] {
      width: 60px;
      padding: 5px;
      border-radius: 4px;
      border: 1px solid #aaa;
      text-align: center;
    }
    .produk-card button {
      background-color: #28a745;
      border: none;
      padding: 6px 14px;
      color: white;
      border-radius: 5px;
      cursor: pointer;
    }
    .produk-card button:hover {
      background-color: #1e7e34;
    }
    @media screen and (max-width: 768px) {
      .produk-card {
        width: 48%;
      }
    }
    @media screen and (max-width: 480px) {
      .produk-card {
        width: 100%;
      }
    }
  </style>
</head>
<body>

  <h2>Daftar Produk</h2>

  {{-- Notifikasi Sukses --}}
  @if(session('success'))
    <div class="alert-success">
      {{ session('success') }}
    </div>
  @endif

  {{-- Tombol ke Keranjang --}}
  <a href="{{ route('keranjang.index') }}" class="btn-keranjang">
    🛒 Lihat Keranjang
  </a>

  {{-- Form Pencarian --}}
  <form class="search-form" action="{{ route('produk.index') }}" method="GET">
    <input type="text" name="search" placeholder="Cari produk..." value="{{ request('search') }}">
    <button type="submit">Cari</button>
  </form>

  {{-- Daftar Produk --}}
  <div class="produk-grid">
    @foreach($produk as $item)
      <div class="produk-card">
        @if($item->gambar)
          <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}">
        @else
          <img src="https://via.placeholder.com/250x150?text=No+Image" alt="No Image">
        @endif
        <h4>{{ $item->nama }}</h4>
        <p>Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
        <form action="{{ route('keranjang.tambah') }}" method="POST">
          @csrf
          <input type="hidden" name="produk_id" value="{{ $item->id_produk }}">
          <label for="jumlah-{{ $item->id_produk }}">Jumlah:</label>
          <input type="number" id="jumlah-{{ $item->id_produk }}" name="jumlah" value="1" min="1" />
          <button type="submit">Tambah 🛒</button>
        </form>

      </div>
    @endforeach
  </div>

</body>
</html>
