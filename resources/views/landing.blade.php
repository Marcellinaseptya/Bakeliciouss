<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>BakeLicious - Toko Kue Lezat</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f7f3ee] font-sans text-[#3c2f2f]">

<style>
.hero-section {
  position: relative;
  width: 100vw;
  height: 600px;
  overflow: hidden;
}

.hero-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.hero-text {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
  font-size: 2.5rem;
  font-weight: bold;
  background-color: rgba(186, 155, 115, 0.35);
  padding: 0.5rem 2rem;
  border-radius: 8px;
  text-align: center;
}

.why-choose-us {
  padding: 20px 20px;
  background-color: #E9DCCC;
  text-align: center;
}

.section-title {
  font-size: 2.5rem;
  font-weight: bold;
  margin-bottom: 40px;
  color: #4e2c2c;
}

.features {
  display: flex;
  justify-content: center;
  gap: 40px;
  flex-wrap: wrap;
}

.feature {
  background-color: #fff;
  padding: 20px;
  width: 250px;
  border-radius: 12px;
  border-color: #4e342e;
  border-left: 12px  #4e342e;
  border-right: 12px  #4e342e;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
}

.feature img {
  display: block;
  margin: 0 auto 16px; /* Otomatis tengah + spasi bawah */
  width: 200px;
  height: 200px;
  object-fit: cover; /* Untuk memotong rapi jika gambar tidak proporsional */
  border-radius: 8px;
}


.feature:hover {
  transform: translateY(-10px);
}

/* .feature img {
  width: 80px;
  height: 80px;
  object-fit: contain;
  margin-bottom: 16px;
} */

.feature h3 {
  font-size: 1.5rem;
  margin-bottom: 10px;
  color: #6b3d3d;
}

.feature p {
  color: #333;
  font-size: 0.95rem;
}

.signature-terms {
  background-color: #4e342e;
  color: #fff;
  padding: 60px 40px;
}

.signature-wrapper {
  display: flex;
  flex-direction: column;
  gap: 40px;
  align-items: center;
  justify-content: center;
}

@media (min-width: 768px) {
  .signature-wrapper {
    flex-direction: row;
    justify-content: space-between;
  }
}

.signature-text {
  max-width: 400px;
  text-align: center;
}

@media (min-width: 768px) {
  .signature-text {
    text-align: left;
  }
}

.signature-heading {
  font-size: 32px;
  font-weight: bold;
  margin-bottom: 20px;
  font-family: 'Poppins', sans-serif;
}

.signature-description {
  font-size: 14px;
  line-height: 1.6;
  margin-bottom: 24px;
}

.signature-btn {
  display: inline-block;
  padding: 10px 24px;
  background-color: #a1887f;
  color: #fff;
  border-radius: 999px;
  text-decoration: none;
  font-weight: bold;
  transition: background-color 0.3s ease;
}

.signature-btn:hover {
  background-color: #8d6e63;
}

.signature-images {
  display: flex;
  gap: 20px;
  flex-wrap: wrap;
  justify-content: center;
}

.signature-image {
  width: 180px;
  height: 180px;
  object-fit: cover;
  border: 6px solid #fbeee0;
  border-radius: 20px;
}

.signature-products {
  background-color: #E9DCCC;
  padding: 60px 40px;
}

.product-wrapper {
  display: flex;
  flex-wrap: wrap;
  gap: 40px;
  justify-content: center;
}

.product-card {
  display: flex;
  align-items: center;
  gap: 30px;
  max-width: 500px;
  background-color: #E9DCCC;
}

.product-text {
  flex: 1;
}

.product-title {
  font-size: 24px;
  font-weight: bold;
  color: #2e1503;
  margin-bottom: 10px;
  font-family: 'Poppins', sans-serif;
}

.product-desc {
  font-size: 14px;
  color: #3c2b23;
  line-height: 1.6;
  margin-bottom: 16px;
}

.product-btn {
  background-color: #5d4037;
  color: #fff;
  padding: 10px 20px;
  border-radius: 999px;
  text-decoration: none;
  font-weight: bold;
  display: inline-block;
  transition: background-color 0.3s ease;
}

.product-btn:hover {
  background-color: #3e2723;
}

.product-image-circle {
  width: 180px;
  height: 180px;
  border: 6px solid #4e342e;
  border-radius: 50%;
  overflow: hidden;
  flex-shrink: 0;
}

.product-image-circle img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

/* Section Container */
.special-section {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  background-color: #4a2b24; /* Cokelat tua sesuai gambar */
  padding: 40px 60px;
  color: #fff;
  font-family: sans-serif;
}

/* Kiri */
.special-left {
  width: 35%;
}

.special-left h2 {
  font-size: 2rem;
  margin-bottom: 20px;
  color: #fff;
}

.special-left p {
  font-size: 1rem;
  line-height: 1.6;
  color: #e0d7d2;
  margin-bottom: 20px;
}

.special-left button {
  padding: 10px 30px;
  background-color: #e8d9c2;
  border: none;
  border-radius: 20px;
  font-weight: bold;
  color: #4a2b24;
  cursor: pointer;
  transition: background 0.3s;
}

.special-left button:hover {
  background-color: #d6c3aa;
}

/* Kanan */
.special-right {
  width: 60%;
  text-align: center;
}

.special-right h2 {
  font-size: 2rem;
  margin-bottom: 30px;
  color: #fff;
}

/* Cards */
.image-cards {
  display: flex;
  justify-content: center;
  gap: 20px;
}

.image-cards img {
  width: 150px;
  height: 150px;
  border: 5px solid #f5e7dc;
  border-radius: 12px;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.image-cards img:hover {
  transform: scale(1.05);
}

.footer {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  background-color: #f3e4d2;
  padding: 40px 60px;
  flex-wrap: wrap;
  font-family: sans-serif;
}

/* Bagian Hubungi Kami */
.contact-info {
  width: 40%;
  text-align: left;
}

.contact-info h2 {
  font-size: 1.5rem;
  font-weight: bold;
  margin-bottom: 10px;
  color: #2d2d2d;
}

.contact-info p {
  color: #333;
  margin-bottom: 5px;
}

/* Bagian Customer Service */
.customer-service {
  width: 50%;
  text-align: right;
}

.customer-service h3 {
  font-size: 1.2rem;
  margin-bottom: 20px;
  color: #2d2d2d;
}

.customer-service .icons {
  display: flex;
  justify-content: flex-end;
  align-items: center;
  gap: 50px;
  flex-wrap: wrap;
}

.customer-service .item {
  display: flex;
  flex-direction: column;
  align-items: center;
  font-size: 0.95rem;
  color: #2d2d2d;
}

.customer-service .item img {
  width: 30px;
  height: 30px;
  margin-bottom: 5px;
}



</style>


@include('layouts.navbar')

<section class="hero-section">
  <img src="/img/hero.jpg" alt="Hero" class="hero-img" />
  <div class="hero-text">Freshly baked just for you!</div>
</section>

<section class="why-choose-us">
  <h2 class="section-title">Why Choosing Us</h2>
  <div class="features">
    <div class="feature">
      <img src="/img/why1.jpg" alt="Natural Ingredients" />
      <h3>Bahan Alami</h3>
      <p>Kami hanya menggunakan bahan alami tanpa pengawet buatan.</p>
    </div>
    <div class="feature">
      <img src="/img/why2.jpg" alt="Freshly Baked" />
      <h3>Selalu Fresh</h3>
      <p>Semua produk kami dipanggang setiap hari untuk kesegaran maksimal.</p>
    </div>
    <div class="feature">
      <img src="/img/why3.jpg" alt="Expert Bakers" />
      <h3>Ahli Roti</h3>
      <p>Tim kami terdiri dari baker profesional berpengalaman.</p>
    </div>
  </div>
</section>


<section class="signature-terms">
  <div class="signature-wrapper">
    <div class="signature-text">
      <h2 class="signature-heading">Signature Terms</h2>
      <p class="signature-description">
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod eu fugiat nulla pariatur. 
        Excepteur sint occaecat cupid"
      </p>
      <a href="/produk" class="signature-btn">Buy</a>
    </div>
    <div class="signature-images">
      @foreach($produkUnggulan->take(2) as $produk)
        <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama }}" class="signature-image">
      @endforeach
    </div>
  </div>
