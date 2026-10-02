@extends('layouts.admin')

@section('title', 'Manajemen Komentar Pengunjung')

@section('content')
<div class="topbar mb-4 d-flex justify-content-between align-items-center">
    <h4 class="m-0 fw-bold text-dark"><i class="fas fa-comments text-info me-2"></i>Moderasi Komentar Pengunjung</h4>
</div>

@if(session('success_admin'))
    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
        {{ session('success_admin') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card border-0 shadow-sm rounded">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-secondary">
                    <tr>
                        <th class="ps-3" style="width: 20%;">Pengomentar</th>
                        <th style="width: 20%;">Destinasi Wisata</th>
                        <th style="width: 35%;">Isi Komentar & Rating</th>
                        <th style="width: 10%;">Status</th>
                        <th class="text-end pe-3" style="width: 15%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($comments as $comment)
                        <tr>
                            <td class="ps-3">
                                <strong class="d-block text-dark">{{ $comment->nama_pengomentar }}</strong>
                                <small class="text-muted">{{ $comment->email_pengomentar }}</small>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border px-2 py-1.5">{{ $comment->wisata->nama ?? 'Wisata Dihapus' }}</span>
                            </td>
                            <td>
                                <div class="text-warning mb-1 small">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="{{ $i <= $comment->rating ? 'fas' : 'far' }} fa-star"></i>
                                    @endfor
                                </div>
                                <p class="mb-0 text-secondary small" style="white-space: normal; text-align: justify;">{{ $comment->isi_komentar }}</p>
                                
                                @if($comment->balasan)
                                    <div class="bg-light p-2 rounded border mt-2 small">
                                        <strong class="text-info d-block"><i class="fas fa-reply me-1"></i> Balasan Admin:</strong>
                                        <span class="text-muted">{{ $comment->balasan }}</span>
                                    </div>
                                @endif
                            </td>
                            <td>
                                @if($comment->is_approved)
                                    <span class="badge bg-success border px-2.5 py-1.5"><i class="fas fa-check me-1"></i>Tampil</span>
                                @else
                                    <span class="badge bg-warning text-dark border px-2.5 py-1.5"><i class="fas fa-clock me-1"></i>Tertahan</span>
                                @endif
                            </td>
                            <td class="text-end pe-3">
                                <div class="d-flex gap-1 justify-content-end">
                                    @if(!$comment->is_approved)
                                        <form action="{{ route('admin.komentar.approve', $comment->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success btn-sm fw-bold px-2.5 shadow-sm" title="Setujui">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>
                                    @endif
                                    
                                    <button type="button" class="btn btn-primary btn-sm px-2 shadow-sm" data-bs-toggle="modal" data-bs-target="#replyModal{{ $comment->id }}" title="Balas">
                                        <i class="fas fa-reply"></i>
                                    </button>
                                    
                                    <form action="{{ route('admin.komentar.delete', $comment->id) }}" method="POST" onsubmit="return confirm('Hapus komentar ini secara permanen, Bin?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm px-2 shadow-sm" title="Hapus">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <div class="modal fade" id="replyModal{{ $comment->id }}" tabindex="-1" aria-labelledby="replyModalLabel{{ $comment->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="{{ route('admin.komentar.reply', $comment->id) }}" method="POST">
                                    @csrf
                                    <div class="modal-content text-start">
                                        <div class="modal-header">
                                            <h5 class="modal-title fw-bold" id="replyModalLabel{{ $comment->id }}">Balas Ulasan: {{ $comment->nama_pengomentar }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Komentar Pengunjung:</label>
                                                <blockquote class="bg-light p-2 rounded text-muted small border-start border-3 border-info mb-0">{{ $comment->isi_komentar }}</blockquote>
                                            </div>
                                            <div class="mb-3">
                                                <label for="balasan" class="form-label fw-bold">Tulis Balasan Resmi Admin <span class="text-danger">*</span></label>
                                                <textarea class="form-control" id="balasan" name="balasan" rows="4" required placeholder="Ketik balasan admin di sini, Bin...">{{ $comment->balasan }}</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane me-1"></i> Simpan Balasan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="fas fa-comments fa-2x d-block mb-2 opacity-50"></i> Belum ada antrean komentar masuk dari pengunjung.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center mt-4">
    {!! $comments->links() !!}
</div>
@endsection