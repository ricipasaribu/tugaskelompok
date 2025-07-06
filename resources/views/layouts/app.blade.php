<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Website Smartphone')</title>

    {{-- ✅ Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- ✅ Optional: Font Inter (biar lebih clean) --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800">

    {{-- ✅ Navigation --}}
    <nav class="bg-blue-600 text-white px-6 py-4 shadow-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="space-x-4">
                <a href="/dashboard" class="hover:underline font-semibold">Home</a>
                <a href="/products" class="hover:underline font-semibold">Produk</a>
                <a href="/transactions/history" class="hover:underline font-semibold">Riwayat</a>
                <a href="/about" class="hover:underline font-semibold">About</a>
                <a href="/contact" class="hover:underline font-semibold">Contact Us</a>
            </div>

            <div class="text-sm">
                Login sebagai <strong>{{ session('user_name') }}</strong>
                | <a href="/logout" class="underline hover:text-gray-200">Logout</a>
            </div>
        </div>
    </nav>

    {{-- ✅ Main Content --}}
    <div class="max-w-7xl mx-auto px-4 py-8">
        @yield('content')
    </div>

</body>

</html>
