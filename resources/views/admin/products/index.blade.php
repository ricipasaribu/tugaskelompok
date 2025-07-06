@extends('layouts.admin')

@section('content')
    <h2>Daftar Produk</h2>

    <a href="/admin/products/create" style="
        display: inline-block;
        padding: 10px 15px;
        background-color: #28a745;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        margin-bottom: 15px;
    ">
        + Tambah Produk
    </a>

    @foreach ($products as $product)
        <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
            <strong>{{ $product->name }} ({{ $product->brand }})</strong><br>
            Harga: Rp {{ number_format($product->price, 0, ',', '.') }}<br>
            Stok: {{ $product->stock }}<br>
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" width="120" style="margin-top: 10px;">
            @endif
            <td>
                    <a href="/products/{{ $product->id }}/edit">Edit</a> |

                    <form action="/products/{{ $product->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus produk ini?')">Hapus</button>
                    </form>
                </td>

        </div>

    @endforeach
@endsection
