<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wisata;
use App\Models\Category;
use App\Models\Comment;
use App\Models\WisataGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WisataController extends Controller
{
    /**
     * Tampilkan semua data wisata di dashboard admin + Fitur Search & Filter
     */
    public function index(Request $request)
    {
        $categories  = Category::all();
        $search      = $request->search;
        $category_id = $request->category_id;

        $query = Wisata::with('category');

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('lokasi', 'like', "%{$search}%");
            });
        }

        if (!empty($category_id)) {
            $query->where('category_id', $category_id);
        }

        $wisatas = $query->latest()->paginate(10);
        
        // 🚀 SUNTIKAN AMAN: Layout admin membutuhkan ini untuk menghitung lencana sidebar
        $comments = Comment::latest()->paginate(10); 

        return view('admin.wisata.index', compact('wisatas', 'categories', 'comments'));
    }

    /**
     * Tampilkan form tambah wisata baru.
     */
    public function create()
    {
        $categories = Category::all();
        $comments   = Comment::latest()->paginate(10); // 🚀 SUNTIKAN AMAN

        return view('admin.wisata.create', compact('categories', 'comments'));
    }

    /**
     * Simpan data wisata baru ke database beserta galeri fotonya.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'        => 'required|string|max:255',
            'deskripsi'   => 'required|string',
            'lokasi'      => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'jam_buka'    => 'required',
            'jam_tutup'   => 'required',
            'tiket_masuk' => 'required|string',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2000',
            'galeri.*'    => 'nullable|image|mimes:jpeg,png,jpg|max:2000',
            'link_maps'   => 'nullable|url',
            'maps_iframe' => 'nullable|string',
        ]);

        $data = $request->except('galeri');

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('wisata', 'public');
        }

        $wisata = Wisata::create($data);

        if ($request->hasFile('galeri')) {
            foreach ($request->file('galeri') as $file) {
                if ($file->isValid()) {
                    WisataGallery::create([
                        'wisata_id'  => $wisata->id,
                        'foto_path'  => $file->store('galeri', 'public'),
                        'angle_type' => '',
                    ]);
                }
            }
        }

        return redirect()->route('admin.wisata.index')
            ->with('success_admin', '✓ Sukses! Tempat wisata baru berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit wisata + data galeri.
     */
    public function edit(Wisata $wisata)
    {
        $categories = Category::all();
        $wisata->load('galleries');
        $comments   = Comment::latest()->paginate(10); // 🚀 SUNTIKAN AMAN

        return view('admin.wisata.edit', compact('wisata', 'categories', 'comments'));
    }

    /**
     * Update data wisata beserta galeri fotonya.
     */
    public function update(Request $request, Wisata $wisata)
    {
        $request->validate([
            'nama'        => 'required|string|max:255',
            'deskripsi'   => 'required|string',
            'lokasi'      => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'jam_buka'    => 'required',
            'jam_tutup'   => 'required',
            'tiket_masuk' => 'required|string',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2000',
            'galeri.*'    => 'nullable|image|mimes:jpeg,png,jpg|max:2000',
            'link_maps'   => 'nullable|url',
            'maps_iframe' => 'nullable|string',
        ]);

        $data = $request->except('galeri');

        if ($request->hasFile('gambar')) {
            if ($wisata->gambar) {
                Storage::disk('public')->delete($wisata->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('wisata', 'public');
        }

        $wisata->update($data);

        if ($request->hasFile('galeri')) {
            $currentGalleries = WisataGallery::where('wisata_id', $wisata->id)->get();

            foreach ($request->file('galeri') as $index => $file) {
                if ($file->isValid()) {
                    $path             = $file->store('galeri', 'public');
                    $existingGallery  = $currentGalleries->skip($index)->first();

                    if ($existingGallery) {
                        Storage::disk('public')->delete($existingGallery->foto_path ?? '');
                        $existingGallery->update([
                            'foto_path'  => $path,
                            'angle_type' => $existingGallery->angle_type ?? '',
                        ]);
                    } else {
                        WisataGallery::create([
                            'wisata_id'  => $wisata->id,
                            'foto_path'  => $path,
                            'angle_type' => '',
                        ]);
                    }
                }
            }
        }

        return redirect()->route('admin.wisata.index')
            ->with('success_admin', '✓ Sukses! Data wisata berhasil diperbarui.');
    }

    /**
     * Hapus wisata beserta semua gambar & galerinya.
     */
    public function destroy(Wisata $wisata)
    {
        if ($wisata->gambar) {
            Storage::disk('public')->delete($wisata->gambar);
        }

        foreach ($wisata->galleries as $gallery) {
            Storage::disk('public')->delete($gallery->foto_path ?? '');
            $gallery->delete();
        }

        $wisata->delete();

        return redirect()->route('admin.wisata.index')
            ->with('success_admin', '✓ Sukses! Data wisata berhasil dihapus permanen.');
    }

    /**
     * Hapus foto galeri spesifik.
     */
    public function destroyFoto($id)
    {
        $gallery = WisataGallery::findOrFail($id);
        Storage::disk('public')->delete($gallery->foto_path ?? '');
        $gallery->delete();

        return back()->with('success_admin', '✓ Foto galeri berhasil dihapus.');
    }

    // ═══════════════════════════════════════════════════════════════════
    // MODERASI KOMENTAR
    // ═══════════════════════════════════════════════════════════════════

    /**
     * Daftar semua komentar untuk moderasi.
     */
    public function listKomentar()
    {
        // 🚀 TAMBAHKAN $comments = DI SINI BIAR KESIMPAN!
        $comments = Comment::with('wisata')->latest()->paginate(10);
        
        return view('admin.komentar.index', compact('comments'));
    }

    /**
     * Setujui komentar pengunjung.
     */
    public function approveKomentar($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->update(['is_approved' => true]);

        return back()->with('success_admin', '✓ Komentar berhasil disetujui dan ditampilkan.');
    }

    /**
     * Balas komentar pengunjung dari admin.
     * 🚀 ✔ NESTED SYSTEM FIXED: Membuat baris baru di tabel comment menggunakan parent_id
     */
    public function replyKomentar(Request $request, $id)
    {
        $request->validate([
            'balasan' => 'required|string|max:1000',
        ]);

        $parentComment = Comment::findOrFail($id);

        Comment::create([
            'wisata_id'         => $parentComment->wisata_id,
            'parent_id'         => $parentComment->id, 
            'nama_pengomentar'  => 'Admin Resmi',      
            'email_pengomentar' => 'admin_wisata@singkawang.go.id',
            'isi_komentar'      => $request->balasan,
            'rating'            => 5,                  
            'is_approved'       => true,               
        ]);

        return back()->with('success_admin', '✓ Balasan admin berhasil dikirim dan disematkan.');
    }

    /**
     * Hapus komentar pengunjung.
     */
    public function deleteKomentar($id)
    {
        Comment::findOrFail($id)->delete();
        return back()->with('success_admin', '✓ Komentar berhasil dihapus.');
    }
}