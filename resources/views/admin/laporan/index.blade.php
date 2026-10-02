@extends('layouts.admin')

@section('title', 'Manajemen Laporan Pengaduan')

@section('content')
<div class="topbar mb-4 d-flex justify-content-between align-items-center">
    <h4 class="m-0 fw-bold text-dark"><i class="fas fa-exclamation-triangle text-danger me-2"></i>Moderasi Pengaduan & Keluhan Sistem</h4>
</div>

{{-- Alert Notifikasi Sukses --}}
@if(session('success_admin'))
    <div class="alert alert-success border-0 shadow-sm mb-3">
        <i class="fas fa-check-circle me-1"></i> {{ session('success_admin') }}
    </div>
@endif

<div class="card border-0 shadow-sm rounded">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-secondary">
                    <tr>
                        <th class="ps-3" style="width: 25%;">Pelapor</th>
                        <th style="width: 60%;">Isi Laporan Keluhan / Bug Web</th>
                        <th class="text-end pe-3" style="width: 15%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reports as $report)
                        <tr>
                            <td class="ps-3">
                                <strong class="d-block text-dark">{{ $report->nama }}</strong>
                                <small class="text-muted d-block">{{ $report->email }}</small>
                                @if($report->telepon)
                                    <small class="text-success fw-bold d-block mt-0.5"><i class="fab fa-whatsapp me-1"></i>{{ $report->telepon }}</small>
                                @endif
                            </td>
                            <td>
                                <p class="mb-0 text-secondary small" style="white-space: normal; text-align: justify;">"{{ $report->pesan }}"</p>
                                <small class="text-muted d-block mt-1" style="font-size: 11px;"><i class="fas fa-clock fa-xs me-1"></i>{{ \Carbon\Carbon::parse($report->created_at)->format('d M Y, H:i') }}</small>
                            </td>
                            <td class="text-end pe-3">
                                <div class="d-flex gap-1 justify-content-end">
                                    {{-- Tombol Hapus Laporan Palsu / Spam --}}
                                    <form action="{{ route('admin.laporan.delete', $report->id) }}" method="POST" onsubmit="return confirm('Hapus laporan komplain ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm px-2.5 shadow-sm" title="Hapus">
                                            <i class="fas fa-trash-alt me-1"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-5 text-muted">
                                <i class="fas fa-shield-alt fa-2x d-block mb-2 opacity-50"></i> Belum ada antrean laporan kerusakan masuk dari pengunjung.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Link Paginasi Laporan --}}
<div class="d-flex justify-content-center mt-4">
    {!! $reports->links() !!}
</div>
@endsection