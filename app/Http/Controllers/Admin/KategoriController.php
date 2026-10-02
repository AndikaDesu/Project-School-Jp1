<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    /**
     * 1. Menampilkan Halaman Utama Tabel Kategori
     */
    public function index()
    {
        // Mengambil data kategori terbaru dengan paginasi maksimal 10 baris per halaman
        $categories = Category::latest()->paginate(10);
        return view('admin.kategori.index', compact('categories'));
    }

    /**
     * 2. Menampilkan Form Tambah Kategori Baru
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * 3. Memproses Penyimpanan Kategori Baru ke MySQL
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:100|unique:categories,nama_kategori',
        ]);

        Category::create([
            'nama_kategori' => $validated['nama_kategori'],
            'slug' => Str::slug($validated['nama_kategori']),
        ]);

        return redirect()->route('admin.kategori.index')->with('success', '✓ Kategori baru berhasil ditambahkan!');
    }

    /**
     * 4. Menampilkan Form Edit Kategori
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.kategori.edit', compact('category'));
    }

    /**
     * 5. Memproses Pembaruan Data Kategori
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:100|unique:categories,nama_kategori,' . $id,
        ]);

        $category->update([
            'nama_kategori' => $validated['nama_kategori'],
            'slug' => Str::slug($validated['nama_kategori']),
        ]);

        return redirect()->route('admin.kategori.index')->with('success', '✓ Kategori berhasil diperbarui!');
    }

    /**
     * 6. Menghapus Kategori dari MySQL
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.kategori.index')->with('success', '✓ Kategori berhasil dihapus!');
    }
}