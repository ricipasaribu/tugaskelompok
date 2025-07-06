@extends('layouts.app')

@section('title', 'Hubungi Kami')

@section('content')
<div class="bg-white py-16 px-6">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-indigo-700 mb-4">📞 Hubungi Kami</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Punya pertanyaan atau butuh bantuan? Tim kami siap membantu Anda kapan saja!</p>
        </div>

        <!-- Grid Kontak dan Form -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <!-- Info Kontak -->
            <div class="space-y-6">
                <div class="flex items-start space-x-4">
                    <div class="bg-indigo-100 text-indigo-600 p-3 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 2H8a2 2 0 00-2 2v16l7-3 7 3V4a2 2 0 00-2-2z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800">Alamat</h4>
                        <p class="text-gray-600">Jl. Teknologi No. 99, Medan, Sumatera Utara</p>
                    </div>
                </div>
                <div class="flex items-start space-x-4">
                    <div class="bg-green-100 text-green-600 p-3 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h2l.4 2M7 13h10l1-5H6.4M16 16a2 2 0 11-4 0 2 2 0 014 0zm-6 0a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800">Telepon</h4>
                        <p class="text-gray-600">0812-3456-7890</p>
                    </div>
                </div>
                <div class="flex items-start space-x-4">
                    <div class="bg-blue-100 text-blue-600 p-3 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m8 0a4 4 0 01-8 0m8 0V8a4 4 0 00-8 0v4m0 0a4 4 0 008 0" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800">Email</h4>
                        <p class="text-gray-600">support@tokohp.com</p>
                    </div>
                </div>
            </div>

            <!-- Form Kontak -->
            <div class="bg-gray-50 p-6 rounded-xl shadow-lg">
                <form action="#" method="POST" class="space-y-5">
                    <div>
                        <label for="name" class="block font-semibold text-gray-700">Nama Lengkap</label>
                        <input type="text" id="name" name="name" class="w-full mt-1 p-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Masukkan nama Anda">
                    </div>
                    <div>
                        <label for="email" class="block font-semibold text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="w-full mt-1 p-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Masukkan email aktif Anda">
                    </div>
                    <div>
                        <label for="message" class="block font-semibold text-gray-700">Pesan</label>
                        <textarea id="message" name="message" rows="5" class="w-full mt-1 p-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Tulis pesan atau pertanyaan Anda di sini..."></textarea>
                    </div>
                    <div>
                        <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition font-semibold">
                            🚀 Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Map Section -->
        <div class="mt-16">
            <h3 class="text-xl font-bold text-gray-800 mb-4">📍 Lokasi Kami</h3>
            <div class="w-full h-64 rounded-xl shadow-lg overflow-hidden">
                <iframe src="https://maps.google.com/maps?q=medan&output=embed" width="100%" height="100%" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
@endsection
