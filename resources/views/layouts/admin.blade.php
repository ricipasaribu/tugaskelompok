<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Optional Custom Styles -->
    <style>
        .nav-link {
            @apply text-gray-300 hover:text-white px-3 py-2 transition duration-200;
        }
        .nav-link-active {
            @apply text-white font-semibold bg-indigo-700 px-3 py-2 rounded;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-indigo-500 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center space-x-6">
                    <a href="/admin/dashboard" class="text-white text-xl font-bold">📊 AdminPanel</a>
                    <a href="/admin/dashboard" class="nav-link">Home</a>
                    <a href="/admin/transactions" class="nav-link">Transaksi</a>
                    <a href="/admin/products" class="nav-link">Produk</a>
                </div>
                <div class="text-sm text-white">
                    Admin: {{ session('user_name') }} |
                    <a href="/logout" class="ml-2 text-red-300 hover:text-red-500 transition">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-10 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">

            <!-- Breadcrumb -->
            @hasSection('breadcrumb')
                <nav class="flex mb-6 text-sm text-gray-600" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="/admin/dashboard" class="inline-flex items-center text-gray-500 hover:text-indigo-600">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7m-9 2v10a1 1 0 001 1h3a1 1 0 001-1V14h3l4 4V8a2 2 0 00-2-2h-4.586a1 1 0 00-.707.293l-9 9a1 1 0 001.414 1.414L12 7.414V14"></path>
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        @yield('breadcrumb')
                    </ol>
                </nav>
            @endif

            <!-- Page Content -->
            <div class="bg-white p-6 rounded-lg shadow">
                @yield('content')
            </div>
        </div>
    </main>

</body>
</html>
