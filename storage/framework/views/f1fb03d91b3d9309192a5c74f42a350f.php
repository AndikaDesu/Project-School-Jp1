<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Admin Wisata Singkawang'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #e74c3c;
        }

        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            background: linear-gradient(135deg, var(--primary-color), #34495e);
            min-height: 100vh;
            position: fixed;
            width: 250px;
            left: 0;
            top: 0;
            color: white;
            padding-top: 20px;
            z-index: 1000;
        }

        .sidebar h5 {
            color: white;
            padding: 0 20px;
            margin-bottom: 30px;
            border-bottom: 2px solid var(--secondary-color);
            padding-bottom: 15px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            margin: 0;
        }

        .sidebar-menu a {
            display: block;
            color: rgba(255, 255, 255, 0.8);
            padding: 12px 20px;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background-color: rgba(255, 255, 255, 0.1);
            border-left-color: var(--secondary-color);
            color: white;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .topbar {
            background: white;
            padding: 15px 20px;
            border-bottom: 2px solid #e9ecef;
            margin-bottom: 20px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), #34495e);
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #34495e, var(--primary-color));
        }

        .card {
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .table {
            background: white;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
            }

            .main-content {
                margin-left: 0;
            }

            .sidebar-menu a {
                padding: 10px 15px;
                font-size: 0.9rem;
            }

            .topbar {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body>
    
    <?php
        // 🚀 AMANKAN VARIABEL GLOBAL: Deklarasikan di paling atas agar terbaca baik oleh sisi PC maupun HP!
        $badgeCount = DB::table('comments')->where('is_approved', false)->count();
        $reportCount = DB::table('contacts')->count();
    ?>

    <div class="d-flex flex-column flex-lg-row">
        
        <nav class="sidebar d-none d-lg-block">
            <h5><i class="fas fa-user-shield"></i> Admin Panel</h5>
            <ul class="sidebar-menu">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>" class="<?php if(request()->routeIs('admin.dashboard')): ?> active <?php endif; ?>"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="<?php echo e(route('admin.wisata.index')); ?>" class="<?php if(request()->routeIs('admin.wisata.index')): ?> active <?php endif; ?>"><i class="fas fa-list"></i> Kelola Wisata</a></li>
                <li><a href="<?php echo e(route('admin.wisata.create')); ?>" class="<?php if(request()->routeIs('admin.wisata.create')): ?> active <?php endif; ?>"><i class="fas fa-plus"></i> Tambah Wisata</a></li>
                
                
                <li>
                    <a href="<?php echo e(route('admin.komentar.index')); ?>" class="d-flex justify-content-between align-items-center <?php if(request()->routeIs('admin.komentar.index')): ?> active <?php endif; ?>">
                        <span><i class="fas fa-comments me-1"></i> Moderasi Komentar</span>
                        <?php if($badgeCount > 0): ?>
                            <span class="badge bg-danger rounded-pill px-2 py-1" style="font-size: 0.75rem;"><?php echo e($badgeCount); ?></span>
                        <?php endif; ?>
                    </a>
                </li>

                
                <li>
                    <a href="<?php echo e(route('admin.laporan.index')); ?>" class="d-flex justify-content-between align-items-center <?php if(request()->routeIs('admin.laporan.index')): ?> active <?php endif; ?>">
                        <span><i class="fas fa-exclamation-triangle text-danger me-1"></i> Laporan Kerusakan</span>
                        <?php if($reportCount > 0): ?>
                            <span class="badge bg-secondary rounded-pill px-2 py-1" style="font-size: 0.75rem;"><?php echo e($reportCount); ?></span>
                        <?php endif; ?>
                    </a>
                </li>
                
                <li><hr style="background-color: rgba(255, 255, 255, 0.2); margin: 10px 0;"></li>
                <li>
                    <form method="POST" action="<?php echo e(route('logout')); ?>" class="d-inline w-100">
                        <?php echo csrf_field(); ?>
                        <button type="submit" style="background: none; border: none; width: 100%; text-align: left; color: rgba(255, 255, 255, 0.8);" class="nav-link p-3 ps-4">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </nav>

        <div class="main-content flex-grow-1">
            
            <div class="d-lg-none mb-3">
                <div class="topbar flex-column align-items-stretch">
                    <div class="d-flex justify-content-between align-items-center w-100 mb-2">
                        <h4 class="m-0 fw-bold">Admin Panel</h4>
                        <form method="POST" action="<?php echo e(route('logout')); ?>" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-sign-out-alt"></i></button>
                        </form>
                    </div>
                    
                    
                    <div class="d-flex flex-wrap gap-1 border-top pt-2" style="font-size: 0.85rem;">
                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-sm btn-light border <?php if(request()->routeIs('admin.dashboard')): ?> active bg-dark text-white <?php endif; ?>">Dashboard</a>
                        <a href="<?php echo e(route('admin.wisata.index')); ?>" class="btn btn-sm btn-light border <?php if(request()->routeIs('admin.wisata.index')): ?> active bg-dark text-white <?php endif; ?>">Wisata</a>
                        
                        <a href="<?php echo e(route('admin.komentar.index')); ?>" class="btn btn-sm btn-light border position-relative <?php if(request()->routeIs('admin.komentar.index')): ?> active bg-dark text-white <?php endif; ?>">
                            Komentar
                            <?php if($badgeCount > 0): ?>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size:0.6rem; padding: 0.25em 0.4em;"><?php echo e($badgeCount); ?></span>
                            <?php endif; ?>
                        </a>
                        
                        <a href="<?php echo e(route('admin.laporan.index')); ?>" class="btn btn-sm btn-light border position-relative <?php if(request()->routeIs('admin.laporan.index')): ?> active bg-dark text-white <?php endif; ?>">
                            Laporan Bug
                            <?php if($reportCount > 0): ?>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary" style="font-size:0.6rem; padding: 0.25em 0.4em;"><?php echo e($reportCount); ?></span>
                            <?php endif; ?>
                        </a>
                    </div>
                </div>
            </div>

            
            <?php if(session('success_admin')): ?>
                <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm" role="alert">
                    <i class="fas fa-check-circle me-2"></i><?php echo e(session('success_admin')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm" role="alert">
                    <i class="fas fa-check-circle me-2"></i><?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            
            <?php if($errors->any()): ?>
                <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm" role="alert">
                    <strong><i class="fas fa-exclamation-triangle me-2"></i>Error:</strong>
                    <ul class="mb-0 mt-1">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html><?php /**PATH C:\laragon\www\AndikaSaputra-XRPL1-SASGENAP\resources\views/layouts/admin.blade.php ENDPATH**/ ?>