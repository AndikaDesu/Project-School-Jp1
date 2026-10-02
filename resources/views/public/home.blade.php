@extends('layouts.app')

@section('title', 'Beranda - Kuy Wisata Singkawang')

@section('content')
    <section class="hero-section" style="
        background: linear-gradient(rgba(7, 20, 36, 0.55), rgba(15, 42, 74, 0.8)), url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=1473&auto=format&fit=cover');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 85vh;
        display: flex;
        align-items: center;
        color: white;
        position: relative;
        overflow: hidden;
    ">
        <div class="hero-dots" style="
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(255,255,255,0.08) 1px, transparent 1px);
            background-size: 32px 32px;
            z-index: 1;
            pointer-events: none;
        "></div>

        <div class="container position-relative animate-fade-up" style="z-index: 10;">
            <div class="row">
                <div class="col-lg-8">
                    <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold text-uppercase mb-3 shadow-sm" style="letter-spacing: 2px; font-size: 0.75rem; font-family: 'Syne', sans-serif;">
                        Wonderful Singkawang
                    </span>
                    <h1 class="display-4 fw-bold mb-3" style="font-family: 'Syne', sans-serif; letter-spacing: -0.02em; text-shadow: 0 4px 15px rgba(0,0,0,0.4);">
                        Jelajahi Keindahan Wisata Singkawang
                    </h1>
                    <p class="lead mb-4 text-white-50" style="font-size: 1.2rem; text-shadow: 0 2px 8px rgba(0,0,0,0.4); max-width: 650px;">
                        Temukan destinasi wisata terbaik dengan informasi lengkap dan gambar menarik. Nikmati kehangatan budaya dan pesona alam yang memukau.
                    </p>
                    <a href="{{ route('wisata.index') }}" class="btn btn-danger btn-lg px-4 py-3 shadow-lg fw-bold" style="border-radius: 10px; background: var(--secondary-color); border: none; font-family: 'Syne', sans-serif;">
                        Jelajahi Sekarang <i class="fas fa-compass ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container py-4">
            <div class="text-center mb-5 animate-fade-up">
                <h2 class="fw-bold display-6" style="font-family: 'Syne', sans-serif; color: var(--primary-color);">Wisata Unggulan</h2>
                <p class="text-muted">Destinasi pilihan terbaik yang wajib dikunjungi di Singkawang</p>
            </div>

            <div class="row g-4">
                @forelse($wisatas as $wisata)
                    <div class="col-md-6 col-lg-4 animate-fade-up">
                        <div class="card h-100 border-0 shadow-sm card-wisata-custom" style="border-radius: 18px; overflow: hidden; position: relative;">
                            
                            <div class="position-relative overflow-hidden" style="height: 250px;">
                                {{-- ✔ STRUCTURE FIXED: Pengecekan gambar URL vs Lokal yang sudah rapi --}}
                                @if($wisata->gambar)
                                    @if(\Illuminate\Support\Str::startsWith($wisata->gambar, ['http://', 'https://']))
                                        <img src="{{ $wisata->gambar }}" class="w-100 h-100 img-wisata" style="object-fit: cover; transition: var(--transition-smooth);" alt="{{ $wisata->nama }}">
                                    @else
                                        <img src="{{ asset('storage/' . $wisata->gambar) }}" class="w-100 h-100 img-wisata" style="object-fit: cover; transition: var(--transition-smooth);" alt="{{ $wisata->nama }}">
                                    @endif
                                @else
                                    <div class="w-100 h-100 bg-secondary d-flex align-items-center justify-content-center">
                                        <i class="fas fa-image text-white fa-3x"></i>
                                    </div>
                                @endif
                                
                                <div class="badge-rating" style="position: absolute; top: 15px; right: 15px; background: rgba(255, 107, 107, 0.95); backdrop-filter: blur(6px); color: white; padding: 6px 14px; border-radius: 30px; font-weight: 700; font-size: 0.82rem; font-family: 'Syne', sans-serif; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
                                    <i class="fas fa-star text-warning me-1"></i> {{ number_format($wisata->rating, 1) }}
                                </div>
                            </div>

                            <div class="card-body p-4">
                                <h5 class="card-title fw-bold mb-2" style="color: var(--primary-color);">{{ $wisata->nama }}</h5>
                                <p class="card-text text-muted small mb-4" style="text-align: justify;">{{ Str::limit($wisata->deskripsi, 100) }}</p>
                                
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="badge bg-light text-primary px-3 py-2 rounded-pill fw-semibold border border-primary-subtle" style="font-size: 0.8rem;">
                                        <i class="fas fa-map-marker-alt text-danger me-1"></i> Singkawang
                                    </span>
                                    <span class="text-danger fw-bold fs-6">
                                        @if(is_numeric($wisata->tiket_masuk))
                                            Rp {{ number_format($wisata->tiket_masuk, 0, ',', '.') }}
                                        @else
                                            {{ $wisata->tiket_masuk }}
                                        @endif
                                    </span>
                                </div>
                            </div>

                            <div class="card-footer bg-white border-top-0 p-4 pt-0">
                                <a href="{{ route('wisata.show', $wisata) }}" class="btn btn-primary btn-sm w-100 py-2 fw-semibold" style="border-radius: 10px;">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div class="text-muted mb-3"><i class="fas fa-folder-open fa-3x"></i></div>
                        <p class="text-muted fw-medium">Data destinasi wisata belum tersedia.</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('wisata.index') }}" class="btn btn-outline-primary btn-lg px-4 py-2 fw-semibold" style="border-radius: 10px;">
                    Lihat Semua Wisata <i class="fas fa-arrow-right ms-2 small"></i>
                </a>
            </div>
        </div>
    </section>

    <section class="py-5" style="background: var(--primary-gradient); color: white; position: relative;">
        <div class="container py-3">
            <div class="row text-center g-4">
                <div class="col-md-4">
                    <h3 class="display-5 fw-bold" style="font-family: 'Syne', sans-serif; color: var(--gold);">15+</h3>
                    <p class="text-white-50 mb-0 small text-uppercase tracking-wider fw-semibold">Destinasi Wisata</p>
                </div>
                <div class="col-md-4">
                    <h3 class="display-5 fw-bold" style="font-family: 'Syne', sans-serif; color: var(--gold);">100%</h3>
                    <p class="text-white-50 mb-0 small text-uppercase tracking-wider fw-semibold">Informasi Akurat</p>
                </div>
                <div class="col-md-4">
                    <h3 class="display-5 fw-bold" style="font-family: 'Syne', sans-serif; color: var(--gold);">5★</h3>
                    <p class="text-white-50 mb-0 small text-uppercase tracking-wider fw-semibold">Rating Terbaik</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white border-top border-light-subtle">
        <div class="container text-center py-4 animate-fade-up">
            <h2 class="mb-3 fw-bold" style="font-family: 'Syne', sans-serif; color: var(--primary-color);">Ada Pertanyaan?</h2>
            <p class="text-muted mx-auto mb-4" style="max-width: 550px;">Hubungi tim layanan informasi kami untuk bantuan panduan perjalanan lengkap seputar wisata di Singkawang.</p>
            <a href="{{ route('contact.index') }}" class="btn btn-danger btn-lg px-4 py-3 fw-bold" style="border-radius: 10px; background: var(--secondary-color); border: none; font-family: 'Syne', sans-serif;">
                <i class="fas fa-envelope me-2"></i> Hubungi Kami
            </a>
        </div>
    </section>

    <style>
        .animate-fade-up {
            animation: heroFadeUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) both;
        }
        @keyframes heroFadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .card-wisata-custom {
            transition: var(--transition-smooth);
        }
        .card-wisata-custom:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(15, 42, 74, 0.12) !important;
        }
        .card-wisata-custom:hover .img-wisata {
            transform: scale(1.05);
        }
    </style>
@endsection