<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckLogin;
use App\Http\Controllers\DashboardController;

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
});

