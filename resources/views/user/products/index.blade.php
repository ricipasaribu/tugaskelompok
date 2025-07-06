@extends('layouts.app')

@section('content')
    <h2>Daftar Produk Smartphone</h2>

    @foreach ($products as $product)
        <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
            <h3>{{ $product->name }} - {{ $product->brand }}</h3>
            <p><strong>Harga:</strong> Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            <p><strong>Stok:</strong> {{ $product->stock }}</p>
            <p>{{ $product->description }}</p>
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" width="150" alt="Foto Produk">
            @else
                <p>Tidak ada gambar</p>
            @endif

            <a href="/buy/{{ $product->id }}">Beli Sekarang</a>
        </div>
    @endforeach
@endsection
