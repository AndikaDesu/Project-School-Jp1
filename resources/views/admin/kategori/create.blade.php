@extends('layouts.admin')

@section('title', 'Tambah Kategori Baru')

@section('content')
<div class="topbar mb-4">
    <h4 class="m-0 fw-bold text-dark"><i class="fas fa-plus text-success me-2"></i>Tambah Kategori Baru</h4>
</div>

<div class="card border-0 shadow-sm p-4">
    <form action="{{ route('admin.kategori.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="nama_kategori" class="form-label fw-bold">Nama Kategori</label>
            <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}" placeholder="Contoh: Wisata Alam, Wisata Budaya, Wisata Kuliner" required autofocus>
            @error('nama_kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary px-4 shadow-sm fw-bold">Simpan Kategori</button>
            <a href="{{ route('admin.kategori.index') }}" class="btn btn-light border px-4">Kembali</a>
        </div>
    </form>
</div>
@endsection