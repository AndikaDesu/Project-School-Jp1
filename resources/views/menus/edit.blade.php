@extends('layouts.admin')

@section('title', 'Edit Wisata - ' . $wisata->nama)

@section('content')

    <div class="topbar">
        <h4 class="m-0">Edit Wisata: {{ $wisata->nama }}</h4>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.wisata.update', $wisata) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Wisata <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $wisata->nama) }}" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating (0-5) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('rating') is-invalid @enderror" id="rating" name="rating" value="{{ old('rating', $wisata->rating) }}" step="0.1" min="0" max="5" required>
                            @error('rating')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="5" required>{{ old('deskripsi', $wisata->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" value="{{ old('lokasi', $wisata->lokasi) }}" placeholder="Jalan, Kota, Provinsi" required>
                            @error('lokasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Kategori <span class="text-danger">*</span></label>
                            <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                                <option value="">-- Pilih Kategori Wisata --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $wisata->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jam_buka" class="form-label">Jam Buka <span class="text-danger">*</span></label>
                            <input type="time" class="form-control @error('jam_buka') is-invalid @enderror" id="jam_buka" name="jam_buka" value="{{ old('jam_buka', $wisata->jam_buka) }}" required>
                            @error('jam_buka')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jam_tutup" class="form-label">Jam Tutup <span class="text-danger">*</span></label>
                            <input type="time" class="form-control @error('jam_tutup') is-invalid @enderror" id="jam_tutup" name="jam_tutup" value="{{ old('jam_tutup', $wisata->jam_tutup) }}" required>
                            @error('jam_tutup')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="tiket_masuk" class="form-label">Tiket Masuk <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('tiket_masuk') is-invalid @enderror" id="tiket_masuk" name="tiket_masuk" value="{{ old('tiket_masuk', $wisata->tiket_masuk) }}" placeholder="Rp 50.000" required>
                    @error('tiket_masuk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="telepon" class="form-label">Telepon <span class="text-muted">(Opsional)</span></label>
                            <input type="tel" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" value="{{ old('telepon', $wisata->telepon) }}">
                            @error('telepon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="website" class="form-label">Website <span class="text-muted">(Opsional)</span></label>
                            <input type="url" class="form-control @error('website') is-invalid @enderror" id="website" name="website" value="{{ old('website', $wisata->website) }}">
                            @error('website')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="video_youtube" class="form-label">Link Video YouTube <span class="text-muted">(Opsional)</span></label>
                    <input type="url" class="form-control @error('video_youtube') is-invalid @enderror" id="video_youtube" name="video_youtube" value="{{ old('video_youtube', $wisata->video_youtube) }}" placeholder="https://www.youtube.com/watch?v=...">
                    @error('video_youtube')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="gambar" class="form-label">Gambar Utama <span class="text-muted">(Opsional)</span></label>
                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" accept="image/*">
                    <small class="form-text text-muted">Format: JPEG, PNG, JPG, GIF. Max 2MB</small>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <div class="mt-3" id="imagePreviewContainer" style="display: none;">
                        <p class="mb-2"><strong>Preview Gambar Utama Baru:</strong></p>
                        <img id="imagePreview" src="#" alt="Preview Gambar Baru" class="img-fluid rounded" style="max-width: 200px; display: none; border-radius: 5px;">
                    </div>

                    @if($wisata->gambar)
                        <div class="mt-3">
                            <p class="mb-2"><strong>Gambar Utama Saat Ini:</strong></p>
                            <img src="{{ asset('storage/' . $wisata->gambar) }}" alt="{{ $wisata->nama }}" style="max-width: 200px; border-radius: 5px;">
                        </div>
                    @endif
                </div>

                <hr class="my-4">

                <div class="mb-4">
                    <h5 class="fw-bold text-dark mb-3"><i class="fas fa-images text-primary me-2"></i>Kelola Galeri Foto Wisata</h5>
                    <div class="row g-3">
                        @php
                            $labels = [
                                0 => '1. Tampak Depan *',
                                1 => '2. Tampak Samping *',
                                2 => '3. Area Dalam Lokasi *',
                                3 => '4. Spot Utama / Icon Wisata *',
                                4 => '5. Area Fasilitas Pendukung *'
                            ];
                            $existingGalleries = $wisata->galleries->values();
                        @endphp

                        @foreach($labels as $index => $labelText)
                            @php
                                $gallery = $existingGalleries->get($index);
                            @endphp
                            
                            <div class="col-md-4" style="display: block !important;">
                                <div class="border rounded-3 p-3 bg-light text-center shadow-sm h-100">
                                    <label class="form-label fw-bold text-secondary d-block text-start mb-2">{{ $labelText }}</label>
                                    
                                    @if($gallery && $gallery->foto_path)
                                        <img src="{{ asset('storage/' . $gallery->foto_path) }}" class="img-fluid rounded-2 mb-2" style="height: 120px; object-fit: cover; width: 100%; display: block !important;" alt="Galeri">
                                        <input type="file" name="galeri[{{ $index }}]" class="form-control form-control-sm" accept="image/*" style="display: block !important;">
                                        <small class="text-muted d-block mt-1">Pilih file jika ingin mengganti foto ini</small>
                                    @else
                                        <div class="py-4 mb-2 bg-white rounded border d-flex align-items-center justify-content-center text-muted" style="height: 120px; border-style: dashed !important;">
                                            <div>
                                                <i class="fas fa-image fa-2x d-block mb-1 mx-auto"></i> Belum ada foto
                                            </div>
                                        </div>
                                        <input type="file" name="galeri[{{ $index }}]" class="form-control form-control-sm" accept="image/*" style="display: block !important;">
                                        <small class="text-muted d-block mt-1">Format: JPG, PNG. Maks 2MB</small>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <hr class="my-4">

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Data Wisata
                    </button>
                    <a href="{{ route('admin.wisata.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection

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