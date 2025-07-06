<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function create($productId)
    {
        $product = Product::findOrFail($productId);
        return view('transactions.create', compact('product'));
    }

    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $quantity = $request->quantity;
        $total = $product->price * $quantity;

        Transaction::create([
            'user_id' => session('user_id'),
            'product_id' => $product->id,
            'quantity' => $quantity,
            'total_price' => $total,
            'status' => 'pending'
        ]);

        return redirect('/transactions')->with('success', 'Transaksi berhasil disimpan.');
    }

    public function index()
    {
        $transactions = Transaction::where('user_id', session('user_id'))->get();
        return view('transactions.index', compact('transactions'));
    }
   public function userHistory()
{
    $userId = session('user_id');

    $transactions = \App\Models\Transaction::with('product')
        ->where('user_id', $userId)
        ->latest()
        ->get();

    return view('user.transactions.history', compact('transactions'));
}

}
