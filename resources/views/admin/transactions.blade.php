@extends('layouts.admin')

@section('content')
    <h2>Semua Transaksi Pengguna</h2>

    <table border="1" cellpadding="10">
        <tr>
            <th>Nama User</th>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        @foreach($transactions as $trx)
        <tr>
            <td>{{ $trx->user->name ?? 'User dihapus' }}</td>
            <td>{{ $trx->product->name ?? 'Produk dihapus' }}</td>
            <td>{{ $trx->quantity }}</td>
            <td>{{ $trx->total_price }}</td>
            <td>{{ $trx->status }}</td>
            <td>
                @if($trx->status !== 'selesai')
                <form method="POST" action="/admin/transactions/{{ $trx->id }}/update-status">
                    @csrf
                    <input type="hidden" name="status" value="selesai">
                    <button type="submit">Selesaikan</button>
                </form>
                @else
                    ✅ Selesai
                @endif
            </td>
        </tr>
        @endforeach
    </table>
@endsection
