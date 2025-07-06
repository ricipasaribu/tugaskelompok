@extends('layouts.app')

@section('title', 'Dashboard User')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-12">
    <!-- Welcome Section -->
    <div class="text-center mb-10">
        <h1 class="text-4xl font-bold text-gray-800 mb-2 animate__animated animate__fadeInDown">
            👋 Selamat datang, {{ session('user_name') }}
        </h1>
        <p class="text-lg text-gray-600">
            Anda login sebagai <span class="font-semibold text-indigo-600">{{ ucfirst(session('user_role')) }}</span>.
        </p>
    </div>

    <!-- Cards Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        <!-- Card Produk -->
        <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition group">
            <div class="flex items-center justify-center w-12 h-12 rounded-full bg-blue-100 mb-4">
                <svg class="w-6 h-6 text-blue-600 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h8"></path>
                </svg>
            </div>
            <h3 class="text-lg font-bold text-gray-800 mb-2">📱 Info Produk Smartphone</h3>
            <p class="text-gray-600 mb-4">Temukan berbagai pilihan smartphone dari merek ternama seperti <strong>Apple</strong>, <strong>Samsung</strong>, dan lainnya.</p>
            <a href="/products" class="inline-block bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition font-medium shadow">
                🔍 Lihat Produk
            </a>
        </div>

        <!-- Card Riwayat Transaksi -->
        <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition group">
            <div class="flex items-center justify-center w-12 h-12 rounded-full bg-green-100 mb-4">
                <svg class="w-6 h-6 text-green-600 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10"></path>
                </svg>
            </div>
            <h3 class="text-lg font-bold text-gray-800 mb-2">🧾 Riwayat Transaksi</h3>
            <p class="text-gray-600 mb-4">Lihat pembelian yang pernah Anda lakukan dan status transaksi Anda.</p>
            <a href="/transactions/history" class="inline-block bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition font-medium shadow">
                📄 Lihat Riwayat
            </a>
        </div>

        <!-- Card Bantuan -->
        <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition group">
            <div class="flex items-center justify-center w-12 h-12 rounded-full bg-gray-200 mb-4">
                <svg class="w-6 h-6 text-gray-600 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-1.414 1.414M6.343 17.657l-1.415 1.415m12.728 0l1.415-1.415M6.343 6.343L4.929 4.929M12 3v2m0 14v2m9-9h-2M5 12H3"></path>
                </svg>
            </div>
            <h3 class="text-lg font-bold text-gray-800 mb-2">📞 Butuh Bantuan?</h3>
            <p class="text-gray-600 mb-4">Hubungi tim kami lewat halaman kontak jika Anda memiliki pertanyaan.</p>
            <a href="/contact" class="inline-block bg-gray-600 text-white py-2 px-4 rounded-lg hover:bg-gray-700 transition font-medium shadow">
                ✉️ Hubungi Kami
            </a>
        </div>
    </div>

    <!-- Extra Banner (Optional) -->
    <div class="mt-16 text-center bg-indigo-50 p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold text-indigo-700 mb-2">✨ Promo Spesial Minggu Ini!</h2>
        <p class="text-gray-600">Cek katalog produk terbaru kami dan nikmati harga menarik untuk smartphone pilihan.</p>
        <a href="/products" class="mt-4 inline-block bg-indigo-600 text-white py-2 px-5 rounded-lg hover:bg-indigo-700 transition font-semibold shadow">
            🎁 Lihat Promo
        </a>
    </div>
</div>
@endsection
