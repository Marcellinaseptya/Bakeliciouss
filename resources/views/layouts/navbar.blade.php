<style>/* CSS */
body {
  margin: 0;
  font-family:  sans-serif;
}

.navbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  background-color: #462826;
  padding: 1rem 1rem;
  color: white;
}

.logo img {
  height: 50px;
  width: 50px;
}

.search-bar input {
  padding: 0.5rem 1rem;
  border-radius: 20px;
  border: none;
  width: 350px;
  
}

.nav-links {
  display: flex;
  list-style: none;
  gap: 1rem;
}

.nav-links a {
  color: white;
  text-decoration: none;
  font-weight: bold;
  padding: 0.5rem 0.8rem;
  border-radius: 6px;
  transition: background-color 0.3s ease, color 0.3s ease;
}

.nav-links a:hover {
  background-color: #D7BBA8;
  color: #4E2A23;
}



.auth-buttons button {
  margin-left: 0.5rem;
  padding: 0.4rem 1rem;
  border: none;
  border-radius: 6px;
  font-weight: bold;
  cursor: pointer;
}

.auth-buttons .signin {
  background-color: white;
  color: #4E2A23;
}

.auth-buttons .register {
  background-color: #D7BBA8;
  color: #4E2A23;
}

.hero {
  position: relative;
  text-align: center;
}

.hero img {
  width: 100%;
  height: auto;
}

.hero h1 {
  position: absolute;
  bottom: 2rem;
  left: 50%;
  transform: translateX(-50%);
  color: white;
  font-size: 2rem;
  font-weight: bold;
  text-shadow: 0 2px 4px rgba(0,0,0,0.5);
}
</style>

<header class="navbar">
  <div class="logo">
    <img src="/img/logo.png" alt="Bakelicious Logo">
  </div>
  <div class="search-bar">
    <input type="text" placeholder="Hinted search text">
  </div>
  <nav>
    <ul class="nav-links">
      <li><a href="{{ route('landing') }}">Home</a></li>
      <li><a href="{{ route('produk.index') }}">Produk</a></li>
      <li><a href="{{ route('keranjang.index') }}">Keranjang</a></li>
      <li><a href="{{ route('transaksi.riwayat') }}">Riwayat</a></li>
      <li><a href="{{ route('komunitas.index') }}">Komunitas</a></li>
      <li><a href="{{ route('tentang.index') }}">Tentang Kami</a></li>
    </ul>
  </nav>
  <div class="auth-buttons">
    <button class="signin">Sign in</button>
  </div>
</header>

<!-- ⬇️ Tambahkan ini -->
<div class="container" style="padding: 2rem;">
    @yield('content')
</div>