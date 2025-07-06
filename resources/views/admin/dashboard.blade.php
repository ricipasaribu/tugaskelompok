@extends('layouts.admin')

@section('content')
    <h2>Dashboard Admin</h2>

    <div style="padding: 20px; background: #f4f4f4; border-radius: 10px; width: 300px;">
        <p><strong>Total Produk:</strong> {{ $totalProducts }}</p>
        <p><strong>Transaksi Selesai:</strong> {{ $totalSuccessTransactions }}</p>
        <p><strong>Total Pendapatan:</strong> Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
    </div>
@endsection
