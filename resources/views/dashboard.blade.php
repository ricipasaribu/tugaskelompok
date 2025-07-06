<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Selamat Datang di Dashboard</h1>
    <p>Halo, {{ session('user_name') }}! Anda login sebagai <strong>{{ session('user_role') }}</strong>.</p>

    <a href="/logout">Logout</a>
</body>
</html>
