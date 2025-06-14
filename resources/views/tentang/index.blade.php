@extends('layouts.navbar')

@section('content')
<div class="bg-[#f8f0e6] py-12 px-6">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center justify-between">
        <div class="md:w-1/2">
            <h2 class="text-4xl font-bold text-[#452725] mb-4">Bakelicious</h2>
            <p class="text-[#5a382f] leading-relaxed">
                Bakelicious adalah usaha yang bergerak di bidang penjualan roti, menyajikan berbagai pilihan roti lezat dan segar setiap hari. 
                Dengan bahan berkualitas dan proses pembuatan yang higienis, kami hadir untuk memberikan pengalaman menikmati roti yang nikmat dan dibuat dengan sepenuh hati.
            </p>
        </div>
        <div class="md:w-1/3 mt-8 md:mt-0">
            <img src="{{ asset('storage/img/tentang1.jpg') }}" alt="Toko Roti" class="rounded-xl shadow-md">
        </div>
    </div>
</div>

<div class="bg-[#452725] py-12 px-6">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center justify-between text-[#f8f0e6]">
        <div class="md:w-1/3 mb-8 md:mb-0">
            <img src="{{ asset('storage/img/tentang2.jpg') }}" alt="Display Produk" class="rounded-xl shadow-md">
        </div>
        <div class="md:w-1/2">
            <h2 class="text-3xl font-bold mb-4">Visi dan Misi Kita</h2>
            <p class="mb-4">
                Visi kita adalah menjadi brand roti lokal yang terpercaya dan dicintai, dengan kualitas rasa dan pelayanan terbaik.
            </p>
            <p class="font-semibold mb-2">Misi</p>
            <ul class="list-disc ml-6">
                <li>Menyediakan roti berkualitas tinggi yang segar dan lezat setiap hari.</li>
                <li>Menggunakan bahan alami dan proses produksi yang higienis.</li>
                <li>Memberikan pelayanan ramah dan kepuasan pelanggan sebagai prioritas utama.</li>
            </ul>
        </div>
    </div>
</div>
@endsection
