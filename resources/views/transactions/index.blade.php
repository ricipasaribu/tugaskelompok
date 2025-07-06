<h2>Daftar Transaksi Anda</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>Produk</th>
        <th>Jumlah</th>
        <th>Total Harga</th>
        <th>Status</th>
    </tr>
    <a href="/buy/{{ $product->id }}">Beli</a>
    @foreach($transactions as $trx)
    <tr>
        <td>{{ $trx->product->name ?? 'Produk dihapus' }}</td>
        <td>{{ $trx->quantity }}</td>
        <td>{{ $trx->total_price }}</td>
        <td>{{ $trx->status }}</td>
    </tr>
    @endforeach
</table>
