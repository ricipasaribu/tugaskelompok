<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;

class ProductUserController extends Controller
{
     public function index()
    {
        $products = Product::all();
        return view('user.products.index', compact('products'));
    }

    public function buyForm($id)
    {
        $product = Product::findOrFail($id);
        return view('user.products.buy', compact('product'));
    }

    public function processBuy(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        $qty = (int) $request->quantity;
        if ($qty <= 0 || $qty > $product->stock) {
            return back()->with('error', 'Jumlah tidak valid atau melebihi stok');
        }

        Transaction::create([
            'user_id' => session('user_id'),
            'product_id' => $product->id,
            'quantity' => $qty,
            'total_price' => $product->price * $qty,
            'status' => 'pending'
        ]);

        $product->decrement('stock', $qty);

        return redirect('/products')->with('success', 'Transaksi berhasil!');
    }
}
