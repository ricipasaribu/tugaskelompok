@extends('layouts.app')

@section('title', 'Riwayat Transaksi')

@section('content')
    <h2>Riwayat Pembelian</h2>

    @if($transactions->count() > 0)
        @foreach($transactions as $trx)
            <div style="border:1px solid #ccc; margin-bottom:10px; padding:10px;">
                <strong>{{ $trx->product->name }} ({{ $trx->product->brand }})</strong><br>
                Harga Satuan: Rp {{ number_format($trx->product->price, 0, ',', '.') }}<br>
                Jumlah Beli: {{ $trx->quantity }}<br>
                Total: Rp {{ number_format($trx->total_price, 0, ',', '.') }}<br>
                Status: <strong>{{ ucfirst($trx->status) }}</strong><br>
                Tanggal Beli: {{ $trx->created_at->format('d M Y H:i') }}
            </div>
        @endforeach
    @else
        <p>Belum ada transaksi.</p>
    @endif
@endsection
