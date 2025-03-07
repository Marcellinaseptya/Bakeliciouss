<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BakeLicious - Toko Kue Lezat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-pink-500 text-white text-center py-6">
        <h1 class="text-4xl font-bold">BakeLicious</h1>
        <p class="text-lg">Rasakan Kelezatan Kue Terbaik!</p>
    </header>

    <nav class="bg-pink-500 text-white py-4 px-6 flex justify-between items-center shadow-lg fixed w-full top-0 z-50">
        <a href="/" class="text-2xl font-bold">BakeLicious</a>
        
        <ul class="flex space-x-6">
            <li><a href="{{ route('produk.index') }}" class="hover:underline">Produk</a></li>
            <li><a href="{{ route('keranjang.index') }}" class="hover:underline">Keranjang</a></li>
            <li><a href="{{ route('about') }}" class="hover:underline">About Us</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <section class="text-center py-12 bg-cover bg-center" style="background-image: url('https://source.unsplash.com/1600x900/?cake,bakery');">
        <div class="bg-black bg-opacity-50 py-16 px-4 text-white">
            <h2 class="text-3xl font-bold">Selamat Datang di BakeLicious</h2>
            <p class="mt-2 text-lg">Kue lezat dengan rasa otentik yang dibuat dengan cinta.</p>
            <a href="/produk" class="mt-4 inline-block bg-yellow-400 text-black px-6 py-3 rounded-lg font-bold">Lihat Produk</a>
        </div>
    </section>

    <!-- Tentang Kami -->
    <section class="text-center py-12 px-6">
        <h2 class="text-2xl font-bold">Tentang Kami</h2>
        <p class="mt-2 text-gray-700">BakeLicious adalah toko kue yang menawarkan berbagai pilihan kue berkualitas tinggi dengan bahan terbaik.</p>
    </section>

    <!-- Produk Unggulan -->
    <section class="py-12 px-6">
        <h2 class="text-2xl font-bold text-center">Produk Unggulan</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
            @foreach($produkUnggulan as $produk)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama }}" class="w-full h-40 object-cover">
                <div class="p-4">
                        <h3 class="text-lg font-bold">{{ $produk->nama }}</h3>
                        <p class="text-gray-700 text-sm">{{ $produk->deskripsi }}</p>
                        <p class="text-pink-500 font-bold mt-2">Rp {{ $produk->harga }}</p>
                        <a href="/produk" class="mt-2 block text-center bg-pink-500 text-white py-2 rounded-lg">Lihat Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Testimoni -->
    <section class="bg-pink-100 py-12 px-6 text-center">
        <h2 class="text-2xl font-bold">Apa Kata Mereka?</h2>
        <div class="mt-6">
            <p class="text-lg italic">"Kue dari BakeLicious benar-benar enak! Lembut dan manisnya pas!"</p>
            <p class="mt-2 font-bold">- User</p>
        </div>
    </section>

    <!-- Kontak -->
    <section class="text-center py-12 px-6">
        <h2 class="text-2xl font-bold">Hubungi Kami</h2>
        <p class="text-gray-700 mt-2">📍 Sidoarjo</p>
        <p class="text-gray-700">📞 0812-3456-7890</p>
        <p class="text-gray-700">📧 bakelicious@example.com</p>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4">
        <p>&copy; 2025 BakeLicious. All Rights Reserved.</p>
    </footer>
</body>
</html>