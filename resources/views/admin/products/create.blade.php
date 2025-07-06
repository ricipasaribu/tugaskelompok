@extends('layouts.admin')

@section('content')
<h2>Tambah Produk Baru</h2>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/admin/products" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Nama Produk:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Merk:</label><br>
    <input type="text" name="brand" required><br><br>

    <label>Harga (Rp):</label><br>
    <input type="number" name="price" required><br><br>

    <label>Stok:</label><br>
    <input type="number" name="stock" required><br><br>

    <label>Deskripsi:</label><br>
    <textarea name="description"></textarea><br><br>

    <label>Gambar Produk:</label><br>
    <input type="file" name="image" accept="image/*"><br><br>

    <button type="submit">Simpan Produk</button>
</form>
@endsection
