<!DOCTYPE html>
<html>
<head>
    <title>Admin - @yield('title')</title>
    <style>
        body { font-family: Arial; margin: 0; padding: 0; }
        nav {
            background: #343a40;
            color: white;
            padding: 15px;
        }
        nav a {
            color: white;
            margin-right: 15px;
            text-decoration: none;
        }
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>
    <nav>
        <a href="/admin/dashboard">Home</a>
        <a href="/admin/transactions">Transaksi</a>
        <a href="/admin/products">Produk</a>
        <a href="/logout">Logout</a>
    </nav>

    <div class="content">
        @yield('content')
    </div>
</body>
</html>
