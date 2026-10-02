@extends('layouts.admin')

@section('title', 'Kelola Kategori Wisata')

@section('content')
<div class="topbar mb-4 d-flex justify-content-between align-items-center">
    <h4 class="m-0 fw-bold text-dark"><i class="fas fa-tags text-warning me-2"></i>Kelola Kategori Destinasi</h4>
    <a href="{{ route('admin.kategori.create') }}" class="btn btn-primary btn-sm px-3 shadow-sm">
        <i class="fas fa-plus me-1"></i> Tambah Kategori
    </a>
</div>

{{-- Notifikasi Sukses --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card border-0 shadow-sm rounded">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-secondary">
                    <tr>
                        <th class="ps-3" style="width: 10%;">ID</th>
                        <th style="width: 50%;">Nama Kategori</th>
                        <th style="width: 25%;">Slug URL</th>
                        <th class="text-end pe-3" style="width: 15%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td class="ps-3 fw-bold text-secondary">#{{ $category->id }}</td>
                            <td><strong class="text-dark">{{ $category->nama_kategori }}</strong></td>
                            <td><code class="text-muted">{{ $category->slug }}</code></td>
                            <td class="text-end pe-3">
                                <div class="d-flex gap-1 justify-content-end">
                                    <a href="{{ route('admin.kategori.edit', $category->id) }}" class="btn btn-outline-warning btn-sm shadow-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.kategori.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Hapus kategori ini? Wisata dengan kategori ini akan diset ke Kosong.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm shadow-sm" title="Hapus">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                <i class="fas fa-tags fa-2x d-block mb-2 opacity-50"></i> Belum ada data kategori. Silakan tambah baru!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center mt-4">
    {!! $categories->links() !!}
</div>
@endsection