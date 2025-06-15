<body>
    <nav class="navbar">
        <div class="navbar-brand">Admin Panel</div>
        <ul class="navbar-menu">
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('admin.produk.index') }}">Produk</a></li>
            <li><a href="#">Transaksi</a></li>
            <li><a href="#">User</a></li>
        </ul>
    </nav>

    <div class="container">
        <h1>@yield('title')</h1>
        @yield('content')
    </div>
</body>

