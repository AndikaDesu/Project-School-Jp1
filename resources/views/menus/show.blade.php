@extends('layouts.app') 

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                @if($wisata->gambar)
                    <img src="{{ Storage::url($wisata->gambar) }}" 
                         class="img-fluid w-100" 
                         style="height: 450px; object-fit: cover;" 
                         alt="{{ $wisata->nama }}"
                         onerror="this.onerror=null; this.src='{{ asset('images/no-image.jpg') }}'">
                @else
                    <div class="d-flex align-items-center justify-content-center bg-light" style="height: 450px;">
                        <span class="text-muted"><i class="fas fa-image fa-3x"></i></span>
                    </div>
                @endif
            </div>

            <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                <h4 class="fw-bold text-dark mb-3">Deskripsi</h4>
                <p class="text-secondary" style="text-align: justify; line-height: 1.8;">
                    {{ $wisata->deskripsi }}
                </p>
            </div>

            <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                <h4 class="fw-bold text-dark mb-3"><i class="fab fa-youtube text-danger me-2"></i>Video Wisata</h4>
                @if($wisata->video_url)
                    @php
                        $videoId = '';
                        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $wisata->video_url, $match)) {
                            $videoId = $match[1];
                        }
                    @endphp
                    @if($videoId)
                        <div class="ratio ratio-16x9 rounded-3 overflow-hidden shadow-sm">
                            <iframe src="https://www.youtube.com/embed/{{ $videoId }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    @endif
                @else
                    <p class="text-muted small italic mb-0">Video tidak tersedia.</p>
                @endif
            </div>

            <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                <h4 class="fw-bold text-dark mb-3"><i class="fas fa-map-marked-alt text-success me-2"></i>Peta Lokasi</h4>
                @if($wisata->maps_iframe)
                    <div class="ratio ratio-21x9 rounded-3 overflow-hidden shadow-sm border">
                        {!! $wisata->maps_iframe !!}
                    </div>
                @else
                    <p class="text-muted small italic mb-0">Peta lokasi belum disematkan.</p>
                @endif
            </div>

            <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                <h4 class="fw-bold text-dark mb-3"><i class="fas fa-images text-primary me-2"></i>Galeri Foto Pendukung</h4>
                <div class="row g-3">
                    @if($wisata->galleries && $wisata->galleries->count() > 0)
                        @foreach($wisata->galleries as $gallery)
                            <div class="col-md-4 col-sm-6">
                                <div class="border rounded-3 p-2 text-center bg-light shadow-sm h-100">
                                    <img src="{{ Storage::url($gallery->foto_path) }}" 
                                         class="img-fluid rounded-2 mb-0" 
                                         style="height: 140px; object-fit: cover; width: 100%; display: block !important;" 
                                         alt="Galeri"
                                         onerror="this.onerror=null; this.src='{{ asset('images/no-image.jpg') }}'">
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center py-3">
                            <p class="text-muted small mb-0">Belum ada foto galeri.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 position-sticky" style="top: 20px;">
                <h2 class="fw-bold text-dark mb-1">{{ $wisata->nama }}</h2>
                <div class="mb-4">
                    <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold">
                        <i class="fas fa-star text-danger me-1"></i> {{ number_format($wisata->rating, 1) }}/5
                    </span>
                </div>

                <h5 class="fw-bold text-dark mb-3">Informasi</h5>
                
                <div class="mb-3">
                    <small class="text-muted d-block"><i class="fas fa-map-marker-alt text-danger me-1"></i> Lokasi</small>
                    <span class="fw-semibold text-dark d-block text-justify small">{{ $wisata->lokasi }}</span>
                </div>

                <div class="mb-3">
                    <small class="text-muted d-block"><i class="fas fa-clock text-primary me-1"></i> Jam Operasional</small>
                    <span class="fw-semibold text-dark d-block small">{{ $wisata->jam_buka }} - {{ $wisata->jam_tutup }}</span>
                </div>

                <div class="mb-4">
                    <small class="text-muted d-block"><i class="fas fa-ticket-alt text-success me-1"></i> Tiket Masuk</small>
                    <span class="text-danger fw-bold fs-5 d-block">{{ $wisata->ticket_masuk ?? $wisata->tiket_masuk }}</span>
                </div>

                <div class="d-grid gap-2">
                    <a href="{{ route('admin.wisata.edit', $wisata) }}" class="btn btn-warning text-white fw-bold py-2 rounded-3">
                        <i class="fas fa-edit me-1"></i> Edit Wisata
                    </a>
                    <a href="javascript:history.back()" class="btn btn-outline-secondary py-2 rounded-3">
                        <i class="none"></i>Kembali
                    </a>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 p-4 text-center">
                <h5 class="fw-bold text-dark mb-1">Hubungi Kami</h5>
                <p class="text-muted small mb-3">Ada pertanyaan tentang wisata ini?</p>
                <button class="btn btn-danger w-100 py-2 rounded-3 fw-bold">Kirim Pesan</button>
            </div>
        </div>
    </div>
</div>
@endsection