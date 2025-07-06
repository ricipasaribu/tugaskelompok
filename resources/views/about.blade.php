@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
<div class="bg-white py-16 px-6">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-indigo-700 mb-4">📱 Tentang Kami</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Kami adalah platform penjualan smartphone online yang terpercaya, memberikan kemudahan, kualitas, dan kenyamanan dalam setiap transaksi.</p>
        </div>

        <!-- Company Image & Intro -->
        <div class="flex flex-col md:flex-row items-center gap-10 mb-20">
            <img src="https://images.unsplash.com/photo-1510552776732-03e61cf4b144?auto=format&fit=crop&w=800&q=80" alt="Tentang Kami" class="rounded-xl shadow-lg w-full md:w-1/2 object-cover">
            <div class="md:w-1/2">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Kenapa Memilih Kami?</h3>
                <ul class="space-y-3 text-gray-600">
                    <li>✅ Produk 100% Original & Bergaransi</li>
                    <li>✅ Pengiriman Cepat & Aman</li>
                    <li>✅ Berbagai Merek Ternama: Apple, Samsung, Xiaomi, dll.</li>
                    <li>✅ Dukungan Pelanggan yang Responsif</li>
                </ul>
            </div>
        </div>

        <!-- Visi & Misi -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-20">
            <div class="bg-indigo-50 p-8 rounded-xl shadow-md">
                <h4 class="text-xl font-bold text-indigo-700 mb-2">🎯 Visi Kami</h4>
                <p class="text-gray-700">Menjadi toko smartphone online terpercaya dan terdepan di Indonesia dengan layanan terbaik dan pengalaman belanja yang menyenangkan.</p>
            </div>
            <div class="bg-purple-50 p-8 rounded-xl shadow-md">
                <h4 class="text-xl font-bold text-purple-700 mb-2">🚀 Misi Kami</h4>
                <ul class="list-disc list-inside text-gray-700 space-y-2">
                    <li>Menyediakan produk berkualitas dan bergaransi resmi</li>
                    <li>Memberikan layanan pelanggan terbaik</li>
                    <li>Mempermudah proses transaksi online</li>
                    <li>Menghadirkan pengalaman belanja yang cepat dan aman</li>
                </ul>
            </div>
        </div>

        <!-- Testimoni -->
        <div class="bg-gray-50 py-12 px-6 rounded-lg shadow-lg text-center mb-20">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">💬 Apa Kata Mereka?</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <p class="text-gray-600 mb-4 italic">"Produk datang cepat dan sesuai. Recommended banget!"</p>
                    <h4 class="font-semibold text-gray-800">- Putri A.</h4>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <p class="text-gray-600 mb-4 italic">"Adminnya ramah dan proses belanja sangat mudah."</p>
                    <h4 class="font-semibold text-gray-800">- Budi S.</h4>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <p class="text-gray-600 mb-4 italic">"Harga bersaing dan barang original. Puas banget!"</p>
                    <h4 class="font-semibold text-gray-800">- Rina M.</h4>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="text-center">
            <h3 class="text-2xl font-bold text-gray-800 mb-4">Tertarik? Yuk Mulai Belanja Sekarang!</h3>
            <a href="/products" class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-lg shadow hover:bg-indigo-700 transition font-semibold">
                🛍️ Lihat Produk
            </a>
        </div>
    </div>
</div>
@endsection
