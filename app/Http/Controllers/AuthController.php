<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)
                ->where('password', $request->password)
                ->first();

    if ($user) {
        session([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_role' => $user->role,
        ]);

        return redirect('/dashboard');
    }

    return redirect('/login')->with('error', 'Email atau password salah.');
    }
    public function showRegisterForm()
{
    return view('auth.register');
}

public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'user' // default untuk pendaftar baru
    ]);

    return redirect('/login')->with('success', 'Akun berhasil dibuat. Silakan login.');
}

    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }

}
