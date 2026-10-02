

<?php $__env->startSection('title', 'Hubungi Kami - Laporan Kerusakan'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container py-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Beranda</a></li>
                <li class="breadcrumb-item active">Laporkan Kerusakan</li>
            </ol>
        </nav>

        <h1 class="mb-5 text-center fw-bold text-dark"><i class="fas fa-exclamation-triangle text-danger me-2"></i>Hubungi Kami & Laporkan Kerusakan</h1>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg rounded-3">
                    <div class="card-body p-5">
                        
                        <?php if(session('success')): ?>
                            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                <?php echo e(session('success')); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <form action="<?php echo e(route('contact.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>

                            <div class="mb-3">
                                <label for="nama" class="form-label fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" class="form-control <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nama" name="nama" value="<?php echo e(old('nama', auth()->user()?->name ?? '')); ?>" required placeholder="Masukkan nama lengkap Anda">
                                <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">Alamat Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" name="email" value="<?php echo e(old('email', auth()->user()?->email ?? '')); ?>" required placeholder="contoh@email.com">
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3">
                                <label for="subjek" class="form-label fw-bold">Subjek / Kategori Laporan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control <?php $__errorArgs = ['subjek'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="subjek" name="subjek" value="<?php echo e(old('subjek')); ?>" required placeholder="Contoh: Bug Foto Wisata Pecah / Peta Error">
                                <?php $__errorArgs = ['subjek'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-4">
                                <label for="pesan" class="form-label fw-bold">Detail Pesan / Kerusakan <span class="text-danger">*</span></label>
                                <textarea class="form-control <?php $__errorArgs = ['pesan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="pesan" name="pesan" rows="6" required placeholder="Jelaskan secara rinci kendala atau bug sistem yang Anda temukan, Bin..."><?php echo e(old('pesan')); ?></textarea>
                                <small class="text-muted d-block mt-1">Isi pesan minimal berukuran 10 karakter.</small>
                                <?php $__errorArgs = ['pesan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold shadow-sm rounded-3">
                                <i class="fas fa-paper-plane me-2"></i> Kirim Laporan Pengaduan
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-lg mb-3 rounded-3">
                    <div class="card-body">
                        <h5 class="card-title mb-3 fw-bold"><i class="fas fa-phone text-primary me-2"></i>Telepon</h5>
                        <p class="mb-0 text-muted">(021) 1234-5678</p>
                    </div>
                </div>

                <div class="card border-0 shadow-lg mb-3 rounded-3">
                    <div class="card-body">
                        <h5 class="card-title mb-3 fw-bold"><i class="fas fa-envelope text-danger me-2"></i>Email Support</h5>
                        <p class="mb-0 text-muted">admin_wisata@singkawang.go.id</p>
                    </div>
                </div>

                <div class="card border-0 shadow-lg mb-3 rounded-3">
                    <div class="card-body">
                        <h5 class="card-title mb-3 fw-bold"><i class="fas fa-map-marker-alt text-success me-2"></i>Kantor</h5>
                        <p class="mb-0 text-muted">Singkawang, Kalimantan Barat, Indonesia</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\AndikaSaputra-XRPL1-SASGENAP\resources\views/public/contact/index.blade.php ENDPATH**/ ?>