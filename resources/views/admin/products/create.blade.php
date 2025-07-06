@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('breadcrumb')
    <li>
        <div class="flex items-center">
            <svg class="w-4 h-4 mx-1 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                <path d="M6 9a1 1 0 011-1h6a1 1 0 010 2H7a1 1 0 01-1-1z" />
            </svg>
            <a href="/admin/products" class="text-indigo-600 hover:underline">Produk</a>
        </div>
    </li>
    <li>
        <div class="flex items-center">
            <svg class="w-4 h-4 mx-1 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                <path d="M6 9a1 1 0 011-1h6a1 1 0 010 2H7a1 1 0 01-1-1z" />
            </svg>
            <span class="text-gray-500">Tambah Produk</span>
        </div>
    </li>
@endsection

@section('content')
    <h2 class="text-2xl font-bold text-indigo-700 mb-6">🆕 Tambah Produk Baru</h2>

    @if(session('success'))
        <div class="mb-4 p-4 text-green-800 bg-green-100 border border-green-300 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/admin/products" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md space-y-5">
        @csrf

        <div>
            <label class="block mb-1 font-medium text-gray-700">Nama Produk:</label>
            <input type="text" name="name" required
                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div>
            <label class="block mb-1 font-medium text-gray-700">Merk:</label>
            <input type="text" name="brand" required
                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-1 font-medium text-gray-700">Harga (Rp):</label>
                <input type="number" name="price" required
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <div>
                <label class="block mb-1 font-medium text-gray-700">Stok:</label>
                <input type="number" name="stock" required
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
        </div>

        <div>
            <label class="block mb-1 font-medium text-gray-700">Deskripsi:</label>
            <textarea name="description" rows="4"
                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
        </div>

        <div>
            <label class="block mb-1 font-medium text-gray-700">Gambar Produk:</label>
            <input type="file" name="image" accept="image/*"
                class="w-full border border-gray-300 rounded-md px-4 py-2 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
        </div>

        <div class="pt-4">
            <button type="submit"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded shadow transition">
                💾 Simpan Produk
            </button>
            <a href="/admin/products"
                class="ml-3 text-gray-600 hover:underline text-sm">← Kembali</a>
        </div>
    </form>
@endsection
