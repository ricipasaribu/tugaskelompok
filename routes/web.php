<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckLogin;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductUserController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware('checkLogin');
// Route::middleware([
//     \App\Http\Middleware\CheckLogin::class,
// ])->prefix('checkLogin')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     });
// });
// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

Route::middleware([
    \App\Http\Middleware\CheckLogin::class,
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/admin/transactions', [AdminController::class, 'transactions']);
    Route::post('/admin/transactions/{id}/update-status', [AdminController::class, 'updateStatus']);
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/create', [ProductController::class, 'create']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/products/{id}/edit', [ProductController::class, 'edit']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
Route::get('/transactions/history', [TransactionController::class, 'userHistory']);


});

Route::middleware('checkLogin')->group(function () {
    Route::get('/transactions', [TransactionController::class, 'index']);

    Route::post('/transactions', [TransactionController::class, 'store']);
});
// Route::middleware([
//     \App\Http\Middleware\CheckLogin::class,
// ])->prefix('admin')->middleware('checkLogin')->group(function () {
//         Route::get('/products', [ProductController::class, 'index']);
//         Route::get('/products/create', [ProductController::class, 'create']);
//         Route::post('/products', [ProductController::class, 'store']);
//         Route::get('/products/{id}/edit', [ProductController::class, 'edit']);
//         Route::put('/products/{id}', [ProductController::class, 'update']);
//         Route::delete('/products/{id}', [ProductController::class, 'destroy']);
//     });


Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::middleware([\App\Http\Middleware\CheckLogin::class])->prefix('admin')->group(function () {

    Route::group([
        'middleware' => function ($request, $next) {
            if (session('user_role') !== 'admin') {
                abort(403, 'Akses hanya untuk admin.');
            }
            return $next($request);
        }
    ], function () {
        // Admin Dashboard
        Route::get('/dashboard', [AdminController::class, 'dashboard']);

        // Admin Transaksi
        Route::get('/transactions', [AdminController::class, 'transactions']);
        Route::post('/transactions/{id}/update-status', [AdminController::class, 'updateStatus']);

        // Admin Produk
        Route::get('/products', [ProductController::class, 'index']);
        Route::get('/products/create', [ProductController::class, 'create']);
        Route::post('/products', [ProductController::class, 'store']);
        Route::get('/products/{id}/edit', [ProductController::class, 'edit']);
        Route::put('/products/{id}', [ProductController::class, 'update']);
        Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    });
});
Route::middleware([\App\Http\Middleware\CheckLogin::class])->group(function () {

    Route::get('/products', [ProductUserController::class, 'index']);
    Route::get('/buy/{id}', [ProductUserController::class, 'buyForm']);
    Route::post('/buy', [ProductUserController::class, 'processBuy']);
});

Route::post('/transactions', [App\Http\Controllers\TransactionController::class, 'store']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