</section>



<section class="signature-products">
  <div class="product-wrapper">
    @foreach($produkUnggulan->take(2) as $produk)
      <div class="product-card">
        <div class="product-text">
          <h3 class="product-title">{{ $produk->nama }}</h3>
          <p class="product-desc">
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupid"
          </p>
          <a href="/produk" class="product-btn">Buy</a>
        </div>
        <div class="product-image-circle">
          <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama }}">
        </div>
      </div>
    @endforeach
  </div>
</section>


<section class="special-section">
  <div class="special-left">
    <h2>Morning Special</h2>
    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod eu fugiat nulla pariatur. Excepteur sint occaecat cupid"</p>
    <button>Buy</button>
  </div>

  <div class="special-right">
    <h2>Why Choose Us?</h2>
    <div class="image-cards">
      <img src="/img/img1.jpg" alt="Cake 1">
      <img src="/img/img2.jpg" alt="Cake 2">
      <img src="/img/img3.jpg" alt="Cake 3">
    </div>
  </div>
</section>


  <!-- Contact -->
<footer class="footer">
  <section class="contact-info">
    <h2>Hubungi Kami</h2>
    <p>📍 Sidoarjo</p>
    <p>📞 0812-3456-7890</p>
    <p>📧 bakelicious@example.com</p>
  </section>

  <section class="customer-service">
    <!-- <h3>Customer Service</h3> -->
    <div class="icons">
      <div class="item">
        <img src="/img/ig.png" alt="Instagram">
        <p>@bakelicious.id</p>
      </div>
      <div class="item">
        <img src="/img/tt.png" alt="YouTube">
        <p>bakelicious.id</p>
      </div>
      <div class="item">
        <img src="/img/email.png" alt="Email">
        <p>bakelicious@gmail.com</p>
      </div>
    </div>
  </section>
</footer>


  <!-- Footer -->
  <footer class="bg-[#3e2723] text-white text-center py-4">
    <p>&copy; 2025 BakeLicious. All rights reserved.</p>
  </footer>

</body>
</html>
