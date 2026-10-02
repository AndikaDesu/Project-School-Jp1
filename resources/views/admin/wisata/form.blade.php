<form action="{{ isset($wisata) ? route('admin.wisata.update', $wisata) : route('admin.wisata.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($wisata))
        @method('PUT')
    @endif

    <div class="mb-3">
        <label for="nama" class="form-label fw-bold">Nama Wisata <span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $wisata->nama ?? '') }}" required>
        @error('nama')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="deskripsi" class="form-label fw-bold">Deskripsi <span class="text-danger">*</span></label>
        <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi', $wisata->deskripsi ?? '') }}</textarea>
        @error('deskripsi')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="gambar" class="form-label fw-bold">Gambar Utama <span class="text-danger">*</span></label>
        <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" accept="image/jpeg,image/png,image/jpg,image/webp">
        <small class="text-muted d-block">Format: JPG, PNG, WebP (Max: 2MB)</small>
        @if(isset($wisata) && $wisata->gambar)
            <div class="mt-2">
                <small class="text-muted d-block mb-2">Gambar saat ini:</small>
                <img src="{{ asset('storage/' . $wisata->gambar) }}" alt="{{ $wisata->nama }}" class="img-thumbnail" style="max-width: 200px;">
            </div>
        @endif
        @error('gambar')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="lokasi" class="form-label fw-bold">Lokasi <span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" value="{{ old('lokasi', $wisata->lokasi ?? '') }}" placeholder="Contoh: Jl. Pendek, Singkawang" required>
        @error('lokasi')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="jam_buka" class="form-label fw-bold">Jam Buka <span class="text-danger">*</span></label>
                <input type="time" class="form-control @error('jam_buka') is-invalid @enderror" id="jam_buka" name="jam_buka" value="{{ old('jam_buka', $wisata->jam_buka ?? '') }}" required>
                @error('jam_buka')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="jam_tutup" class="form-label fw-bold">Jam Tutup <span class="text-danger">*</span></label>
                <input type="time" class="form-control @error('jam_tutup') is-invalid @enderror" id="jam_tutup" name="jam_tutup" value="{{ old('jam_tutup', $wisata->jam_tutup ?? '') }}" required>
                @error('jam_tutup')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label for="tiket_masuk" class="form-label fw-bold">Harga Tiket Masuk <span class="text-danger">*</span></label>
        <div class="input-group">
            <span class="input-group-text">Rp</span>
            <input type="number" class="form-control @error('tiket_masuk') is-invalid @enderror" id="tiket_masuk" name="tiket_masuk" value="{{ old('tiket_masuk', $wisata->tiket_masuk ?? 0) }}" min="0" required>
        </div>
        @error('tiket_masuk')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="rating" class="form-label fw-bold">Rating (0-5)</label>
        <input type="number" step="0.1" class="form-control @error('rating') is-invalid @enderror" id="rating" name="rating" value="{{ old('rating', $wisata->rating ?? 0) }}" min="0" max="5">
        @error('rating')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <hr class="my-4">
    <h5 class="fw-bold mb-3">Media & Lokasi</h5>

    <div class="mb-3">
        <label for="video_youtube" class="form-label fw-bold">Link Video YouTube</label>
        <input type="url" class="form-control @error('video_youtube') is-invalid @enderror" id="video_youtube" name="video_youtube" placeholder="https://www.youtube.com/watch?v=xxxxx" value="{{ old('video_youtube', $wisata->video_youtube ?? '') }}">
        <small class="text-muted d-block">Format: https://www.youtube.com/watch?v=dQw4w9WgXcQ atau https://youtu.be/dQw4w9WgXcQ</small>
        @if(isset($wisata) && $wisata->video_youtube)
            <div class="mt-2">
                <small class="text-muted d-block mb-2">Preview:</small>
                <div class="ratio ratio-16x9" style="max-width: 300px;">
                    <iframe src="https://www.youtube.com/embed/{{ \App\Helpers\YoutubeHelper::extractYouTubeID($wisata->video_youtube) }}" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        @endif
        @error('video_youtube')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="maps_iframe" class="form-label fw-bold">Google Maps Embed Code</label>
        <textarea class="form-control @error('maps_iframe') is-invalid @enderror" id="maps_iframe" name="maps_iframe" rows="3" placeholder="Paste embed code dari Google Maps di sini">{{ old('maps_iframe', $wisata->maps_iframe ?? '') }}</textarea>
        <small class="text-muted d-block mt-2">
            <strong>Cara mendapatkan embed code:</strong><br>
            1. Buka <a href="https://maps.google.com" target="_blank">Google Maps</a><br>
            2. Cari lokasi wisata Anda<br>
            3. Klik tombol "Share" → "Embed a map"<br>
            4. Copy iframe code dan paste di sini
        </small>
        @if(isset($wisata) && $wisata->maps_iframe)
            <div class="mt-2">
                <small class="text-muted d-block mb-2">Preview:</small>
                <div class="ratio ratio-21x9" style="max-width: 400px;">
                    {!! $wisata->maps_iframe !!}
                </div>
            </div>
        @endif
        @error('maps_iframe')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="link_maps" class="form-label fw-bold">Link Google Maps (Alternatif)</label>
        <input type="url" class="form-control @error('link_maps') is-invalid @enderror" id="link_maps" name="link_maps" placeholder="https://maps.google.com/?q=-0.123456,109.654321" value="{{ old('link_maps', $wisata->link_maps ?? '') }}">
        <small class="text-muted d-block">Jika tidak ada embed code, cukup masukkan link Google Maps</small>
        @if(isset($wisata) && $wisata->link_maps)
            <div class="mt-2">
                <a href="{{ $wisata->link_maps }}" target="_blank" class="btn btn-sm btn-info">
                    <i class="fas fa-map-marker-alt"></i> Buka di Google Maps
                </a>
            </div>
        @endif
        @error('link_maps')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <hr class="my-4">

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save me-1"></i>{{ isset($wisata) ? 'Update' : 'Tambah' }} Wisata
        </button>
        <a href="{{ route('admin.wisata.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i>Kembali
        </a>
    </div>
</form>