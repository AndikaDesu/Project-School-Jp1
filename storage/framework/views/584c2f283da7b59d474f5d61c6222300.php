<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna Baru - KuyWisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --blue-deep: #0a3d8f;
            --blue-mid: #1460d4;
            --blue-bright: #2e80ff;
            --blue-light: #7ab8ff;
            --gold: #f0b429;
            --cream: #fafcff;
            --text-dark: #0d1b36;
            --text-muted: #6b7fa3;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            min-height: 100vh;
            background: var(--cream);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'DM Sans', sans-serif;
            position: relative;
            overflow-x: hidden;
            overflow-y: auto;
            padding: 30px 15px;
        }

        body::before, body::after {
            content: '';
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.35;
            animation: floatBlob 12s ease-in-out infinite alternate;
            pointer-events: none;
            z-index: 0;
        }
        body::before {
            width: 600px; height: 600px;
            background: radial-gradient(circle, #7ab8ff, #2e80ff);
            top: -150px; left: -150px;
        }
        body::after {
            width: 500px; height: 500px;
            background: radial-gradient(circle, #c9e4ff, #6aadff);
            bottom: -120px; right: -120px;
            animation-delay: -6s;
        }
        @keyframes floatBlob {
            from { transform: translate(0, 0) scale(1); }
            to   { transform: translate(40px, 30px) scale(1.08); }
        }

        .dot-grid {
            position: fixed; inset: 0; z-index: 0; pointer-events: none;
            background-image: radial-gradient(circle, #b8d4f8 1px, transparent 1px);
            background-size: 32px 32px;
            opacity: 0.4;
        }

        .wrapper {
            position: relative; z-index: 1;
            width: 100%; max-width: 1060px;
            padding: 24px;
            margin: auto;
        }

        .register-card {
            background: white;
            border-radius: 32px;
            box-shadow: 0 40px 100px rgba(14, 55, 140, 0.14), 0 4px 20px rgba(14,55,140,0.07);
            display: flex;
            animation: slideUp 0.7s cubic-bezier(0.22,1,0.36,1) both;
            overflow: hidden;
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(40px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ─── LEFT FORM PANEL ─── */
        .panel-left {
            flex: 1;
            padding: 56px 52px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .brand-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #e8f1ff;
            color: var(--blue-mid);
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            padding: 6px 14px;
            border-radius: 100px;
            margin-bottom: 24px;
            width: fit-content;
        }

        .form-heading {
            font-family: 'Playfair Display', serif;
            font-size: 3.4rem;
            font-weight: 900;
            color: var(--text-dark);
            line-height: 1.05;
            margin-bottom: 10px;
            letter-spacing: -0.02em;
        }
        .form-heading span { color: var(--blue-bright); }

        .form-subheading {
            color: var(--text-muted);
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 30px;
            max-width: 360px;
        }

        .field-group { margin-bottom: 18px; }

        .field-label {
            display: block;
            font-size: 0.82rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .field-wrap { position: relative; }

        .field-wrap .field-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
            color: #a0b4cc;
            pointer-events: none;
        }

        .field-input {
            width: 100%;
            padding: 13px 16px 13px 46px;
            border: 1.5px solid #dce6f5;
            border-radius: 12px;
            background: #f6f9ff;
            font-size: 0.95rem;
            color: var(--text-dark);
            font-family: 'DM Sans', sans-serif;
            outline: none;
            transition: all 0.2s;
        }
        .field-input:focus {
            border-color: var(--blue-bright);
            background: white;
            box-shadow: 0 0 0 4px rgba(46,128,255,0.12);
        }
        .field-input::placeholder { color: #aab8d0; font-size: 0.95rem; }

        .row-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .btn-register {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 14px;
            background: linear-gradient(135deg, var(--blue-deep) 0%, var(--blue-bright) 100%);
            color: white;
            font-family: 'DM Sans', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 0.03em;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: transform 0.18s, box-shadow 0.18s;
            box-shadow: 0 12px 30px rgba(46,128,255,0.28);
            margin-top: 10px;
        }
        .btn-register:hover { transform: translateY(-2px); box-shadow: 0 18px 40px rgba(46,128,255,0.36); }
        .btn-register:active { transform: translateY(0); }

        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 24px 0 16px;
        }
        .divider-line { flex: 1; height: 1px; background: #edf2f9; }
        .divider-text { font-size: 12px; color: #8da0c0; }

        .login-row { text-align: center; font-size: 13.5px; color: var(--text-muted); }
        .login-row a { color: var(--blue-mid); font-weight: 600; text-decoration: none; }
        .login-row a:hover { text-decoration: underline; }

        .alert-errors {
            background: #fff5f5;
            border: 1px solid #fecaca;
            border-radius: 12px;
            padding: 14px 18px;
            margin-bottom: 22px;
        }
        .alert-errors ul { margin: 0; padding-left: 16px; font-size: 13.5px; color: #b91c1c; }

        /* ─── RIGHT PANEL: PHOTO SLIDESHOW ─── */
        .right-panel {
            width: 420px;
            flex-shrink: 0;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 40px;
            color: white;
            min-height: 600px;
        }

        .hero-slides {
            position: absolute;
            inset: 0;
            z-index: 0;
        }

        .hero-slide {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transform: scale(1.05);
            transition: opacity 1.4s ease, transform 6s ease;
        }

        .hero-slide.active {
            opacity: 1;
            transform: scale(1);
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(
                to top,
                rgba(5, 15, 40, 0.88) 0%,
                rgba(5, 15, 40, 0.45) 45%,
                rgba(5, 15, 40, 0.12) 100%
            );
            z-index: 1;
        }

        .right-panel > *:not(.hero-slides):not(.hero-overlay) {
            position: relative;
            z-index: 2;
        }

        /* Progress dots */
        .hero-dots {
            position: absolute;
            top: 22px;
            right: 22px;
            display: flex;
            gap: 7px;
            z-index: 3;
        }
        .hero-dot {
            height: 4px;
            width: 20px;
            border-radius: 2px;
            background: rgba(255,255,255,0.35);
            transition: background 0.4s, width 0.4s;
            cursor: pointer;
        }
        .hero-dot.active {
            background: rgba(255,255,255,0.95);
            width: 36px;
        }

        /* Slide counter */
        .slide-counter {
            position: absolute;
            top: 22px;
            left: 22px;
            z-index: 3;
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            font-weight: 600;
            color: rgba(255,255,255,0.7);
            letter-spacing: 0.06em;
        }
        .slide-counter span.current { color: #fff; font-size: 16px; font-weight: 700; }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255,255,255,0.15);
            border: 1px solid rgba(255,255,255,0.25);
            padding: 5px 13px;
            border-radius: 50px;
            width: fit-content;
            margin-bottom: 12px;
            backdrop-filter: blur(10px);
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.04em;
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            line-height: 1.15;
            margin-bottom: 10px;
        }

        .hero-text {
            font-size: 0.875rem;
            line-height: 1.6;
            color: rgba(255,255,255,0.82);
            margin-bottom: 20px;
            max-width: 320px;
        }

        .pill-row { display: flex; gap: 8px; flex-wrap: wrap; }
        .pill-badge {
            background: rgba(255,255,255,0.13);
            border: 1px solid rgba(255,255,255,0.22);
            border-radius: 100px;
            padding: 5px 14px;
            font-size: 0.78rem;
            font-weight: 500;
            letter-spacing: 0.04em;
            backdrop-filter: blur(6px);
        }

        /* Nav arrows */
        .nav-arrows {
            position: absolute;
            bottom: 44px;
            right: 22px;
            z-index: 3;
            display: flex;
            gap: 8px;
        }
        .nav-btn {
            width: 36px; height: 36px;
            border-radius: 50%;
            background: rgba(255,255,255,0.14);
            border: 1px solid rgba(255,255,255,0.28);
            color: white;
            display: flex; align-items: center; justify-content: center;
            cursor: pointer;
            transition: background 0.2s, transform 0.15s;
            backdrop-filter: blur(8px);
        }
        .nav-btn:hover { background: rgba(255,255,255,0.28); transform: scale(1.08); }
        .nav-btn svg { width: 16px; height: 16px; }

        /* ─── RESPONSIVE ─── */
        @media (max-width: 991px) {
            .register-card { flex-direction: column; border-radius: 24px; }
            .right-panel {
                width: 100% !important;
                min-height: 320px;
                order: 1 !important;
                border-radius: 24px 24px 0 0;
                padding: 28px 24px;
            }
            .hero-title { font-size: 1.65rem; }
            .panel-left { padding: 40px 24px !important; order: 2 !important; }
            .form-heading { font-size: 2.5rem !important; text-align: center; }
            .form-subheading { text-align: center; margin-left: auto; margin-right: auto; }
            .row-2 { grid-template-columns: 1fr; gap: 0; }
            body { padding: 20px 10px; }
        }
        @media (max-width: 480px) {
            .panel-left { padding: 30px 20px !important; }
            .form-heading { font-size: 2.1rem !important; }
            .hero-title { font-size: 1.4rem; }
        }
    </style>
</head>
<body>
    <div class="dot-grid"></div>
    <div class="wrapper">
        <div class="register-card">

            
            <div class="panel-left">
                <div class="brand-tag mx-auto mx-lg-0">
                    <i class="ti ti-compass" style="font-size:13px; color:var(--blue-mid);" aria-hidden="true"></i>
                    KuyWisata Portal
                </div>

                <h1 class="form-heading">Buat Akun<br class="d-none d-lg-block"><span> Baru</span></h1>
                <p class="form-subheading">Daftarkan diri kamu untuk mulai menjelajahi pesona wisata Singkawang.</p>

                <?php if($errors->any()): ?>
                    <div class="alert-errors">
                        <ul class="mb-0">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?php echo e(route('register.post')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="field-group">
                        <label class="field-label" for="name">Nama Lengkap</label>
                        <div class="field-wrap">
                            <i class="ti ti-user field-icon" aria-hidden="true"></i>
                            <input type="text" id="name" name="name" class="field-input"
                                value="<?php echo e(old('name')); ?>" placeholder="Masukkan nama lengkap..."
                                required autofocus>
                        </div>
                    </div>

                    <div class="field-group">
                        <label class="field-label" for="email">Alamat Email</label>
                        <div class="field-wrap">
                            <i class="ti ti-mail field-icon" aria-hidden="true"></i>
                            <input type="email" id="email" name="email" class="field-input"
                                value="<?php echo e(old('email')); ?>" placeholder="nama@email.com" required>
                        </div>
                    </div>

                    <div class="row-2">
                        <div class="field-group">
                            <label class="field-label" for="password">Password</label>
                            <div class="field-wrap">
                                <i class="ti ti-lock field-icon" aria-hidden="true"></i>
                                <input type="password" id="password" name="password" class="field-input"
                                    placeholder="Min. 8 karakter..." required>
                            </div>
                        </div>
                        <div class="field-group">
                            <label class="field-label" for="password_confirmation">Konfirmasi</label>
                            <div class="field-wrap">
                                <i class="ti ti-lock-check field-icon" aria-hidden="true"></i>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="field-input" placeholder="Ulangi password..." required>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn-register">
                        Daftar Akun Pengguna
                        <i class="ti ti-arrow-right" aria-hidden="true"></i>
                    </button>
                </form>

                <div class="divider">
                    <div class="divider-line"></div>
                    <span class="divider-text">atau</span>
                    <div class="divider-line"></div>
                </div>

                <div class="login-row">
                    Sudah punya akun?
                    <a href="<?php echo e(route('login')); ?>">Masuk di sini</a>
                </div>
            </div>

            
            <div class="right-panel" id="heroPanel">

                <div class="hero-slides">
                    
                    <div class="hero-slide active"
                         style="background-image: url('https://images.unsplash.com/photo-1506929562872-bb421503ef21?auto=format&fit=crop&w=1200&q=80');">
                    </div>
                    
                    <div class="hero-slide"
                         style="background-image: url('https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=1200&q=80');">
                    </div>
                    
                    <div class="hero-slide"
                         style="background-image: url('https://images.unsplash.com/photo-1501854140801-50d01698950b?auto=format&fit=crop&w=1200&q=80');">
                    </div>
                </div>

                <div class="hero-overlay"></div>

                <div class="slide-counter" id="slideCounter">
                    <span class="current" id="counterCurrent">1</span>
                    <span style="opacity:0.4;">/</span>
                    <span>3</span>
                </div>

                <div class="hero-dots" id="heroDots">
                    <div class="hero-dot active" onclick="goToSlide(0)"></div>
                    <div class="hero-dot" onclick="goToSlide(1)"></div>
                    <div class="hero-dot" onclick="goToSlide(2)"></div>
                </div>

                <div class="hero-badge">
                    <i class="ti ti-map-pin" style="font-size:13px;"></i>
                    <span id="badgeText">Pantai Singkawang</span>
                </div>

                <h2 class="hero-title" id="heroTitle">Pesona Pantai<br>Kalimantan Barat</h2>

                <p class="hero-text" id="heroText">
                    Rasakan keindahan garis pantai Singkawang yang membentang luas dengan pasir lembut dan ombak tenang.
                </p>

                <div class="pill-row" id="heroPills">
                    <span class="pill-badge">🌊 Pantai</span>
                    <span class="pill-badge">🌅 Sunset</span>
                    <span class="pill-badge">🐚 Wisata Bahari</span>
                </div>

                <div class="nav-arrows">
                    <div class="nav-btn" onclick="prevSlide()">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <polyline points="15 18 9 12 15 6"/>
                        </svg>
                    </div>
                    <div class="nav-btn" onclick="nextSlide()">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <polyline points="9 18 15 12 9 6"/>
                        </svg>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const slideData = [
            {
                badge: 'Pantai Singkawang',
                title: 'Pesona Pantai<br>Kalimantan Barat',
                text:  'Rasakan keindahan garis pantai Singkawang yang membentang luas dengan pasir lembut dan ombak tenang.',
                pills: ['🌊 Pantai', '🌅 Sunset', '🐚 Wisata Bahari']
            },
            {
                badge: 'Pegunungan Borneo',
                title: 'Keagungan Gunung<br>di Kalimantan',
                text:  'Jelajahi puncak-puncak megah Borneo yang menjulang di antara awan, menawarkan trekking dan panorama tiada tanding.',
                pills: ['🏔 Gunung', '🥾 Trekking', '🌿 Alam Liar']
            },
            {
                badge: 'Sungai Borneo',
                title: 'Tenangnya Sungai<br>Tropis Singkawang',
                text:  'Susuri sungai jernih yang dikelilingi hutan hujan tropis lebat — surga tersembunyi bagi pecinta alam sejati.',
                pills: ['🌊 Sungai', '🌳 Hutan Hujan', '🦜 Satwa Liar']
            }
        ];

        let current  = 0;
        let autoTimer = null;
        const INTERVAL = 5500;

        const slides     = document.querySelectorAll('.hero-slide');
        const dots       = document.querySelectorAll('.hero-dot');
        const badgeEl    = document.getElementById('badgeText');
        const titleEl    = document.getElementById('heroTitle');
        const textEl     = document.getElementById('heroText');
        const pillsEl    = document.getElementById('heroPills');
        const counterEl  = document.getElementById('counterCurrent');

        function goToSlide(index) {
            if (index === current) return;
            slides[current].classList.remove('active');
            dots[current].classList.remove('active');
            current = index;
            slides[current].classList.add('active');
            dots[current].classList.add('active');
            counterEl.textContent = current + 1;
            updateContent();
            resetTimer();
        }

        function nextSlide() { goToSlide((current + 1) % slides.length); }
        function prevSlide() { goToSlide((current - 1 + slides.length) % slides.length); }

        function updateContent() {
            const d = slideData[current];
            [badgeEl.parentElement, titleEl, textEl, pillsEl].forEach(el => {
                el.style.transition = 'opacity 0.25s, transform 0.25s';
                el.style.opacity    = '0';
                el.style.transform  = 'translateY(10px)';
            });
            setTimeout(() => {
                badgeEl.textContent = d.badge;
                titleEl.innerHTML   = d.title;
                textEl.textContent  = d.text;
                pillsEl.innerHTML   = d.pills.map(p => `<span class="pill-badge">${p}</span>`).join('');
                [badgeEl.parentElement, titleEl, textEl, pillsEl].forEach(el => {
                    el.style.transition = 'opacity 0.45s ease, transform 0.45s ease';
                    el.style.opacity    = '1';
                    el.style.transform  = 'translateY(0)';
                });
            }, 260);
        }

        function resetTimer() {
            clearInterval(autoTimer);
            autoTimer = setInterval(nextSlide, INTERVAL);
        }

        // Swipe support
        let touchStartX = 0;
        const panel = document.getElementById('heroPanel');
        panel.addEventListener('touchstart', e => { touchStartX = e.changedTouches[0].screenX; }, { passive: true });
        panel.addEventListener('touchend',   e => {
            const diff = touchStartX - e.changedTouches[0].screenX;
            if (Math.abs(diff) > 40) diff > 0 ? nextSlide() : prevSlide();
        }, { passive: true });

        // Boot — langsung jalan terus tanpa henti
        autoTimer = setInterval(nextSlide, INTERVAL);
    </script>
</body>
</html><?php /**PATH C:\laragon\www\AndikaSaputra-XRPL1-SASGENAP\resources\views/auth/register.blade.php ENDPATH**/ ?>