 

<?php $__env->startSection('content'); ?>




<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
:root {
    --brand:       #1a7a5e;
    --brand-dark:  #115944;
    --brand-light: #e8f5f1;
    --accent:      #f5a623;
    --danger:      #e63c3c;
    --text-main:   #1c1c1e;
    --text-muted:  #6b7280;
    --border:      rgba(0,0,0,.08);
    --card-bg:     #ffffff;
    --page-bg:     #f6f8f7;
    --radius-sm:   10px;
    --radius-md:   16px;
    --radius-lg:   24px;
    --shadow-sm:   0 1px 4px rgba(0,0,0,.06);
    --shadow-md:   0 4px 20px rgba(0,0,0,.09);
    --shadow-lg:   0 8px 40px rgba(0,0,0,.12);
    --transition:  .25s ease;
}

/* ---- PAGE ---- */
body { background: var(--page-bg); }
.detail-wrap { max-width: 1180px; margin: 0 auto; padding: 2.5rem 1.25rem 4rem; }

/* ---- HERO IMAGE ---- */
.hero-frame {
    position: relative;
    border-radius: var(--radius-lg);
    overflow: hidden;
    height: 480px;
    box-shadow: var(--shadow-lg);
    margin-bottom: 2rem;
}
.hero-frame img {
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
    transition: transform .6s ease;
}
.hero-frame:hover img { transform: scale(1.03); }
.hero-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,.55) 0%, transparent 55%);
    display: flex; align-items: flex-end; padding: 2rem;
}
.hero-badge {
    display: inline-flex; align-items: center; gap: 6px;
    background: var(--accent); color: #fff;
    font-family: 'DM Sans', sans-serif; font-weight: 600; font-size: 14px;
    padding: 6px 14px; border-radius: 40px;
    box-shadow: 0 2px 10px rgba(245,166,35,.4);
}

