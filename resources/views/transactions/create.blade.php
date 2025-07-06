<h2>Beli {{ $product->name }} ({{ $product->brand }})</h2>

<form method="POST" action="/transactions">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <p>Harga: {{ $product->price }}</p>
    <p>Stok: {{ $product->stock }}</p>

    <label>Jumlah Beli:</label><br>
    <input type="number" name="quantity" min="1" max="{{ $product->stock }}"><br><br>

    <button type="submit">Beli</button>
</form>
