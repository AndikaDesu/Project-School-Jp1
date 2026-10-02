@extends('layouts.app')

@section('title', 'Hubungi Kami - Laporan Kerusakan')

@section('content')
    <div class="container py-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item active">Laporkan Kerusakan</li>
            </ol>
        </nav>

        <h1 class="mb-5 text-center fw-bold text-dark"><i class="fas fa-exclamation-triangle text-danger me-2"></i>Hubungi Kami & Laporkan Kerusakan</h1>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg rounded-3">
                    <div class="card-body p-5">
                        
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="nama" class="form-label fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', auth()->user()?->name ?? '') }}" required placeholder="Masukkan nama lengkap Anda">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">Alamat Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', auth()->user()?->email ?? '') }}" required placeholder="contoh@email.com">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="subjek" class="form-label fw-bold">Subjek / Kategori Laporan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('subjek') is-invalid @enderror" id="subjek" name="subjek" value="{{ old('subjek') }}" required placeholder="Contoh: Bug Foto Wisata Pecah / Peta Error">
                                @error('subjek')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="pesan" class="form-label fw-bold">Detail Pesan / Kerusakan <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('pesan') is-invalid @enderror" id="pesan" name="pesan" rows="6" required placeholder="Jelaskan secara rinci kendala atau bug sistem yang Anda temukan, Bin...">{{ old('pesan') }}</textarea>
                                <small class="text-muted d-block mt-1">Isi pesan minimal berukuran 10 karakter.</small>
                                @error('pesan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold shadow-sm rounded-3">
                                <i class="fas fa-paper-plane me-2"></i> Kirim Laporan Pengaduan
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-lg mb-3 rounded-3">
                    <div class="card-body">
                        <h5 class="card-title mb-3 fw-bold"><i class="fas fa-phone text-primary me-2"></i>Telepon</h5>
                        <p class="mb-0 text-muted">(021) 1234-5678</p>
                    </div>
                </div>

                <div class="card border-0 shadow-lg mb-3 rounded-3">
                    <div class="card-body">
                        <h5 class="card-title mb-3 fw-bold"><i class="fas fa-envelope text-danger me-2"></i>Email Support</h5>
                        <p class="mb-0 text-muted">admin_wisata@singkawang.go.id</p>
                    </div>
                </div>

                <div class="card border-0 shadow-lg mb-3 rounded-3">
                    <div class="card-body">
                        <h5 class="card-title mb-3 fw-bold"><i class="fas fa-map-marker-alt text-success me-2"></i>Kantor</h5>
                        <p class="mb-0 text-muted">Singkawang, Kalimantan Barat, Indonesia</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection