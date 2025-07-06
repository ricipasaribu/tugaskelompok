@extends('layouts.admin')

@section('title', 'Dashboard')

@section('breadcrumb')
    <li>
        <div class="flex items-center">
            <svg class="w-4 h-4 mx-1 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                <path d="M6 9a1 1 0 011-1h6a1 1 0 010 2H7a1 1 0 01-1-1z" />
            </svg>
            <span class="text-gray-500">Dashboard</span>
        </div>
    </li>
@endsection

@section('content')
    <div class="text-center mb-8">
        <h1 class="text-3xl font-extrabold text-indigo-700">📊 Selamat Datang di Dashboard Admin</h1>
        <p class="text-gray-600 mt-2">Kelola produk, transaksi, dan lihat statistik penjualan toko Anda.</p>
    </div>

    <!-- Stat Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Total Produk -->
        <div class="bg-white shadow-lg rounded-lg p-6 border-t-4 border-indigo-500 hover:shadow-xl transition">
            <div class="flex items-center space-x-4">
                <div class="bg-indigo-100 p-3 rounded-full">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V7a2 2 0 00-2-2h-4V3H8v2H4a2 2 0 00-2 2v6h18zm0 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5h16z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Total Produk</h2>
                    <p class="text-2xl font-bold text-indigo-700">{{ $totalProducts }}</p>
                </div>
            </div>
        </div>

        <!-- Transaksi Selesai -->
        <div class="bg-white shadow-lg rounded-lg p-6 border-t-4 border-green-500 hover:shadow-xl transition">
            <div class="flex items-center space-x-4">
                <div class="bg-green-100 p-3 rounded-full">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Transaksi Selesai</h2>
                    <p class="text-2xl font-bold text-green-700">{{ $totalSuccessTransactions }}</p>
                </div>
            </div>
        </div>

        <!-- Total Pendapatan -->
        <div class="bg-white shadow-lg rounded-lg p-6 border-t-4 border-yellow-500 hover:shadow-xl transition">
            <div class="flex items-center space-x-4">
                <div class="bg-yellow-100 p-3 rounded-full">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.5 0-2.5 1-2.5 2.5S10.5 13 12 13s2.5-1 2.5-2.5S13.5 8 12 8zm0 0v8" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Total Pendapatan</h2>
                    <p class="text-2xl font-bold text-yellow-700">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA / Info Tambahan -->
    <div class="mt-12 bg-gradient-to-r from-indigo-500 to-purple-600 text-white p-6 rounded-xl shadow-lg text-center">
        <h2 class="text-2xl font-bold mb-2">Terima kasih sudah menjaga performa toko 📈</h2>
        <p class="text-sm">Pantau terus statistik dan pastikan produk selalu update agar pelanggan tetap puas.</p>
    </div>
@endsection
