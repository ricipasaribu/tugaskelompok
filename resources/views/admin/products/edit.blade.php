<form action="/admin/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Field lainnya -->
    <label>Nama Produk:</label>
    <input type="text" name="name" value="{{ $product->name }}" required><br>

    <label>Merk:</label>
    <input type="text" name="brand" value="{{ $product->brand }}" required><br>

    <label>Harga:</label>
    <input type="number" name="price" value="{{ $product->price }}" required><br>

    <label>Stok:</label>
    <input type="number" name="stock" value="{{ $product->stock }}" required><br>

    <label>Deskripsi:</label><br>
    <textarea name="description">{{ $product->description }}</textarea><br>

    <!-- Gambar lama -->
    @if($product->image)
        <p>Gambar Saat Ini:</p>
        <img src="{{ asset('storage/' . $product->image) }}" width="150"><br>
    @endif

    <!-- Upload baru -->
    <label>Ganti Foto (opsional):</label>
    <input type="file" name="image" accept="image/*"><br><br>

    <button type="submit">Update Produk</button>
</form>
