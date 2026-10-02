<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Wisata;

// Endpoint API untuk mengambil semua data wisata beserta galeri fotonya
Route::get('/wisata', function () {
    // Memanggil data wisata beserta relasi galleries (sesuaikan dengan nama relasi di model Wisata kamu)
    $wisataData = Wisata::with('galleries')->get();

    return response()->json([
        'status' => 'success',
        'code' => 200,
        'message' => 'Data Wisata Singkawang berhasil dimuat secara realtime',
        'total_data' => $wisataData->count(),
        'data' => $wisataData
    ], 200);
});