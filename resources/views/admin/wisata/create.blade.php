@extends('layouts.admin')

@section('title', 'Tambah Wisata')

@section('content')
    <div class="topbar">
        <h4 class="m-0">Tambah Wisata</h4>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.wisata.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Wisata <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating (0-5) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('rating') is-invalid @enderror" id="rating" name="rating" value="{{ old('rating', 5) }}" step="0.1" min="0" max="5" required>
                            @error('rating')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="5" required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="lokasi" class="form-label">Lokasi <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" value="{{ old('lokasi') }}" placeholder="Jalan, Kota, Provinsi" required>
                    @error('lokasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jam_buka" class="form-label">Jam Buka <span class="text-danger">*</span></label>
                            <input type="time" class="form-control @error('jam_buka') is-invalid @enderror" id="jam_buka" name="jam_buka" value="{{ old('jam_buka') }}" required>
                            @error('jam_buka')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jam_tutup" class="form-label">Jam Tutup <span class="text-danger">*</span></label>
                            <input type="time" class="form-control @error('jam_tutup') is-invalid @enderror" id="jam_tutup" name="jam_tutup" value="{{ old('jam_tutup') }}" required>
                            @error('jam_tutup')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="tiket_masuk" class="form-label">Tiket Masuk <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('tiket_masuk') is-invalid @enderror" id="tiket_masuk" name="tiket_masuk" value="{{ old('tiket_masuk') }}" placeholder="Rp 50.000" required>
                    @error('tiket_masuk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="telepon" class="form-label">Telepon <span class="text-muted">(Opsional)</span></label>
                            <input type="tel" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" value="{{ old('telepon') }}">
                            @error('telepon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="website" class="form-label">Website <span class="text-muted">(Opsional)</span></label>
                            <input type="url" class="form-control @error('website') is-invalid @enderror" id="website" name="website" value="{{ old('website') }}">
                            @error('website')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="gambar" class="form-label">Foto Utama (Cover Wisata) <span class="text-danger">*</span></label>
                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" accept="image/*" required>
                    <small class="form-text text-muted">Format: JPEG, PNG, JPG, GIF. Max 2MB</small>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <div class="mt-3" id="imagePreviewContainer" style="display: none;">
                        <p class="mb-2"><strong>Preview Gambar Baru:</strong></p>
                        <img id="imagePreview" src="#" alt="Preview Gambar Baru" class="img-fluid rounded" style="max-width: 200px; display: none; border-radius: 5px;">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori Wisata <span class="text-danger">*</span></label>
                            <select name="kategori" id="kategori" class="form-control @error('kategori') is-invalid @enderror" required>
                                <option value="">-- Pilih Kategori --</option>
                                <option value="Alam" {{ old('kategori') == 'Alam' ? 'selected' : '' }}>Wisata Alam</option>
                                <option value="Sejarah" {{ old('kategori') == 'Sejarah' ? 'selected' : '' }}>Wisata Sejarah / Budaya</option>
                                <option value="Kuliner" {{ old('kategori') == 'Kuliner' ? 'selected' : '' }}>Wisata Kuliner</option>
                                <option value="Edukasi" {{ old('kategori') == 'Edukasi' ? 'selected' : '' }}>Wisata Edukasi</option>
                            </select>
                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="video_url" class="form-label">Link Video Wisata (YouTube) <span class="text-danger">*</span></label>
                            <input type="url" class="form-control @error('video_url') is-invalid @enderror" id="video_url" name="video_url" value="{{ old('video_url') }}" placeholder="https://www.youtube.com/watch?v=xxxxxx" required>
                            @error('video_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="maps_iframe" class="form-label">Google Maps Lokasi (Iframe) <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('maps_iframe') is-invalid @enderror" id="maps_iframe" name="maps_iframe" rows="3" placeholder="Sematkan kode <iframe> dari Google Maps" required>{{ old('maps_iframe') }}</textarea>
                    <small class="form-text text-muted">Caranya: Buka Google Maps > Cari Lokasi > Bagikan > Sematkan Peta > Salin HTML-nya ke sini.</small>
                    @error('maps_iframe')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="card bg-light mb-4">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3 text-primary"><i class="fas fa-images"></i> Galeri Foto Wisata (Minimal 5 Angle Berbeda)</h5>
                        <p class="text-muted small">Tambahkan foto dengan sudut pandang yang ditentukan di bawah ini:</p>
                        
                        <div class="row g-3">
                            <div class="col-md-4 mb-2">
                                <label class="form-label small fw-bold">1. Tampak Depan <span class="text-danger">*</span></label>
                                <input type="file" name="galeri[tampak_depan]" class="form-control" accept="image/*" required>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label class="form-label small fw-bold">2. Tampak Samping <span class="text-danger">*</span></label>
                                <input type="file" name="galeri[tampak_samping]" class="form-control" accept="image/*" required>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label class="form-label small fw-bold">3. Area Dalam Lokasi <span class="text-danger">*</span></label>
                                <input type="file" name="galeri[area_dalam]" class="form-control" accept="image/*" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label small fw-bold">4. Spot Utama / Icon Wisata <span class="text-danger">*</span></label>
                                <input type="file" name="galeri[spot_utama]" class="form-control" accept="image/*" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label small fw-bold">5. Area Fasilitas Pendukung <span class="text-danger">*</span></label>
                                <input type="file" name="galeri[fasilitas]" class="form-control" accept="image/*" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('admin.wisata.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

    @section('scripts')
        <script>
            document.getElementById('gambar').addEventListener('change', function (event) {
                const file = event.target.files[0];
                const previewContainer = document.getElementById('imagePreviewContainer');
                const previewImage = document.getElementById('imagePreview');

                if (file) {
                    previewImage.src = URL.createObjectURL(file);
                    previewImage.style.display = 'block';
                    previewContainer.style.display = 'block';
                } else {
                    previewImage.src = '';
                    previewImage.style.display = 'none';
                    previewContainer.style.display = 'none';
                }
            });
        </script>
    @endsection
@endsection