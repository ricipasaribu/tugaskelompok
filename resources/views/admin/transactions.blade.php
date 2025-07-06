@extends('layouts.admin')

@section('title', 'Transaksi')

@section('breadcrumb')
    <li>
        <div class="flex items-center">
            <svg class="w-4 h-4 mx-1 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                <path d="M6 9a1 1 0 011-1h6a1 1 0 010 2H7a1 1 0 01-1-1z" />
            </svg>
            <span class="text-gray-500">Transaksi</span>
        </div>
    </li>
@endsection

@section('content')
    <h2 class="text-2xl font-bold text-indigo-700 mb-6">🧾 Semua Transaksi Pengguna</h2>

    @if(count($transactions) > 0)
    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Nama User</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Produk</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold">Jumlah</th>
                    <th class="px-6 py-3 text-right text-sm font-semibold">Total Harga</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold">Status</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @foreach($transactions as $trx)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 whitespace-nowrap">{{ $trx->user->name ?? 'User dihapus' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $trx->product->name ?? 'Produk dihapus' }}</td>
                    <td class="px-6 py-4 text-center">{{ $trx->quantity }}</td>
                    <td class="px-6 py-4 text-right text-green-600 font-semibold">Rp {{ number_format($trx->total_price, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 text-center">
                        @if($trx->status === 'selesai')
                            <span class="px-2 py-1 text-xs bg-green-100 text-green-700 font-semibold rounded-full">✅ Selesai</span>
                        @else
                            <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-700 font-semibold rounded-full">⏳ Proses</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($trx->status !== 'selesai')
                            <form method="POST" action="/admin/transactions/{{ $trx->id }}/update-status" onsubmit="return confirm('Tandai transaksi ini sebagai selesai?')">
                                @csrf
                                <input type="hidden" name="status" value="selesai">
                                <button type="submit" class="px-3 py-1 text-sm bg-green-600 text-white rounded hover:bg-green-700 transition">
                                    ✅ Selesaikan
                                </button>
                            </form>
                        @else
                            <span class="text-gray-400 text-sm">Sudah selesai</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded shadow">
        <p>⚠️ Belum ada transaksi yang tercatat.</p>
    </div>
    @endif
@endsection
