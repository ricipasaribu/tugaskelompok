@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-10">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-gray-800">🛒 Daftar Produk Smartphone</h2>
            <p class="text-gray-500 mt-2">Pilih produk favorit Anda dan langsung checkout sekarang!</p>
        </div>

        @if ($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach ($products as $product)
                    <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-transform hover:-translate-y-1 overflow-hidden flex flex-col">
                        <div class="w-full aspect-[4/3] overflow-hidden">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                 class="w-full h-full object-cover object-center transition duration-300 hover:scale-105">
                        </div>

                        <div class="p-4 flex flex-col justify-between flex-grow">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $product->name }}</h3>
                            <p class="text-green-600 font-bold text-md mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>

                            <a href="{{ route('transactions.buy', $product->id) }}"
                               class="mt-auto bg-blue-600 text-white text-center py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300 font-medium shadow">
                                🛍️ Beli Sekarang
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-20">
                <img src="https://cdn-icons-png.flaticon.com/512/4076/4076549.png" class="w-32 mx-auto mb-6 opacity-60" alt="No products">
                <p class="text-gray-500 text-lg mb-6">Produk belum tersedia saat ini.</p>
                <a href="/" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition shadow">
                    🔙 Kembali ke Beranda
                </a>
            </div>
        @endif
    </div>
@endsection
