<!DOCTYPE html>
<html>
<head>
    <title>Admin - @yield('title')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #E9DCCC;
            color: #452725;
        }

        nav {
            background-color: #452725;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 20px;
        }

        .navbar-menu {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 20px;
        }

        .navbar-menu li a {
            color: white;
            text-decoration: none;
            font-weight: 500;
        }

        .navbar-menu li a:hover {
            text-decoration: underline;
        }

        .container {
            padding: 30px;
        }
    </style>
</head>
<body>
    <nav>
        <div class="navbar-brand">Halaman Admin</div>
        <ul class="navbar-menu">
            <li><a href="/admin/dashboard">Dashboard</a></li>
            <li><a href="/admin/produk">Produk</a></li>
            <li><a href="#">Transaksi</a></li>
            <li><a href="#">User</a></li>
        </ul>
    </nav>

    <div class="container">
        <h1>@yield('title')</h1>
        @yield('content')
    </div>
</body>
</html>
