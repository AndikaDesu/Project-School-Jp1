<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // Menampilkan halaman form pendaftaran akun baru
    public function showRegistrationForm()
    {
        return view('auth.register'); // Kita akan buat file view ini di langkah ke-2
    }

    // Memproses data pendaftaran ke database HeidiSQL
    public function register(Request $request)
    {
        // 1. Validasi input dari form
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], // Wajib minimal 8 karakter
        ]);

        // 2. Buat data user baru di database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Password di-encrypt biar aman
        ]);

        // 3. Otomatis login-kan pengguna baru tersebut
        Auth::login($user);

        // 4. Lemparkan ke halaman beranda wisata
        return redirect()->route('home');
    }
}