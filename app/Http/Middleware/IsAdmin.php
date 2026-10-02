<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Jika user sudah login DAN isi kolom role-nya adalah 'admin', IJINKAN LEWAT!
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Kalau bukan admin/pengunjung biasa, tendang balik ke halaman depan dengan alert eror
        return redirect('/')->with('error', 'Akses ditolak! Anda tidak memiliki hak akses ke halaman Administrator.');
    }
}