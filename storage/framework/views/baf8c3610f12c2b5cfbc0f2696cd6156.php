

<?php $__env->startSection('title', 'Kelola Wisata'); ?>

<?php $__env->startSection('content'); ?>

<div class="topbar mb-4">
    <h4 class="m-0 fw-bold text-dark"><i class="fas fa-map-marked-alt text-primary me-2"></i>Manajemen Data Wisata Singkawang</h4>
</div>


<?php if(session('success_admin')): ?>
    <div class="alert alert-success border-0 shadow-sm alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-1"></i> <?php echo e(session('success_admin')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="card border-0 shadow-sm rounded">
    <div class="card-body">

        
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
            <form method="GET" action="<?php echo e(route('admin.wisata.index')); ?>" class="d-flex gap-2 flex-wrap">
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari nama atau lokasi..." value="<?php echo e(request('search')); ?>" style="width: 220px;">
                
                
                <select name="category_id" class="form-select form-select-sm" style="width: 180px;">
                    <option value="">-- Semua Kategori --</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cat->id); ?>" <?php echo e(request('category_id') == $cat->id ? 'selected' : ''); ?>>
                            <?php echo e($cat->nama); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                
                <button type="submit" class="btn btn-sm btn-primary px-3"><i class="fas fa-filter me-1"></i>Filter</button>
                <a href="<?php echo e(route('admin.wisata.index')); ?>" class="btn btn-sm btn-secondary px-3">Reset</a>
            </form>

            <a href="<?php echo e(route('admin.wisata.create')); ?>" class="btn btn-sm btn-success px-3 shadow-sm">
                <i class="fas fa-plus me-1"></i> Tambah Wisata Baru
            </a>
        </div>

        
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-secondary">
                    <tr>
                        <th style="width: 5%;">#</th>
                        <th style="width: 10%;">Gambar</th>
                        <th style="width: 25%;">Nama Wisata</th>
                        <th style="width: 15%;">Kategori</th>
                        <th style="width: 20%;">Lokasi</th>
                        <th style="width: 10%;">Rating</th>
                        <th style="width: 15%;">Tiket Masuk</th>
                        <th class="text-end pe-3" style="width: 10%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $wisatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $wisata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($wisatas->firstItem() + $i); ?></td>
                            <td>
                                <?php if($wisata->gambar): ?>
                                    <img src="<?php echo e(Str::startsWith($wisata->gambar, 'http') ? $wisata->gambar : asset('storage/' . $wisata->gambar)); ?>"
                                         alt="<?php echo e($wisata->nama); ?>"
                                         style="width: 65px; height: 45px; object-fit: cover; border-radius: 5px;" class="shadow-sm">
                                <?php else: ?>
                                    <span class="text-muted small">-</span>
                                <?php endif; ?>
                            </td>
                            <td><strong class="text-dark"><?php echo e($wisata->nama); ?></strong></td>
                            <td>
                                <?php if($wisata->category): ?>
                                    <span class="badge bg-info text-dark font-monospace small"><?php echo e($wisata->category->nama); ?></span>
                                <?php else: ?>
                                    <span class="badge bg-secondary opacity-70">-</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-secondary small"><?php echo e(Str::limit($wisata->lokasi, 35)); ?></td>
                            <td>
                                <span class="badge bg-warning text-dark shadow-sm">
                                    ⭐ <?php echo e(number_format($wisata->rating, 1)); ?>

                                </span>
                            </td>
                            <td class="text-dark fw-bold small">
                                <?php if(is_numeric($wisata->tiket_masuk)): ?>
                                    Rp <?php echo e(number_format($wisata->tiket_masuk, 0, ',', '.')); ?>

                                <?php else: ?>
                                    <?php echo e($wisata->tiket_masuk); ?>

                                <?php endif; ?>
                            </td>
                            <td class="text-end pe-3">
                                <div class="d-flex gap-1 justify-content-end">
                                    <div class="d-flex gap-1 justify-content-end">
                                        <a href="<?php echo e(route('admin.wisata.edit', $wisata)); ?>" class="btn btn-sm btn-outline-warning shadow-sm" title="Edit Data">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="<?php echo e(route('admin.wisata.destroy', $wisata)); ?>" method="POST"
                                              onsubmit="return confirm('Hapus data tempat wisata <?php echo e($wisata->nama); ?> secara permanen?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-outline-danger shadow-sm" title="Hapus Permanen">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="8" class="text-center py-5 text-muted">
                                <i class="fas fa-folder-open fa-2x d-block mb-2 opacity-50"></i> Belum ada data tempat wisata yang terdaftar di database.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        
        <div class="d-flex justify-content-end mt-4">
            <?php echo e($wisatas->withQueryString()->links()); ?>

        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\AndikaSaputra-XRPL1-SASGENAP\resources\views/admin/wisata/index.blade.php ENDPATH**/ ?>