<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $user = DB::table('users')
                ->where('email', $request->email)
                ->where('password', $request->password) // tanpa hash (karena kamu ingin simpel)
                ->first();

        if ($user) {
            session([
                'user_id' => $user->id,
                'user_name' => $user->name,
                'user_role' => $user->role
            ]);

            return redirect('/dashboard');
        } else {
            return redirect('/login')->with('error', 'Email atau password salah.');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }
}
