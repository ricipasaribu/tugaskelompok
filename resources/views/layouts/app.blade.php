<!DOCTYPE html>
<html>

<head>
    <title>Website Smartphone</title>
</head>

<body>
    <nav style="background: #ddd; padding: 10px;">
        <a href="/dashboard" style="margin-right: 15px;">Home</a>
        <a href="/products" style="margin-right: 15px;">Produk</a>
        <a href="/about" style="margin-right: 15px;">About</a>
         <a href="/transactions/history" style="margin-right: 15px;">Riwayat</a>
        <a href="/contact" style="margin-right: 15px;">Contact Us</a>
        <span style="float:right;">
            Login sebagai <strong>{{ session('user_name') }}</strong>
            | <a href="/logout">Logout</a>
        </span>
    </nav>

    <div style="padding: 20px;">
        @yield('content')
    </div>


</body>

</html>
