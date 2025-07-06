@extends('layouts.app')

@section('content')
    <h2>Form Pembelian</h2>

    <form action="/buy" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">

        <p><strong>Produk:</strong> {{ $product->name }}</p>
        <p><strong>Harga:</strong> Rp {{ number_format($product->price, 0, ',', '.') }}</p>
        <p><strong>Stok:</strong> {{ $product->stock }}</p>

        <label>Jumlah Beli:</label><br>
        <input type="number" name="quantity" min="1" max="{{ $product->stock }}" required><br><br>

        <button type="submit">Beli Sekarang</button>
    </form>
@endsection
