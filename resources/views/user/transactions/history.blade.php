@extends('layouts.app')

@section('title', 'Riwayat Transaksi')

@section('content')
<style>
    .card-hover {
        transition: all 0.3s ease;
    }
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    .icon-hover {
        transition: transform 0.3s ease;
    }
    .icon-hover:hover {
        transform: scale(1.1);
    }
    .gradient-bg {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    .gradient-text {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
</style>

<div class="min-h-screen" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <!-- Header -->
        <div class="text-center mb-12">
            <div class="inline-block p-4 gradient-bg rounded-full mb-6 shadow-lg icon-hover">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <h1 class="text-4xl font-bold gradient-text mb-4">🧾 Riwayat Pembelian Anda</h1>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Lihat semua transaksi yang telah Anda lakukan.</p>
        </div>

        @if($transactions->count() > 0)
            <!-- Cards -->
            <div class="grid gap-6">
                @foreach($transactions as $trx)
                    <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden card-hover">
                        <!-- Header -->
                        <div class="bg-gray-50 p-6 border-b border-gray-200">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800">{{ $trx->product->name }}</h3>
                                    <p class="text-sm text-gray-500">{{ $trx->product->brand }} • Transaksi #{{ $trx->id }}</p>
                                </div>
                                <span class="text-sm text-gray-400">{{ $trx->created_at->format('d M Y • H:i') }}</span>
                            </div>
                        </div>

                        <!-- Body -->
                        <div class="p-6 grid md:grid-cols-2 gap-6 text-sm text-gray-700">
                            <div class="space-y-2">
                                <p><strong>Harga Satuan:</strong> Rp {{ number_format($trx->product->price, 0, ',', '.') }}</p>
                                <p><strong>Jumlah Beli:</strong> {{ $trx->quantity }} unit</p>
                                <p><strong>Total:</strong> <span class="text-green-600 font-semibold">Rp {{ number_format($trx->total_price, 0, ',', '.') }}</span></p>
                            </div>
                            <div class="space-y-2">
                                <p><strong>Status:</strong>
                                    <span class="inline-block px-3 py-1 text-xs rounded-full font-semibold
                                        {{ $trx->status === 'pending' ? 'bg-yellow-100 text-yellow-800' :
                                            ($trx->status === 'success' ? 'bg-green-100 text-green-800' : 'bg-gray-200 text-gray-600') }}">
                                        {{ ucfirst($trx->status) }}
                                    </span>
                                </p>
                                <p><strong>Metode:</strong> Transfer Bank</p>
                                <p><strong>Catatan:</strong> Terima kasih telah membeli produk kami!</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Total Info -->
            <div class="mt-12 text-center">
                <div class="inline-block bg-white rounded-lg shadow-sm border border-gray-200 px-6 py-4">
                    <p class="text-gray-600 flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        Total <strong class="mx-1">{{ $transactions->count() }}</strong> transaksi berhasil dimuat
                    </p>
                </div>
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-20">
                <div class="inline-block p-6 bg-gray-100 rounded-full mb-6">
                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Belum Ada Transaksi</h3>
                <p class="text-gray-600 text-lg mb-8 max-w-md mx-auto">
                    Anda belum melakukan pembelian smartphone. Yuk mulai belanja sekarang dan nikmati produk terbaik kami!
                </p>
                <div class="flex justify-center gap-4">
                    <a href="/products" class="px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-lg hover:scale-105 transition-all duration-300 shadow-lg">
                        🔍 Mulai Belanja
                    </a>
                    <a href="/" class="px-6 py-3 bg-white border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-100 transition-all duration-300 shadow">
                        ⬅️ Kembali ke Beranda
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
