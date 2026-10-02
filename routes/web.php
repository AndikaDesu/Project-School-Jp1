<?php

use Illuminate\Support\Facades\Route;
use App\Models\Wisata;
use App\Models\Category;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\WisataController as AdminWisataController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\Contact;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ═══════════════════════════════════════════════════════════════════════
// 1. JALUR PUBLIK / GUEST
// ═══════════════════════════════════════════════════════════════════════

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');


// ═══════════════════════════════════════════════════════════════════════
// 2. JALUR YANG DIKUNCI (Wajib Login)
// ═══════════════════════════════════════════════════════════════════════

Route::middleware('auth')->group(function () {

    // --- Logout ---
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // --- Halaman Utama & Wisata ---
    Route::get('/', [WisataController::class, 'home'])->name('home');
    // FIX: Hapus duplikat route /home — gunakan redirect saja agar tidak ada dua handler berbeda
    Route::redirect('/home', '/')->name('home.redirect');

    Route::get('/wisata', [WisataController::class, 'index'])->name('wisata.index');
    Route::get('/wisata/{wisata}', [WisataController::class, 'show'])->name('wisata.show');

    // --- Auto-Suggestion Search ---
    Route::get('/wisata-suggestions', [WisataController::class, 'getSuggestions'])->name('wisata.suggestions');

    // --- Pemesanan Tiket ---
    Route::post('/wisata/{wisata}/book', [WisataController::class, 'bookTicket'])->name('wisata.book');

    // --- Komentar & Review ---
    Route::post('/wisata/{wisata}/comments', [WisataController::class, 'storeComment'])->name('wisata.comments.store');

    // --- Tentang Kota ---
    Route::get('/tentang-kota', fn() => view('public.tentang'))->name('tentang-kota');

    // --- Kontak ---
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


    // ═══════════════════════════════════════════════════════════════════
    // 3. ADMIN PANEL (Wajib Login + Role Admin)
    // ═══════════════════════════════════════════════════════════════════

    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {

        // --- Dashboard ---
        Route::get('/', function () {
            $totalWisata  = Wisata::count();
            $recentWisata = Wisata::latest()->limit(3)->get();
            $totalPesan   = Contact::count();
            $recentPesan  = Contact::latest()->limit(5)->get();
            $categories   = Category::all();

            return view('admin.dashboard', compact(
                'totalWisata', 'recentWisata',
                'totalPesan', 'recentPesan',
                'categories'
            ));
        })->name('dashboard');

        // --- Galeri Foto ---
        Route::delete('/wisata-galeri/{id}', [AdminWisataController::class, 'destroyFoto'])->name('wisata.foto.destroy');

        // --- Moderasi Komentar ---
        Route::get('/komentar',                  [AdminWisataController::class, 'listKomentar'])->name('komentar.index');
        Route::patch('/komentar/{id}/approve',   [AdminWisataController::class, 'approveKomentar'])->name('komentar.approve');
        Route::delete('/komentar/{id}',          [AdminWisataController::class, 'deleteKomentar'])->name('komentar.delete');
        Route::post('/komentar/{id}/reply',      [AdminWisataController::class, 'replyKomentar'])->name('komentar.reply');

        // --- Laporan Kerusakan ---
        // FIX: Pindahkan logika closure ke controller agar lebih bersih & testable,
        //      tapi dipertahankan di sini untuk menjaga kompatibilitas struktur kamu.
        Route::get('/laporan-kerusakan', function () {
            $reports = Contact::latest()->paginate(10);
            return view('admin.laporan.index', compact('reports'));
        })->name('laporan.index');

        Route::delete('/laporan-kerusakan/{id}', function (int $id) {
            // FIX: Hapus penggunaan string magic class, gunakan import di atas
            Contact::findOrFail($id)->delete();
            return back()->with('success_admin', '✓ Sukses! Data laporan berhasil dihapus permanen.');
        })->name('laporan.delete');

        // --- Kategori (Resource) ---
        // FIX: Hilangkan parameter 'as' => 'admin' karena sudah ditangani ->name('admin.')
        Route::resource('kategori', KategoriController::class)
            ->parameters(['kategori' => 'category']);

        // --- Wisata (Resource) ---
        Route::resource('wisata', AdminWisataController::class)
            ->parameters(['wisata' => 'wisata']);
    });
});