

<?php $__env->startSection('title', 'Dashboard Admin - Wisata Singkawang'); ?>

<?php $__env->startSection('content'); ?>
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
                        <h2 class="fw-bold mb-0"><?php echo e($totalWisata); ?></h2>
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
                        <h2 class="fw-bold mb-0"><?php echo e($totalPesan ?? 0); ?></h2>
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
                        <h2 class="fw-bold mb-0"><?php echo e($categories->count()); ?></h2>
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
                    <a href="<?php echo e(route('admin.wisata.create')); ?>" class="btn btn-success btn-sm rounded-3 fw-semibold px-3 py-2">
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
                            <?php $__empty_1 = true; $__currentLoopData = $recentWisata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wisata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td class="fw-bold text-dark"><?php echo e($wisata->nama); ?></td>
                                    <td>
                                        <span class="badge bg-warning text-dark fw-bold">
                                            <i class="fas fa-star text-danger me-1"></i><?php echo e(number_format($wisata->rating ?? 5.0, 1)); ?>

                                        </span>
                                    </td>
                                    <td class="text-secondary small"><?php echo e(Str::limit($wisata->lokasi, 80)); ?></td>
                                    <td style="text-align: right;">
                                        <div class="d-inline-flex gap-1">
                                            <a href="<?php echo e(route('admin.wisata.edit', $wisata)); ?>" class="btn btn-sm btn-warning text-white fw-semibold rounded-2 px-2.5">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?php echo e(route('wisata.show', $wisata)); ?>" target="_blank" class="btn btn-sm btn-outline-primary fw-semibold rounded-2 px-2.5">
                                                <i class="fas fa-external-link-alt"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted small">
                                        <i class="fas fa-folder-open d-block mb-2 fa-2x opacity-50"></i> Belum ada data wisata yang terdaftar di database Laragon.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\AndikaSaputra-XRPL1-SASGENAP\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>