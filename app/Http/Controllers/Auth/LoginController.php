<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle login.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Proses pencocokan email & password ke database
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->filled('remember'))) {
            
            // 📢 DAFTAR EMAIL ADMIN ASLI KAMU (Sudah ditambah admin1@gmail.com)
            $emailAdmin = [
                'dika@admin.com', 
                'admin@sekolah.sch.id',
                'binoadmin@gmail.com',
                'admin1@gmail.com' // 🚨 ✔ AKUN KAMU SEKARANG RESMI JADI ADMIN DI SINI, BIN!
            ];

            // 1. Jika yang login adalah EMAIL ADMIN, arahkan ke dashboard admin
            if (in_array(Auth::user()->email, $emailAdmin)) {
                return redirect()->route('admin.dashboard');
            }

            // 2. Jika yang login adalah USER BIASA, arahkan langsung ke halaman home pengunjung!
            return redirect()->route('home')->with('success', 'Selamat datang kembali!');
        }

        // Jika email atau password salah
        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    /**
     * Handle logout.
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}