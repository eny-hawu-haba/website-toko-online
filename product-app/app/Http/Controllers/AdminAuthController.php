<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    // Proses login semua pengguna
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = Auth::user()->role;

            // Login Admin
            if ($role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            // Login Kasir
            if ($role === 'kasir') {
                return redirect()->route('kasir.dashboard');
            }

            // Login Pelanggan
            if ($role === 'user') {
                return redirect()->route('home')
                    ->with('success', 'Login berhasil. Selamat datang di EnyMart!');
            }

            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return back()->withErrors([
                'email' => 'Role akun tidak dikenali. Silakan hubungi administrator.',
            ]);
        }

        return back()->withErrors([
            'email' => 'Email atau password salah. Jika belum memiliki akun, silakan daftar terlebih dahulu.',
        ])->onlyInput('email');
    }

    // Dashboard Admin
    public function dashboard()
    {
        if (! Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses hanya untuk Admin.');
        }

        return view('admin.dashboard');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
