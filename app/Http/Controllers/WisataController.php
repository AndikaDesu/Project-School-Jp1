<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    public function home()
    {
        $wisatas    = Wisata::with('category')->latest()->take(6)->get();
        $categories = Category::all();

        return view('public.home', compact('wisatas', 'categories'));
    }

    public function index(Request $request)
    {
        $categories = Category::all();
        $search     = $request->search;
        $kategori   = $request->kategori; // ← pakai 'kategori' (slug), sama dengan form view

        $query = Wisata::with('category');

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('lokasi', 'like', "%{$search}%");
            });
        }

        // ← Filter berdasarkan slug kategori, bukan category_id
        if (!empty($kategori)) {
            $query->whereHas('category', function ($q) use ($kategori) {
                $q->where('slug', $kategori);
            });
        }

        $wisatas = $query->latest()->paginate(9);

        return view('public.wisata.index', compact('wisatas', 'categories'));
    }

    public function show(Wisata $wisata)
    {
        $wisata->load(['category', 'galleries', 'comments' => function ($q) {
            $q->where('is_approved', true)->whereNull('parent_id')->latest();
        }]);

        return view('public.wisata.show', compact('wisata'));
    }

    public function getSuggestions(Request $request)
    {
        $keyword = $request->input('q', '');

        if (strlen($keyword) < 2) {
            return response()->json([]);
        }

        $suggestions = Wisata::where('nama', 'like', "%{$keyword}%")
            ->orWhere('lokasi', 'like', "%{$keyword}%")
            ->limit(7)
            ->get(['id', 'nama', 'lokasi']);

        return response()->json($suggestions);
    }

    public function bookTicket(Request $request, Wisata $wisata)
    {
        $request->validate([
            'tanggal_kunjungan' => 'required|date|after_or_equal:today',
            'jumlah_tiket'      => 'required|integer|min:1|max:50',
        ]);

        return back()->with('success', '✓ Tiket berhasil dipesan! Selamat berkunjung.');
    }

    public function storeComment(Request $request, Wisata $wisata)
    {
        $request->validate([
            'isi_komentar'      => 'required|string|max:1000',
            'nama_pengomentar'  => 'required|string|max:100',
            'email_pengomentar' => 'required|email|max:150',
            'rating'            => 'nullable|integer|min:1|max:5',
            'parent_id'         => 'nullable|integer|exists:comments,id',
        ]);

        Comment::create([
            'wisata_id'         => $wisata->id,
            'parent_id'         => $request->parent_id,
            'nama_pengomentar'  => $request->nama_pengomentar,
            'email_pengomentar' => $request->email_pengomentar,
            'isi_komentar'      => $request->isi_komentar,
            'rating'            => $request->parent_id ? null : $request->rating,
            'is_approved'       => false,
        ]);

        return back()->with('success', '✓ Komentar berhasil dikirim, menunggu persetujuan admin.');
    }
}