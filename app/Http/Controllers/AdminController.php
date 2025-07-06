<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{
    public function transactions()
    {
        if (Session::get('user_role') !== 'admin') {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        $transactions = \App\Models\Transaction::with('user', 'product')->get();
        return view('admin.transactions', compact('transactions'));
    }
    public function updateStatus(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->status = $request->status;
        $transaction->save();

        return redirect('/admin/transactions')->with('success', 'Status transaksi berhasil diperbarui.');
    }
    public function dashboard()
    {
        if (session('user_role') !== 'admin') {
            abort(403, 'Akses hanya untuk admin.');
        }

        $totalProducts = Product::count();
        $totalSuccessTransactions = Transaction::where('status', 'selesai')->count();
        $totalRevenue = Transaction::where('status', 'selesai')->sum('total_price');

        return view('admin.dashboard', compact('totalProducts', 'totalSuccessTransactions', 'totalRevenue'));
    }
}
