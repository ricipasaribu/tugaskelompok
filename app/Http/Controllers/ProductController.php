<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function index()
    {
         if (session('user_role') !== 'admin') {
        abort(403, 'Akses khusus admin.');
    }

    $products = Product::all();
    return view('admin.products.index', compact('products'));
    }
    public function create()
{
    if (session('user_role') !== 'admin') {
        abort(403, 'Akses hanya untuk admin.');
    }

    return view('admin.products.create');
}

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
        if (session('user_role') !== 'admin') {
            abort(403, 'Akses khusus admin.');
        }
    }

    public function update(Request $request, $id)
    {
       // Cek apakah user adalah admin
    if (session('user_role') !== 'admin') {
        abort(403, 'Akses khusus admin.');
    }

    // Ambil data produk
    $product = Product::findOrFail($id);

    // Validasi data yang dikirim dari form
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'brand' => 'required|string|max:255',
        'price' => 'required|numeric',
        'stock' => 'required|numeric',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    // Jika user upload gambar baru
    if ($request->hasFile('image')) {
        // Hapus gambar lama (jika ada)
       if ($product->image && Storage::disk('public')->exists($product->image)) {
    Storage::disk('public')->delete($product->image);
}

        // Simpan gambar baru ke folder 'images' di storage/public
        $path = $request->file('image')->store('images', 'public');
        $validated['image'] = $path;
    }

    // Update produk dengan data baru
    $product->update($validated);

    // Redirect kembali ke halaman produk admin
    return redirect('/admin/products')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/products')->with('success', 'Produk berhasil dihapus.');
        if (session('user_role') !== 'admin') {
            abort(403, 'Akses khusus admin.');
        }
    }
    public function store(Request $request)
{
    if (session('user_role') !== 'admin') {
        abort(403);
    }

    $validated = $request->validate([
        'name' => 'required',
        'brand' => 'required',
        'price' => 'required|numeric',
        'stock' => 'required|numeric',
        'description' => 'nullable',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('images', 'public');
        $validated['image'] = $path;
    }

    Product::create($validated);

    return redirect('/admin/products')->with('success', 'Produk berhasil ditambahkan');
}
}
