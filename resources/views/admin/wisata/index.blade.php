@extends('layouts.admin')

@section('title', 'Kelola Wisata')

@section('content')

<div class="topbar mb-4">
    <h4 class="m-0 fw-bold text-dark"><i class="fas fa-map-marked-alt text-primary me-2"></i>Manajemen Data Wisata Singkawang</h4>
</div>

{{-- Alert Notifikasi Sukses --}}
@if(session('success_admin'))
    <div class="alert alert-success border-0 shadow-sm alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-1"></i> {{ session('success_admin') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card border-0 shadow-sm rounded">
    <div class="card-body">

        {{-- Filter & Tambah --}}
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
            <form method="GET" action="{{ route('admin.wisata.index') }}" class="d-flex gap-2 flex-wrap">
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari nama atau lokasi..." value="{{ request('search') }}" style="width: 220px;">
                
                {{-- 🚨 FIX: name diganti jadi category_id agar sinkron dengan Controller --}}
                <select name="category_id" class="form-select form-select-sm" style="width: 180px;">
                    <option value="">-- Semua Kategori --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->nama }}
                        </option>
                    @endforeach
                </select>
                
                <button type="submit" class="btn btn-sm btn-primary px-3"><i class="fas fa-filter me-1"></i>Filter</button>
                <a href="{{ route('admin.wisata.index') }}" class="btn btn-sm btn-secondary px-3">Reset</a>
            </form>

            <a href="{{ route('admin.wisata.create') }}" class="btn btn-sm btn-success px-3 shadow-sm">
                <i class="fas fa-plus me-1"></i> Tambah Wisata Baru
            </a>
        </div>

        {{-- Tabel --}}
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-secondary">
                    <tr>
                        <th style="width: 5%;">#</th>
                        <th style="width: 10%;">Gambar</th>
                        <th style="width: 25%;">Nama Wisata</th>
                        <th style="width: 15%;">Kategori</th>
                        <th style="width: 20%;">Lokasi</th>
                        <th style="width: 10%;">Rating</th>
                        <th style="width: 15%;">Tiket Masuk</th>
                        <th class="text-end pe-3" style="width: 10%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($wisatas as $i => $wisata)
                        <tr>
                            <td>{{ $wisatas->firstItem() + $i }}</td>
                            <td>
                                @if($wisata->gambar)
                                    <img src="{{ Str::startsWith($wisata->gambar, 'http') ? $wisata->gambar : asset('storage/' . $wisata->gambar) }}"
                                         alt="{{ $wisata->nama }}"
                                         style="width: 65px; height: 45px; object-fit: cover; border-radius: 5px;" class="shadow-sm">
                                @else
                                    <span class="text-muted small">-</span>
                                @endif
                            </td>
                            <td><strong class="text-dark">{{ $wisata->nama }}</strong></td>
                            <td>
                                @if($wisata->category)
                                    <span class="badge bg-info text-dark font-monospace small">{{ $wisata->category->nama }}</span>
                                @else
                                    <span class="badge bg-secondary opacity-70">-</span>
                                @endif
                            </td>
                            <td class="text-secondary small">{{ Str::limit($wisata->lokasi, 35) }}</td>
                            <td>
                                <span class="badge bg-warning text-dark shadow-sm">
                                    ⭐ {{ number_format($wisata->rating, 1) }}
                                </span>
                            </td>
                            <td class="text-dark fw-bold small">
                                @if(is_numeric($wisata->tiket_masuk))
                                    Rp {{ number_format($wisata->tiket_masuk, 0, ',', '.') }}
                                @else
                                    {{ $wisata->tiket_masuk }}
                                @endif
                            </td>
                            <td class="text-end pe-3">
                                <div class="d-flex gap-1 justify-content-end">
                                    <div class="d-flex gap-1 justify-content-end">
                                        <a href="{{ route('admin.wisata.edit', $wisata) }}" class="btn btn-sm btn-outline-warning shadow-sm" title="Edit Data">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('admin.wisata.destroy', $wisata) }}" method="POST"
                                              onsubmit="return confirm('Hapus data tempat wisata {{ $wisata->nama }} secara permanen?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger shadow-sm" title="Hapus Permanen">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-5 text-muted">
                                <i class="fas fa-folder-open fa-2x d-block mb-2 opacity-50"></i> Belum ada data tempat wisata yang terdaftar di database.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Paginasi --}}
        <div class="d-flex justify-content-end mt-4">
            {{ $wisatas->withQueryString()->links() }}
        </div>

    </div>
</div>

@endsection

