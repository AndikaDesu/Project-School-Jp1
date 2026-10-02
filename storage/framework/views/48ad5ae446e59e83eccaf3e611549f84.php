

<?php $__env->startSection('title', 'Daftar Wisata - Wisata Singkawang'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container py-5">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb bg-transparent p-0 mb-0" style="font-size: 1rem;">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>" class="text-decoration-none text-primary fw-medium">Beranda</a></li>
                <li class="breadcrumb-item active text-muted fw-semibold" aria-current="page">Wisata</li>
            </ol>
        </nav>

        <div class="mb-5 border-start border-primary border-4 ps-3 py-1">
            <h1 class="display-5 fw-bold text-dark mb-2" style="font-family: 'Syne', sans-serif;">Daftar Wisata Singkawang</h1>
            <p class="text-secondary lead mb-0" style="font-size: 1.15rem;">Temukan ragam pesona alam, budaya, dan tempat rekreasi terbaik di Kota Singkawang.</p>
        </div>

        <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white" style="overflow: visible;">
            <form action="<?php echo e(route('wisata.index')); ?>" method="GET" id="searchForm">
                <div class="row g-3 align-items-center">
                    <div class="col-lg-6 col-md-10 position-relative">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted px-3"><i class="fas fa-search fs-5"></i></span>
                            <input type="text" name="search" id="searchInput" autocomplete="off" class="form-control bg-light border-start-0 py-3 ps-1" style="font-size: 1.05rem;" placeholder="Ketik nama tempat atau lokasi wisata..." value="<?php echo e(request('search')); ?>">
                        </div>
                        <div id="suggestionBox" class="list-group position-absolute w-100 shadow-lg d-none" style="z-index: 9999; max-height: 250px; overflow-y: auto; margin-top: 5px; border-radius: 8px;"></div>
                    </div>

                    <?php if(isset($categories) && $categories->count() > 0): ?>
                    <div class="col-lg-3 col-md-6">
                        <select name="kategori" class="form-select bg-light py-3" style="font-size: 1.05rem;" onchange="this.form.submit()">
                            <option value="">-- Semua Kategori --</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cat->slug); ?>" <?php echo e(request('kategori') == $cat->slug ? 'selected' : ''); ?>>
                                    <?php echo e($cat->nama); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <?php endif; ?>

                    <div class="col-lg-3 col-md-6 d-flex gap-2">
                        <button type="submit" class="btn btn-primary py-3 px-4 fw-bold w-100 shadow-sm" style="font-size: 1rem;"><i class="fas fa-sliders me-1"></i> Cari Data</button>
                        <?php if(request('search') || request('kategori')): ?>
                            <a href="<?php echo e(route('wisata.index')); ?>" class="btn btn-secondary py-3 px-3 fw-semibold"><i class="fas fa-arrow-rotate-left"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </form>
        </div>

        <?php if(request('search')): ?>
            <div class="alert alert-light border shadow-sm rounded-3 py-3 px-4 mb-4 d-flex align-items-center justify-content-between">
                <span class="text-dark" style="font-size: 1.05rem;">Menampilkan hasil pencarian untuk kata kunci: <strong class="text-danger">"<?php echo e(request('search')); ?>"</strong></span>
                <a href="<?php echo e(route('wisata.index')); ?>" class="text-decoration-none small fw-bold text-primary">Hapus Pencarian</a>
            </div>
        <?php endif; ?>

        <div class="row g-4 mb-4">
            <?php $__empty_1 = true; $__currentLoopData = $wisatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wisata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden position-relative card-hover-animation" style="background: #ffffff;">
                        <div class="position-relative overflow-hidden" style="height: 240px;">
                            <?php if($wisata->gambar): ?>
                                <img src="<?php echo e(asset('storage/' . $wisata->gambar)); ?>" class="w-100 h-100 img-zoom-effect" style="object-fit: cover;" alt="<?php echo e($wisata->nama); ?>">
                            <?php else: ?>
                                <div class="w-100 h-100 bg-light d-flex flex-column align-items-center justify-content-center text-muted border-bottom">
                                    <i class="fas fa-image fa-3x mb-2 opacity-50"></i>
                                    <span class="small italic">Foto belum tersedia</span>
                                </div>
                            <?php endif; ?>
                            <div class="position-absolute top-0 end-0 m-3 bg-white text-dark px-3 py-1 rounded-3 shadow fw-bold" style="font-size: 0.9rem; border: 1px solid #e2e8f0;">
                                <i class="fas fa-star text-warning me-1"></i> <?php echo e(number_format($wisata->rating, 1)); ?>

                            </div>
                        </div>

                        <div class="card-body d-flex flex-column p-4">
                            <h4 class="card-title fw-bold mb-2 text-dark" style="font-size: 1.35rem; line-height: 1.3;"><?php echo e($wisata->nama); ?></h4>
                            <?php if($wisata->category): ?>
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle mb-3 align-self-start text-capitalize px-3 py-2 rounded-2" style="font-size: 0.8rem; font-weight: 600;">
                                    <i class="fas fa-tags me-1 small"></i> <?php echo e($wisata->category->nama); ?>

                                </span>
                            <?php endif; ?>

                            <p class="card-text text-secondary mb-4" style="font-size: 0.98rem; line-height: 1.7; text-align: justify;">
                                <?php echo e(Str::limit($wisata->deskripsi, 115)); ?>

                            </p>
                            
                            <div class="mt-auto pt-3 border-top border-light-subtle">
                                <p class="text-muted mb-2 text-truncate fw-medium" style="font-size: 0.9rem;">
                                    <i class="fas fa-map-marker-alt text-danger me-1"></i> <?php echo e($wisata->lokasi); ?>

                                </p>
                                <div class="d-flex justify-content-between align-items-center" style="font-size: 0.92rem;">
                                    <span class="text-secondary fw-medium">
                                        <i class="fas fa-clock text-primary me-1"></i> <?php echo e($wisata->jam_buka); ?> - <?php echo e($wisata->jam_tutup); ?>

                                    </span>
                                    <span class="text-danger fw-bold fs-5">
                                        <?php if(is_numeric($wisata->tiket_masuk)): ?>
                                            Rp <?php echo e(number_format($wisata->tiket_masuk, 0, ',', '.')); ?>

                                        <?php else: ?>
                                            <?php echo e($wisata->tiket_masuk); ?>

                                        <?php endif; ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-white border-top-0 p-4 pt-0">
                            <a href="<?php echo e(route('wisata.show', $wisata)); ?>" class="btn btn-outline-primary btn-md w-100 py-2 fw-bold rounded-3" style="font-size: 0.95rem;">
                                <i class="fas fa-arrow-right-to-bracket me-1"></i> Buka Detail Wisata
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-12 py-5">
                    <div class="alert alert-light text-center py-5 border rounded-4 shadow-sm" role="alert" style="background: #ffffff;">
                        <i class="fas fa-folder-open fa-3x text-muted mb-3 opacity-50"></i> 
                        <h4 class="fw-bold text-dark mb-1">Destinasi Tidak Ditemukan</h4>
                        <p class="text-muted mb-0">Silakan coba cari dengan kata kunci lain.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="d-flex justify-content-center mt-5">
            <?php echo $wisatas->appends(request()->query())->links('pagination::bootstrap-5'); ?>

        </div>
    </div>

    <style>
        .card-hover-animation { transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .card-hover-animation:hover { transform: translateY(-8px); box-shadow: 0 20px 40px rgba(15, 42, 74, 0.12) !important; }
        .img-zoom-effect { transition: transform 0.5s ease; }
        .card-hover-animation:hover .img-zoom-effect { transform: scale(1.04); }
        .suggestion-item { cursor: pointer; transition: background 0.2s ease; border: none; font-size: 0.95rem; color: #333; }
        .suggestion-item:hover { background-color: #f0f6ff !important; color: #0d6efd; font-weight: 600; }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const suggestionBox = document.getElementById('suggestionBox');
        const searchForm = document.getElementById('searchForm');

        searchInput.addEventListener('input', function() {
            const keyword = this.value.trim();
            if (keyword.length < 1) {
                suggestionBox.classList.add('d-none');
                suggestionBox.innerHTML = '';
                return;
            }

            fetch(`<?php echo e(route('wisata.suggestions')); ?>?search=${encodeURIComponent(keyword)}`)
                .then(response => response.json())
                .then(data => {
                    suggestionBox.innerHTML = '';
                    if (data.length > 0) {
                        suggestionBox.classList.remove('d-none');
                        data.forEach(item => {
                            const button = document.createElement('button');
                            button.type = 'button';
                            button.className = 'list-group-item list-group-item-action suggestion-item py-2 px-3';
                            button.innerHTML = `<i class="fas fa-map-pin text-muted me-2 small"></i>${item.nama}`;
                            button.addEventListener('click', function() {
                                searchInput.value = item.nama;
                                suggestionBox.classList.add('d-none');
                                searchForm.submit();
                            });
                            suggestionBox.appendChild(button);
                        });
                    } else {
                        suggestionBox.classList.add('d-none');
                    }
                })
                .catch(error => console.error('Error fetching suggestions:', error));
        });

        document.addEventListener('click', function(e) {
            if (e.target !== searchInput && !suggestionBox.contains(e.target)) {
                suggestionBox.classList.add('d-none');
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\AndikaSaputra-XRPL1-SASGENAP\resources\views/public/wisata/index.blade.php ENDPATH**/ ?>