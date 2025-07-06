<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = \App\Models\Product::all();
        return view('admin.products.index', compact('products'));
        if (session('user_role') !== 'admin') {
            abort(403, 'Akses khusus admin.');
        }
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
        $product = Product::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required',
        'brand' => 'required',
        'price' => 'required|numeric',
        'stock' => 'required|numeric',
        'description' => 'nullable',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

  
    if ($request->hasFile('image')) {

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $validated['image'] = $request->file('image')->store('images', 'public');
    }

    $product->update($validated);

    return redirect('/admin/products')->with('success', 'Produk berhasil diupdate.');
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