/* ---- CARDS ---- */
.card-block {
    background: var(--card-bg);
    border: 1px solid var(--border);
    border-radius: var(--radius-md);
    padding: 2rem;
    margin-bottom: 1.5rem;
    box-shadow: var(--shadow-sm);
    transition: box-shadow var(--transition);
}
.card-block:hover { box-shadow: var(--shadow-md); }
.section-title {
    font-family: 'Playfair Display', serif;
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--text-main);
    margin: 0 0 1.25rem;
    display: flex; align-items: center; gap: 10px;
}
.section-icon {
    width: 34px; height: 34px; border-radius: 9px;
    display: flex; align-items: center; justify-content: center;
    font-size: 15px; flex-shrink: 0;
}
.si-green  { background: var(--brand-light); color: var(--brand); }
.si-red    { background: #fdeaea; color: var(--danger); }
.si-blue   { background: #e8f0fe; color: #2563eb; }
.si-amber  { background: #fef3e2; color: #b45309; }

/* ---- DESCRIPTION ---- */
.desc-text {
    font-family: 'DM Sans', sans-serif;
    font-size: 15.5px; line-height: 1.85;
    color: #374151; text-align: justify;
}

/* ---- VIDEO ---- */
.video-wrap {
    border-radius: var(--radius-sm);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
}

/* ---- MAP ---- */
.map-wrap {
    border-radius: var(--radius-sm);
    overflow: hidden;
    border: 1px solid var(--border);
    height: 300px;
}
.map-wrap iframe { width: 100%; height: 100%; border: 0; display: block; }
.map-empty {
    height: 300px; display: flex; align-items: center; justify-content: center;
    background: var(--page-bg); border-radius: var(--radius-sm);
    border: 1.5px dashed var(--border);
    flex-direction: column; gap: 8px;
    color: var(--text-muted); font-size: 14px;
}

/* ---- GALLERY ---- */
.gallery-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 12px; }
.gallery-item {
    border-radius: var(--radius-sm);
    overflow: hidden;
    height: 150px;
    box-shadow: var(--shadow-sm);
    position: relative;
}
.gallery-item img {
    width: 100%; height: 100%; object-fit: cover;
    transition: transform .4s ease;
    display: block;
}
.gallery-item:hover img { transform: scale(1.07); }
@media (max-width: 600px) { .gallery-grid { grid-template-columns: repeat(2,1fr); } }

/* ---- COMMENT FORM ---- */
.comment-form-card {
    border-left: 4px solid var(--brand);
    border-radius: var(--radius-md);
}
.comment-form-card.replying { border-left-color: #2563eb; }

.form-label-custom {
    font-family: 'DM Sans', sans-serif;
    font-size: 13px; font-weight: 600;
    color: var(--text-main); margin-bottom: 6px; display: block;
}
.form-control-custom {
    width: 100%; border: 1px solid var(--border);
    border-radius: var(--radius-sm);
    padding: 10px 14px; font-size: 14px;
    font-family: 'DM Sans', sans-serif;
    background: var(--page-bg); color: var(--text-main);
    outline: none; transition: border-color var(--transition), box-shadow var(--transition);
    box-sizing: border-box;
}
.form-control-custom:focus {
    border-color: var(--brand);
    box-shadow: 0 0 0 3px rgba(26,122,94,.12);
}
textarea.form-control-custom { resize: vertical; min-height: 110px; }

/* Star rating */
.star-row { display: flex; gap: 8px; }
.star-btn {
    width: 44px; height: 44px; border-radius: 12px; border: 1.5px solid #e5e7eb;
    background: #fff; cursor: pointer; font-size: 18px; color: #d1d5db;
    display: flex; align-items: center; justify-content: center;
    transition: background var(--transition), color var(--transition), border-color var(--transition), transform .15s;
}
.star-btn.active, .star-btn:hover { background: #fef9ee; color: var(--accent); border-color: var(--accent); }
.star-btn:active { transform: scale(.9); }

/* Char counter */
.char-counter { font-size: 12px; color: var(--text-muted); margin-top: 4px; display: block; }
.char-counter.warning { color: #b45309; }

/* Buttons */
.btn-brand {
    background: var(--brand); color: #fff; border: none;
    border-radius: var(--radius-sm); padding: 11px 24px;
    font-family: 'DM Sans', sans-serif; font-weight: 600; font-size: 14px;
    cursor: pointer; transition: background var(--transition), transform .15s;
    display: inline-flex; align-items: center; gap: 7px;
}
.btn-brand:hover { background: var(--brand-dark); }
.btn-brand:active { transform: scale(.97); }
.btn-brand-danger {
    background: var(--danger); color: #fff; border: none;
    border-radius: var(--radius-sm); padding: 11px 24px;
    font-family: 'DM Sans', sans-serif; font-weight: 600; font-size: 14px;
    cursor: pointer; transition: background var(--transition), transform .15s;
    display: inline-flex; align-items: center; gap: 7px;
}
.btn-brand-danger:hover { background: #b91c1c; }
.btn-brand-danger:active { transform: scale(.97); }

.btn-outline-muted {
    background: transparent; color: var(--text-muted);
    border: 1px solid var(--border); border-radius: var(--radius-sm);
    padding: 11px 20px; font-family: 'DM Sans', sans-serif;
    font-size: 14px; font-weight: 500; cursor: pointer;
    transition: background var(--transition);
}
.btn-outline-muted:hover { background: var(--page-bg); }
.btn-cancel-reply {
    font-size: 12px; color: var(--danger); background: #fdeaea;
    border: none; border-radius: 20px; padding: 5px 14px;
    cursor: pointer; font-weight: 600; transition: background var(--transition);
}
.btn-cancel-reply:hover { background: #fbd5d5; }

/* Alert */
.alert-custom {
    border-radius: var(--radius-sm); padding: 12px 16px;
    font-size: 13.5px; font-family: 'DM Sans', sans-serif; margin-bottom: 1rem;
}
.alert-success-custom { background: var(--brand-light); color: var(--brand-dark); border: 1px solid #b7ddd3; }
.alert-danger-custom  { background: #fdeaea; color: #8b1a1a; border: 1px solid #f5c2c2; }
.alert-info-custom    { background: #e8f0fe; color: #1d4ed8; border: 1px solid #bfcffe; }

/* ---- COMMENTS LIST ---- */
.comment-thread {
    border: 1px solid var(--border);
    border-radius: var(--radius-md);
    overflow: hidden;
    background: var(--card-bg);
    margin-bottom: 14px;
    transition: box-shadow var(--transition);
}
.comment-thread:hover { box-shadow: var(--shadow-sm); }
.comment-main { padding: 16px 18px 12px; }
.comment-head { display: flex; align-items: center; gap: 12px; margin-bottom: 10px; }
.ct-avatar {
    width: 40px; height: 40px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 13px; font-weight: 700; flex-shrink: 0;
    font-family: 'DM Sans', sans-serif;
}
.ct-avatar-sm { width: 30px; height: 30px; font-size: 11px; font-weight: 700; }
.ct-meta { flex: 1; }
.ct-name  { font-weight: 600; font-size: 14px; color: var(--text-main); font-family: 'DM Sans', sans-serif; }
.ct-time  { font-size: 11.5px; color: var(--text-muted); margin-top: 2px; font-family: 'DM Sans', sans-serif; }
.ct-stars { color: var(--accent); font-size: 12px; display: flex; gap: 2px; }
.ct-body  { font-size: 14px; line-height: 1.7; color: #374151; margin: 0 0 10px 52px; font-family: 'DM Sans', sans-serif; }
.btn-reply-inline {
    background: none; border: none; cursor: pointer;
    font-size: 12.5px; color: var(--text-muted); font-weight: 500;
    padding: 4px 12px; border-radius: 20px; margin-left: 52px;
    transition: background var(--transition), color var(--transition);
    font-family: 'DM Sans', sans-serif;
}
.btn-reply-inline:hover { background: var(--page-bg); color: var(--brand); }

/* Replies */
.replies-wrap { background: #fafbfa; border-top: 1px solid var(--border); padding: 10px 18px 6px 18px; }
.reply-item {
    display: flex; gap: 10px; align-items: flex-start;
    padding: 10px 0 8px; border-bottom: 0.5px solid var(--border);
    position: relative;
}
.reply-item:last-child { border-bottom: none; }
.reply-connector {
    position: absolute; left: -10px; top: 0; bottom: 50%;
    width: 14px; border-left: 1.5px solid #d1d5db;
    border-bottom: 1.5px solid #d1d5db; border-bottom-left-radius: 7px;
}
.reply-body { flex: 1; }
.reply-head { display: flex; align-items: center; gap: 7px; flex-wrap: wrap; margin-bottom: 4px; }
.reply-name { font-size: 13px; font-weight: 600; color: var(--text-main); font-family: 'DM Sans', sans-serif; }
.reply-time { font-size: 11px; color: var(--text-muted); margin-left: auto; font-family: 'DM Sans', sans-serif; }
.reply-badge {
    font-size: 10px; font-weight: 600; padding: 2px 8px; border-radius: 4px;
    font-family: 'DM Sans', sans-serif;
}
.badge-admin { background: #fdeaea; color: #8b1a1a; }
.badge-user  { background: #f3f4f6; color: #4b5563; }
.reply-text  { font-size: 13px; line-height: 1.65; color: #374151; margin-bottom: 4px; font-family: 'DM Sans', sans-serif; }
.reply-mention { color: #2563eb; font-weight: 600; }
.btn-reply-sm {
    background: none; border: none; cursor: pointer; font-size: 11.5px;
    color: var(--text-muted); padding: 2px 8px; border-radius: 20px;
    transition: background var(--transition), color var(--transition);
    font-family: 'DM Sans', sans-serif; font-weight: 500;
}
.btn-reply-sm:hover { background: #e5e7eb; color: var(--brand); }

/* ---- SIDEBAR ---- */
.sidebar-card {
    background: var(--card-bg);
    border: 1px solid var(--border);
    border-radius: var(--radius-md);
    padding: 1.75rem;
    box-shadow: var(--shadow-sm);
    margin-bottom: 1.25rem;
}
.wisata-title {
    font-family: 'Playfair Display', serif;
    font-size: 1.5rem; font-weight: 900;
    color: var(--text-main); line-height: 1.25;
    margin: 0 0 .75rem;
}
.rating-pill {
    display: inline-flex; align-items: center; gap: 6px;
    background: #fef3e2; color: #92400e;
    font-family: 'DM Sans', sans-serif; font-weight: 700; font-size: 14px;
    padding: 6px 14px; border-radius: 40px;
    margin-bottom: 1.25rem;
}
.info-row { margin-bottom: 14px; }
.info-label {
    font-size: 12px; color: var(--text-muted);
    font-family: 'DM Sans', sans-serif; font-weight: 500; margin-bottom: 3px;
    display: flex; align-items: center; gap: 5px;
}
.info-value {
    font-size: 14px; font-weight: 600; color: var(--text-main);
    font-family: 'DM Sans', sans-serif; line-height: 1.4;
}
.price-tag {
    font-size: 1.5rem; font-weight: 700; color: var(--danger);
    font-family: 'Playfair Display', serif;
}
.divider { border: none; border-top: 1px solid var(--border); margin: 1.25rem 0; }
.btn-book {
    width: 100%; background: var(--brand); color: #fff; border: none;
    border-radius: var(--radius-sm); padding: 14px;
    font-family: 'DM Sans', sans-serif; font-weight: 700; font-size: 15px;
    cursor: pointer; transition: background var(--transition), transform .15s;
    display: flex; align-items: center; justify-content: center; gap: 8px;
    margin-bottom: 10px;
}
.btn-book:hover { background: var(--brand-dark); }
.btn-book:active { transform: scale(.97); }
.btn-back {
    width: 100%; background: transparent; color: var(--text-muted);
    border: 1px solid var(--border); border-radius: var(--radius-sm);
    padding: 11px; font-family: 'DM Sans', sans-serif; font-weight: 500;
    font-size: 14px; cursor: pointer; text-align: center;
    display: block; text-decoration: none;
    transition: background var(--transition), color var(--transition);
}
.btn-back:hover { background: var(--page-bg); color: var(--text-main); }
.btn-edit-admin {
    width: 100%; background: var(--accent); color: #fff; border: none;
    border-radius: var(--radius-sm); padding: 11px; font-family: 'DM Sans', sans-serif;
    font-weight: 600; font-size: 14px; cursor: pointer; margin-bottom: 10px;
    text-align: center; display: block; text-decoration: none;
    transition: background var(--transition);
}
.btn-edit-admin:hover { background: #d4881a; color: #fff; }

/* Contact card */
.contact-card {
    background: linear-gradient(135deg, var(--brand-dark) 0%, var(--brand) 100%);
    border-radius: var(--radius-md);
    padding: 1.5rem;
    color: #fff; text-align: center;
}
.contact-card h5 {
    font-family: 'Playfair Display', serif;
    font-weight: 700; font-size: 1.1rem; margin: 0 0 6px;
}
.contact-card p {
    font-family: 'DM Sans', sans-serif; font-size: 13px;
    opacity: .8; margin: 0 0 1rem;
}
.btn-contact {
    background: #fff; color: var(--brand-dark); border: none;
    border-radius: var(--radius-sm); padding: 10px 20px;
    font-family: 'DM Sans', sans-serif; font-weight: 700;
    font-size: 14px; cursor: pointer; width: 100%;
    transition: opacity var(--transition);
}
.btn-contact:hover { opacity: .88; }

/* ---- MODAL OVERRIDE ---- */
.modal-content { border-radius: var(--radius-md) !important; border: none; overflow: hidden; }
.modal-header { border-bottom: 1px solid var(--border); padding: 1.25rem 1.5rem; }
.modal-title { font-family: 'Playfair Display', serif; font-size: 1.2rem; font-weight: 700; }
.modal-footer { border-top: 1px solid var(--border); padding: 1rem 1.5rem; }
.modal-body  { padding: 1.25rem 1.5rem; }
.modal .form-control { border-radius: var(--radius-sm); font-size: 14px; }
.btn-confirm-book {
    background: var(--brand); color: #fff; border: none;
    border-radius: var(--radius-sm); padding: 10px 24px;
    font-family: 'DM Sans', sans-serif; font-weight: 700; cursor: pointer;
    transition: background var(--transition);
}
.btn-confirm-book:hover { background: var(--brand-dark); }

/* ---- RESPONSIVE ---- */
@media (max-width: 991px) {
    .hero-frame { height: 320px; }
    .sidebar-sticky { position: static !important; }
}
@media (max-width: 576px) {
    .hero-frame { height: 240px; border-radius: var(--radius-md); }
    .detail-wrap { padding: 1rem .75rem 3rem; }
    .card-block { padding: 1.25rem; }
    .ct-body { margin-left: 0; }
    .btn-reply-inline { margin-left: 0; }
}
</style>


<?php if(session('success_contact')): ?>
    <div class="position-fixed top-0 start-50 translate-middle-x mt-4 p-3" style="z-index: 1055; min-width: 320px;">
        <div class="alert-custom alert-success-custom shadow-lg text-center animate-fade-up d-flex align-items-center justify-content-center gap-2">
            <i class="fas fa-check-circle fa-lg"></i>
            <strong><?php echo e(session('success_contact')); ?></strong>
        </div>
    </div>
<?php endif; ?>

<div class="detail-wrap">
<div class="row g-4">

    
    
    
    <div class="col-lg-8">

        
        <div class="hero-frame">
            <?php if($wisata->gambar): ?>
                <?php if(\Illuminate\Support\Str::startsWith($wisata->gambar, ['http://', 'https://'])): ?>
                    <img src="<?php echo e($wisata->gambar); ?>" alt="<?php echo e($wisata->nama); ?>">
                <?php else: ?>
                    <img src="<?php echo e(asset('storage/' . $wisata->gambar)); ?>" alt="<?php echo e($wisata->nama); ?>">
                <?php endif; ?>
            <?php else: ?>
                <img src="<?php echo e(asset('images/no-image.jpg')); ?>" alt="No Image">
            <?php endif; ?>
            <div class="hero-overlay">
                <span class="hero-badge">
                    <i class="fas fa-map-marker-alt fa-sm"></i>
                    <?php echo e($wisata->lokasi); ?>

                </span>
            </div>
        </div>

        
        <div class="card-block">
            <h4 class="section-title">
                <span class="section-icon si-green"><i class="fas fa-align-left"></i></span>
                Deskripsi Wisata
            </h4>
            <p class="desc-text"><?php echo e($wisata->deskripsi); ?></p>
        </div>

        
        <div class="card-block">
            <h4 class="section-title">
                <span class="section-icon si-red"><i class="fab fa-youtube"></i></span>
                Video Wisata
            </h4>
            <?php
                $videoUrl = $wisata->video_url ?? $wisata->video_youtube ?? null;
                $videoId  = '';
                if ($videoUrl && preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $videoUrl, $match)) {
                    $videoId = $match[1];
                }
            ?>
            <?php if($videoId): ?>
                <div class="video-wrap ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/<?php echo e($videoId); ?>" title="Video Wisata" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            <?php else: ?>
                <p class="mb-0" style="color:var(--text-muted);font-size:14px;font-family:'DM Sans',sans-serif;">
                    <i class="fas fa-video-slash me-1"></i> Video belum tersedia.
                </p>
            <?php endif; ?>
        </div>

        
        <div class="card-block">
            <h4 class="section-title">
                <span class="section-icon si-green"><i class="fas fa-map-marked-alt"></i></span>
                Peta Lokasi
            </h4>
            <?php if($wisata->maps_iframe): ?>
                <?php if(str_contains($wisata->maps_iframe, '<iframe')): ?>
                    <div class="map-wrap"><?php echo $wisata->maps_iframe; ?></div>
                <?php else: ?>
                    <?php
                        $queryPeta = urlencode($wisata->nama . ' ' . $wisata->lokasi);
                        $urlEmbed  = "https://maps.google.com/maps?q={$queryPeta}&t=&z=15&ie=UTF8&iwloc=&output=embed";
                    ?>
                    <div class="map-wrap">
                        <iframe src="<?php echo e($urlEmbed); ?>" allowfullscreen loading="lazy"></iframe>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="map-empty">
                    <i class="fas fa-map fa-2x" style="color:#d1d5db;"></i>
                    <span>Peta lokasi belum disematkan.</span>
                </div>
            <?php endif; ?>
        </div>

        
        <div class="card-block">
            <h4 class="section-title">
                <span class="section-icon si-blue"><i class="fas fa-images"></i></span>
                Galeri Foto
            </h4>
            <div class="gallery-grid">
                <?php $__empty_1 = true; $__currentLoopData = $wisata->galleries ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="gallery-item">
                        <?php if(\Illuminate\Support\Str::startsWith($gallery->foto_path, ['http://', 'https://'])): ?>
                            <div class="reply-connector"></div>
                            <img src="<?php echo e($gallery->foto_path); ?>" alt="Galeri">
                        <?php else: ?>
                            <img src="<?php echo e(asset('storage/' . $gallery->foto_path)); ?>" alt="Galeri">
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-span-3 text-center py-4" style="color:var(--text-muted);font-size:14px;font-family:'DM Sans',sans-serif;">
                        <i class="fas fa-camera fa-lg mb-2 d-block" style="color:#d1d5db;"></i>
                        Belum ada foto galeri.
                    </div>
                <?php endif; ?>
            </div>
        </div>

        
        <div class="card-block comment-form-card" id="form-komentar-container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="section-title mb-0" id="form-title">
                    <span class="section-icon si-green"><i class="fas fa-pen"></i></span>
                    Tulis Komentar
                </h4>
                <button type="button" id="cancel-reply-btn" class="btn-cancel-reply d-none"
                    onclick="resetFormKomentar()">
                    <i class="fas fa-times me-1"></i> Batal Balas
                </button>
            </div>

            <?php if($errors->any()): ?>
                <div class="alert-custom alert-danger-custom">
                    <strong><i class="fas fa-exclamation-circle me-2"></i>Terjadi Kesalahan:</strong>
                    <ul class="mb-0 mt-1 ps-4">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if(session('success') && !str_contains(session('success'), 'Tiket')): ?>
                <div class="alert-custom alert-success-custom">
                    <i class="fas fa-check-circle me-2"></i><?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('wisata.comments.store', $wisata)); ?>" method="POST" id="main-comment-form">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="parent_id" id="parent_id_input" value="">

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <label class="form-label-custom">Nama <span style="color:var(--danger)">*</span></label>
                        <input type="text" class="form-control-custom" name="nama_pengomentar"
                            placeholder="Nama Anda" value="<?php echo e(old('nama_pengomentar')); ?>" required>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label-custom">Email <span style="color:var(--danger)">*</span></label>
                        <input type="email" class="form-control-custom" name="email_pengomentar"
                            placeholder="nama@email.com" value="<?php echo e(old('email_pengomentar')); ?>" required>
                    </div>
                </div>

                <div class="mb-3" id="rating-section-container">
                    <label class="form-label-custom">Rating <span style="color:var(--danger)">*</span></label>
                    <div class="star-row" id="rating-stars">
                        <?php for($i = 1; $i <= 5; $i++): ?>
                            <button type="button" class="star-btn" data-rating="<?php echo e($i); ?>">
                                <i class="fas fa-star"></i>
                            </button>
                        <?php endfor; ?>
                    </div>
                    <input type="hidden" id="rating" name="rating" value="<?php echo e(old('rating', 5)); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label-custom">Komentar <span style="color:var(--danger)">*</span></label>
                    <textarea class="form-control-custom" id="isi_komentar" name="isi_komentar" rows="4"
                        placeholder="Bagikan pengalaman Anda…" required><?php echo e(old('isi_komentar')); ?></textarea>
                    <span class="char-counter"><span id="char-count">0</span>/1000 karakter</span>
                </div>

                <div class="d-flex gap-2 justify-content-end flex-wrap">
                    <button type="reset" class="btn-outline-muted" onclick="resetFormKomentar()">
                        <i class="fas fa-redo me-1"></i> Bersihkan
                    </button>
                    <button type="submit" class="btn-brand" id="submit-btn-text">
                        <i class="fas fa-paper-plane"></i> Kirim Komentar
                    </button>
                </div>
            </form>
        </div>

        
        <div class="card-block">
            <h4 class="section-title">
                <span class="section-icon si-blue"><i class="fas fa-comments"></i></span>
                Komentar Pengunjung
            </h4>

            <?php if($wisata->comments && $wisata->comments->where('is_approved', true)->where('parent_id', null)->count() > 0): ?>
                <?php $__currentLoopData = $wisata->comments->where('is_approved', true)->where('parent_id', null)->sortByDesc('created_at'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $initials    = strtoupper(substr($comment->nama_pengomentar, 0, 2));
                        $palettes    = [
                            ['#E6F1FB','#0C447C'], ['#EAF3DE','#27500A'],
                            ['#FAEEDA','#633806'], ['#EEEDFE','#3C3489'], ['#E1F5EE','#085041']
                        ];
                        $cp      = $palettes[$comment->id % count($palettes)];
                        $replies = \App\Models\Comment::where('parent_id', $comment->id)->where('is_approved', true)->oldest()->get();
                    ?>

                    <div class="comment-thread">
                        <div class="comment-main">
                            <div class="comment-head">
                                <div class="ct-avatar" style="background:<?php echo e($cp[0]); ?>;color:<?php echo e($cp[1]); ?>"><?php echo e($initials); ?></div>
                                <div class="ct-meta">
                                    <div class="ct-name"><?php echo e($comment->nama_pengomentar); ?></div>
                                    <div class="ct-time"><i class="fas fa-calendar-alt fa-xs me-1"></i><?php echo e($comment->created_at->format('d M Y, H:i')); ?></div>
                                </div>
                                <div class="ct-stars ms-auto">
                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                        <i class="fa<?php echo e($i <= $comment->rating ? 's' : 'r'); ?> fa-star"></i>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <p class="ct-body"><?php echo e($comment->isi_komentar); ?></p>
                            <button class="btn-reply-inline" onclick="prepareToReply(<?php echo e($comment->id); ?>, '<?php echo e($comment->nama_pengomentar); ?>')">
                                <i class="fas fa-reply fa-xs me-1"></i> Balas
                            </button>
                        </div>

                        <?php if($replies->count() > 0): ?>
                            <div class="replies-wrap">
                                <?php $__currentLoopData = $replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $isAdmin  = in_array($reply->nama_pengomentar, ['Administrator', 'Admin']);
                                        $rInit    = strtoupper(substr($reply->nama_pengomentar, 0, 2));
                                        $rBg      = $isAdmin ? '#fdeaea' : '#f3f4f6';
                                        $rColor   = $isAdmin ? '#8b1a1a' : '#4b5563';
                                    ?>
                                    <div class="reply-item">
                                        <div class="reply-connector"></div>
                                        <div class="ct-avatar ct-avatar-sm" style="background:<?php echo e($rBg); ?>;color:<?php echo e($rColor); ?>"><?php echo e($rInit); ?></div>
                                        <div class="reply-body">
                                            <div class="reply-head">
                                                <span class="reply-name"><?php echo e($reply->nama_pengomentar); ?></span>
                                                <?php if($isAdmin): ?>
                                                    <span class="reply-badge badge-admin">Admin</span>
                                                <?php else: ?>
                                                    <span class="reply-badge badge-user">Balasan</span>
                                                <?php endif; ?>
                                                <span class="reply-time"><?php echo e($reply->created_at->diffForHumans()); ?></span>
                                            </div>
                                            <p class="reply-text">
                                                <span class="reply-mention">{{ $comment->nama_pengomentar }}</span>
                                                <?php echo e($reply->isi_komentar); ?>

                                            </p>
                                            <button class="btn-reply-sm" onclick="prepareToReply(<?php echo e($comment->id); ?>, '<?php echo e($reply->nama_pengomentar); ?>')">
                                                <i class="fas fa-reply fa-xs me-1"></i> Balas
                                            </button>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="alert-custom alert-info-custom">
                    <i class="fas fa-info-circle me-2"></i>Belum ada komentar. Jadilah yang pertama!
                </div>
            <?php endif; ?>
        </div>

    </div>

    
    
    
    <div class="col-lg-4">
        <div class="sidebar-sticky" style="position: sticky; top: 24px;">

            
            <div class="sidebar-card">
                <h2 class="wisata-title"><?php echo e($wisata->nama); ?></h2>
                <div class="rating-pill">
                    <i class="fas fa-star"></i>
                    <?php echo e(number_format($wisata->rating, 1)); ?> / 5.0
                </div>

                <hr class="divider">

                <div class="info-row">
                    <div class="info-label">
                        <i class="fas fa-map-marker-alt" style="color:var(--danger);"></i> Lokasi
                    </div>
                    <div class="info-value"><?php echo e($wisata->lokasi); ?></div>
                </div>

                <div class="info-row">
                    <div class="info-label">
                        <i class="fas fa-clock" style="color:#2563eb;"></i> Jam Operasional
                    </div>
                    <div class="info-value"><?php echo e($wisata->jam_buka); ?> – <?php echo e($wisata->jam_tutup); ?></div>
                </div>

                <div class="info-row">
                    <div class="info-label">
                        <i class="fas fa-ticket-alt" style="color:var(--brand);"></i> Tiket Masuk
                    </div>
                    <div class="price-tag">
                        <?php if(is_numeric($wisata->ticket_masuk ?? $wisata->tiket_masuk)): ?>
                            Rp <?php echo e(number_format($wisata->ticket_masuk ?? $wisata->tiket_masuk, 0, ',', '.')); ?>

                        <?php else: ?>
                            <?php echo e($wisata->ticket_masuk ?? $wisata->tiket_masuk); ?>

                        <?php endif; ?>
                    </div>
                </div>

                <hr class="divider">

                <button type="button" class="btn-book" data-bs-toggle="modal" data-bs-target="#bookingModal">
                    <i class="fas fa-ticket-alt"></i> Pesan Tiket Sekarang
                </button>

                <?php if(session('success') && str_contains(session('success'), 'Tiket')): ?>
                    <div class="alert-custom alert-success-custom mb-2"><?php echo e(session('success')); ?></div>
                <?php endif; ?>

                <?php if(Auth::check() && in_array(Auth::user()->email, ['dika@admin.com', 'admin@sekolah.sch.id'])): ?>
                    <a href="<?php echo e(route('admin.wisata.edit', $wisata)); ?>" class="btn-edit-admin">
                        <i class="fas fa-edit me-1"></i> Edit Wisata
                    </a>
                <?php endif; ?>

                <a href="javascript:history.back()" class="btn-back">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>

            
            <div class="contact-card">
                <h5>Hubungi Kami</h5>
                <p>Ada kendala web rusak, gambar pecah, atau pertanyaan destinasi?</p>
                <button type="button" class="btn-contact" data-bs-toggle="modal" data-bs-target="#contactModal">
                    <i class="fas fa-envelope me-1"></i> Kirim Laporan
                </button>
            </div>

        </div>
    </div>

</div>
</div>




<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingModalLabel">
                    <i class="fas fa-ticket-alt text-success me-2"></i>Pemesanan Tiket
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('wisata.book', $wisata)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <p style="font-size:13px;color:var(--text-muted);font-family:'DM Sans',sans-serif;margin-bottom:1rem;">
                        Destinasi: <strong style="color:var(--text-main);"><?php echo e($wisata->nama); ?></strong>
                    </p>
                    <div class="mb-3">
                        <label class="form-label-custom">Nama Lengkap</label>
                        <input type="text" name="nama_pemesan" class="form-control-custom" placeholder="Masukkan nama Anda" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label-custom">Alamat Email</label>
                        <input type="email" name="email" class="form-control-custom" placeholder="nama@email.com" required>
                    </div>
                    <div class="row g-3">
                        <div class="col-6">
                            <label class="form-label-custom">Jumlah Tiket</label>
                            <input type="number" name="jumlah_tiket" class="form-control-custom" min="1" value="1" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label-custom">Tanggal Kunjungan</label>
                            <input type="date" name="tanggal_kunjungan" class="form-control-custom" min="<?php echo e(date('Y-m-d')); ?>" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-outline-muted" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn-confirm-book">
                        <i class="fas fa-check me-1"></i> Konfirmasi Booking
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>




<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true" style="color: #333;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactModalLabel">
                    <i class="fas fa-bug text-danger me-2"></i>Hubungi Layanan Pengaduan
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('contact.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <p style="font-size:13px;color:var(--text-muted);font-family:'DM Sans',sans-serif;margin-bottom:1.25rem;">
                        Punya keluhan seperti gambar tidak muncul, bug aplikasi, kendala operasional, atau mau bertanya seputar dashboard admin? Sampaikan langsung ke tim layanan kami.
                    </p>
                    
                    <div class="mb-3">
                        <label class="form-label-custom">Nama Lengkap <span style="color:var(--danger)">*</span></label>
                        <input type="text" name="nama" class="form-control-custom" placeholder="Masukkan nama lengkap Anda" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label-custom">Alamat Email <span style="color:var(--danger)">*</span></label>
                        <input type="email" name="email" class="form-control-custom" placeholder="nama@email.com" required>
                    </div>

                    
                    <div class="mb-3">
                        <label class="form-label-custom">Subjek / Kategori Laporan <span style="color:var(--danger)">*</span></label>
                        <input type="text" name="subjek" class="form-control-custom" placeholder="Contoh: Bug Foto Wisata Pecah / Peta Error" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label-custom">Isi Pesan / Laporan Kendala <span style="color:var(--danger)">*</span></label>
                        <textarea name="pesan" class="form-control-custom" rows="4" placeholder="Tuliskan secara detail pesan atau kendala teknis yang Anda alami (misal: Gambar galeri tidak muncul, foto rusak, dll)..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-outline-muted" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn-brand-danger">
                        <i class="fas fa-paper-plane me-1"></i> Kirim Laporan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>




<script>
function prepareToReply(commentId, username) {
    const parentInput   = document.getElementById('parent_id_input');
    const formTitle     = document.getElementById('form-title');
    const textarea      = document.getElementById('isi_komentar');
    const cancelBtn     = document.getElementById('cancel-reply-btn');
    const ratingSection = document.getElementById('rating-section-container');
    const submitBtn     = document.getElementById('submit-btn-text');
    const formCard      = document.getElementById('form-komentar-container');

    parentInput.value = commentId;
    formTitle.innerHTML = `<span class="section-icon" style="background:#e8f0fe;color:#2563eb;width:34px;height:34px;border-radius:9px;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="fas fa-reply"></i></span> Balas ke <span style="color:#2563eb;">@${username}</span>`;
    textarea.value = `@${username} `;

    cancelBtn.classList.remove('d-none');
    ratingSection.classList.add('d-none');
    submitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Kirim Balasan';
    formCard.classList.add('replying');

    formCard.scrollIntoView({ behavior: 'smooth', block: 'center' });
    setTimeout(() => textarea.focus(), 400);
}

function resetFormKomentar() {
    document.getElementById('parent_id_input').value = '';
    document.getElementById('form-title').innerHTML = `<span class="section-icon si-green"><i class="fas fa-pen"></i></span> Tulis Komentar`;
    document.getElementById('cancel-reply-btn').classList.add('d-none');
    document.getElementById('rating-section-container').classList.remove('d-none');
    document.getElementById('submit-btn-text').innerHTML = '<i class="fas fa-paper-plane"></i> Kirim Komentar';
    document.getElementById('form-komentar-container').classList.remove('replying');
    document.getElementById('isi_komentar').value = '';
    updateRatingStars(5);
    document.getElementById('rating').value = 5;
}

/* ----- Star Rating ----- */
function updateRatingStars(rating) {
    document.querySelectorAll('.star-btn').forEach(btn => {
        if (parseInt(btn.dataset.rating) <= rating) {
            btn.classList.add('active');
        } else {
            btn.classList.remove('active');
        }
    });
}

document.addEventListener('DOMContentLoaded', function () {
    const ratingInput = document.getElementById('rating');
    updateRatingStars(parseInt(ratingInput.value) || 5);

    document.querySelectorAll('.star-btn').forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            const r = parseInt(this.dataset.rating);
            ratingInput.value = r;
            updateRatingStars(r);
        });
        btn.addEventListener('mouseenter', function () {
            const r = parseInt(this.dataset.rating);
            document.querySelectorAll('.star-btn').forEach(b => {
                b.style.opacity = parseInt(b.dataset.rating) <= r ? '1' : '0.4';
            });
        });
    });
    document.getElementById('rating-stars').addEventListener('mouseleave', () => {
        document.querySelectorAll('.star-btn').forEach(b => b.style.opacity = '1');
    });

    /* ----- Char Counter ----- */
    const textarea  = document.getElementById('isi_komentar');
    const counter   = document.getElementById('char-count');
    const counterWrap = counter?.closest('.char-counter');
    if (textarea && counter) {
        counter.textContent = textarea.value.length;
        textarea.addEventListener('input', function () {
            const len = this.value.length;
            counter.textContent = len;
            if (counterWrap) counterWrap.classList.toggle('warning', len > 900);
        });
    }

    // ✔ Auto-hide alert pop-up kontak setelah 4 detik biar rapi
    const contactAlert = document.querySelector('.alert-success-custom')?.closest('.position-fixed');
    if (contactAlert) {
        setTimeout(() => {
            contactAlert.style.transition = 'opacity 0.5s ease';
            contactAlert.style.opacity = '0';
            setTimeout(() => contactAlert.remove(), 500);
        }, 4000);
    }
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\AndikaSaputra-XRPL1-SASGENAP\resources\views/public/wisata/show.blade.php ENDPATH**/ ?>