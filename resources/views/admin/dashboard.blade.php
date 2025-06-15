<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Dashboard Admin</h1>
    <p>Total Produk: {{ $totalProduk }}</p>
    <p>Total Transaksi: {{ $totalTransaksi }}</p>

    <a href="/admin/produk">Kelola Produk</a> |
    <a href="/admin/transaksi">Lihat Transaksi</a>
</body>
</html>
