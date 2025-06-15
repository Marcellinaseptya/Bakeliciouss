<style>
    body {
    font-family: sans-serif;
    margin: 0;
    padding: 0;
    background-color: #fdfdfd;
}

.about-section,
.visi-misi-section {
    padding: 60px 20px;
}

.about-section {
    background-color: #f3e9e1;
}

.visi-misi-section {
    background-color: #4d2c26;
    color: #fff;
}

.content-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    flex-wrap: wrap;
    gap: 40px;
}

.content-container.reverse {
    flex-direction: row-reverse;
}

.text {
    flex: 1;
    min-width: 300px;
}

.text h2 {
    font-size: 2em;
    margin-bottom: 10px;
}

.text p {
    font-size: 1em;
    line-height: 1.6;
}

.text ul {
    margin-top: 10px;
    padding-left: 20px;
}

.text ul li {
    margin-bottom: 5px;
}

.image {
    flex: 1;
    min-width: 280px;
    text-align: center;
}

.image img {
    width: 50%;
    height: 50%;
    max-width: 400px;
    border-radius: 15px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

</style>

@include('layouts.app')

@section('content')
<section class="about-section">
    <div class="content-container">
        <div class="text">
            
            <h2>Bakelicious</h2>
            <p>Bakelicious adalah usaha yang bergerak di bidang penjualan roti, menyajikan berbagai pilihan roti lezat dan segar setiap hari. Dengan bahan berkualitas dan proses pembuatan yang higienis, kami hadir untuk memberikan pengalaman menikmati roti yang nikmat dan dibuat dengan sepenuh hati.</p>
        </div>
        <div class="image">
            <img src="img/about.jpg" alt="Toko Roti">
        </div>
    </div>
</section>

<section class="visi-misi-section">
    <div class="content-container reverse">
        <div class="image">
            <img src="img/about2.jpg" alt="Etalase Roti">
        </div>
        <div class="text">
            <h2>Visi dan Misi Kita</h2>
            <p>Visi kita adalah menjadi brand roti lokal yang terpercaya dan dicintai, dengan kualitas rasa dan pelayanan terbaik.</p>
            <ul>
                <li>Menyediakan roti berkualitas tinggi yang segar dan lezat setiap hari.</li>
                <li>Menggunakan bahan alami dan proses produksi yang higienis.</li>
                <li>Memberikan pelayanan ramah dan kepuasan pelanggan sebagai prioritas utama.</li>
            </ul>
        </div>
    </div>
</section>
