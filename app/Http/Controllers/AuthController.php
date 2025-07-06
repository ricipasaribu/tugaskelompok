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
       $credentials = $request->only('email', 'password');
    $user = User::where('email', $credentials['email'])->first();

    if ($user && $credentials['password'] === $user->password) {

        session([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_role' => $user->role,
        ]);


        if ($user->role === 'admin') {
            return redirect('/admin/dashboard');
        } else {
            return redirect('/dashboard');
        }
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
    'password' => $request->password,
    'role' => 'user'
]);

    return redirect('/login')->with('success', 'Akun berhasil dibuat. Silakan login.');
}

    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }

}
