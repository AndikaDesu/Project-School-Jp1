<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // 🚀 DAFTARKAN NAMA TABELNYA BIAR LARAVEL GA BINGUNG
    protected $table = 'contacts';

    // 🔒 Buka gembok Mass Assignment: Ganti 'telepon' menjadi 'subjek' agar sinkron luar dalam!
    protected $fillable = [
        'nama',
        'email',
        'subjek', // 🔥 SEKARANG KOLOM SUBJEK RESMI DISEDIAKAN JALUR KHUSUS!
        'pesan',
    ];
}