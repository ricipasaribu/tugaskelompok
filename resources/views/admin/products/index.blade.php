@extends('layouts.admin')

@section('title', 'Produk')

@section('breadcrumb')
    <li>
        <div class="flex items-center">
            <svg class="w-4 h-4 mx-1 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                <path d="M6 9a1 1 0 011-1h6a1 1 0 010 2H7a1 1 0 01-1-1z" />
            </svg>
            <span class="text-gray-500">Produk</span>
        </div>
    </li>
@endsection

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-indigo-700">📦 Daftar Produk</h2>
        <a href="/admin/products/create" class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow-md transition">
            + Tambah Produk
        </a>
    </div>

    @if(count($products) > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($products as $product)
                <div class="bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden transition border border-gray-200">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-100 flex items-center justify-center text-gray-400 text-sm">Tidak ada gambar</div>
                    @endif

                    <div class="p-4 space-y-2">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }} <span class="text-sm text-gray-500">({{ $product->brand }})</span></h3>
                        <p class="text-green-600 font-semibold">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <p class="text-sm text-gray-500">Stok: {{ $product->stock }}</p>

                        <div class="flex justify-between items-center mt-3">
                            <a href="/products/{{ $product->id }}/edit" class="text-sm bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition">✏️ Edit</a>

                            <form action="/products/{{ $product->id }}" method="POST" onsubmit="return confirm('Yakin hapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded shadow">
            <p>⚠️ Belum ada produk yang ditambahkan.</p>
        </div>
    @endif
@endsection
