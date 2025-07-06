@extends('layouts.app')

@section('title', 'Dashboard User')

@section('content')
    <h1>Selamat datang, {{ session('user_name') }}!</h1>
    <p>Anda login sebagai <strong>{{ session('user_role') }}</strong>.</p>

    <hr>

    <h3>📱 Info Produk Smartphone</h3>
    <p>Temukan berbagai pilihan smartphone dari merek ternama seperti <strong>Apple</strong>, <strong>Samsung</strong>, <strong>Xiaomi</strong>, dan lainnya.</p>
    <p>Semua produk tersedia dengan harga terbaik dan stok yang selalu update.</p>

    <a href="/products" style="display:inline-block; background-color:#007BFF; color:white; padding:10px 20px; border-radius:5px; text-decoration:none;">
        🔍 Lihat Produk Sekarang
    </a>

    <hr>

    <h3>🧾 Riwayat Transaksi Anda</h3>
    <p>Ingin cek pembelian sebelumnya?</p>
    <a href="/transactions/history" style="text-decoration:underline;">Lihat Riwayat Pembelian</a>

    <hr>

    <h3>📞 Butuh Bantuan?</h3>
    <p>Hubungi tim kami lewat halaman <a href="/contact">Contact Us</a> jika Anda butuh bantuan atau memiliki pertanyaan seputar produk.</p>
@endsection
