@extends('layouts.admin')

@section('title', 'Dashboard Admin - Wisata Singkawang')

@section('content')
<div class="container-fluid px-0">
    <div class="topbar mb-4">
        <h4 class="m-0 fw-bold text-dark"><i class="fas fa-tachometer-alt text-primary me-2"></i>Dashboard Utama Admin</h4>
        <p class="text-muted small mb-0">Selamat datang kembali di panel kelola informasi wisata, Bin.</p>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-3 p-4 bg-primary text-white">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="mb-1 text-white-50">Total Destinasi</h6>
                        <h2 class="fw-bold mb-0">{{ $totalWisata }}</h2>
                    </div>
                    <div class="fs-1 opacity-25"><i class="fas fa-map-marked-alt"></i></div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-3 p-4 bg-danger text-white">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="mb-1 text-white-50">Laporan Kerusakan</h6>
                        <h2 class="fw-bold mb-0">{{ $totalPesan ?? 0 }}</h2>
                    </div>
                    <div class="fs-1 opacity-25"><i class="fas fa-exclamation-triangle"></i></div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-3 p-4 bg-success text-white">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="mb-1 text-white-50">Total Kategori</h6>
                        <h2 class="fw-bold mb-0">{{ $categories->count() }}</h2>
                    </div>
                    <div class="fs-1 opacity-25"><i class="fas fa-tags"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-3 p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold text-dark mb-0"><i class="fas fa-list text-secondary me-2"></i>Daftar Wisata Terbaru</h5>
                    <a href="{{ route('admin.wisata.create') }}" class="btn btn-success btn-sm rounded-3 fw-semibold px-3 py-2">
                        <i class="fas fa-plus me-1"></i> Tambah Wisata Baru
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr class="text-secondary fw-bold small">
                                <th style="width: 25%;">Nama Destinasi</th>
                                <th style="width: 15%;">Rating</th>
                                <th style="width: 40%;">Lokasi Alamat</th>
                                <th style="width: 20%; text-align: right;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentWisata as $wisata)
                                <tr>
                                    <td class="fw-bold text-dark">{{ $wisata->nama }}</td>
                                    <td>
                                        <span class="badge bg-warning text-dark fw-bold">
                                            <i class="fas fa-star text-danger me-1"></i>{{ number_format($wisata->rating ?? 5.0, 1) }}
                                        </span>
                                    </td>
                                    <td class="text-secondary small">{{ Str::limit($wisata->lokasi, 80) }}</td>
                                    <td style="text-align: right;">
                                        <div class="d-inline-flex gap-1">
                                            <a href="{{ route('admin.wisata.edit', $wisata) }}" class="btn btn-sm btn-warning text-white fw-semibold rounded-2 px-2.5">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('wisata.show', $wisata) }}" target="_blank" class="btn btn-sm btn-outline-primary fw-semibold rounded-2 px-2.5">
                                                <i class="fas fa-external-link-alt"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted small">
                                        <i class="fas fa-folder-open d-block mb-2 fa-2x opacity-50"></i> Belum ada data wisata yang terdaftar di database Laragon.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection