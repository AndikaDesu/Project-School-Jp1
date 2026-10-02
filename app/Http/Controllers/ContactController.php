<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Tampilkan halaman form pengaduan keluhan / kontak user.
     */
    public function index()
    {
        // 🚀 Sesuaikan dengan lokasi file blade kamu, jika di views/public/contact.blade.php pakai 'public.contact'
        // 🚀 Jika di views/public/contact/index.blade.php tetap pakai 'public.contact.index'
       return view('public.contact.index');
    }

    /**
     * Simpan pesan laporan kerusakan dari user ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi presisi sesuai kolom database: nama, email, subjek, pesan
        $request->validate([
            'nama'   => 'required|string|max:255',
            'email'  => 'required|email|max:255',
            'subjek' => 'required|string|max:255', // ← FIX: Menggunakan subjek keluhan, bukan telepon
            'pesan'  => 'required|string|min:10',
        ]);

        // 2. Simpan aman ke database lewat Mass Assignment
        Contact::create([
            'nama'   => $request->nama,
            'email'  => $request->email,
            'subjek' => $request->subjek,
            'pesan'  => $request->pesan,
        ]);

        // 3. Kembalikan ke halaman form kontak dengan alert sukses suci
        return redirect()->back()->with('success', '✓ Sukses! Laporan keluhan Anda berhasil terkirim ke sistem admin.');
    }
}