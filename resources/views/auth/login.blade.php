<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - KuyWisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
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

        .card-outer {
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

        /* ─── LEFT PANEL ─── */
        .left-panel {
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
        .brand-tag svg { width: 14px; height: 14px; }

        .left-panel h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3.4rem;
            font-weight: 900;
            color: var(--text-dark);
            line-height: 1.05;
            margin-bottom: 10px;
            letter-spacing: -0.02em;
        }
        .left-panel h1 span { color: var(--blue-bright); }

        .left-panel .subtitle {
            color: var(--text-muted);
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 36px;
            max-width: 360px;
        }

        .form-label {
            font-size: 0.82rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .form-control {
            border: 1.5px solid #dce6f5;
            border-radius: 12px;
            padding: 13px 16px;
            font-size: 0.95rem;
            color: var(--text-dark);
            background: #f6f9ff;
            transition: all 0.2s;
        }
        .form-control:focus {
            background: white;
            border-color: var(--blue-bright);
            box-shadow: 0 0 0 4px rgba(46,128,255,0.12);
            outline: none;
        }
        .form-control.is-invalid { border-color: #e04040; }

        .input-wrap { position: relative; margin-bottom: 20px; }
        .input-icon {
            position: absolute; right: 14px; top: 50%; transform: translateY(-50%);
            color: #a0b4cc; pointer-events: none;
        }

        .options-row {
            display: flex; align-items: center; justify-content: space-between;
            margin-bottom: 24px;
        }
        .form-check-label { font-size: 0.88rem; color: var(--text-muted); }
        .form-check-input:checked { background-color: var(--blue-bright); border-color: var(--blue-bright); }

        .forgot-link {
            font-size: 0.88rem; font-weight: 500;
            color: var(--blue-mid); text-decoration: none;
        }
        .forgot-link:hover { text-decoration: underline; }

        .btn-login {
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
            position: relative;
            overflow: hidden;
            transition: transform 0.18s, box-shadow 0.18s;
            box-shadow: 0 12px 30px rgba(46,128,255,0.28);
            margin-bottom: 20px;
        }
        .btn-login::after {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(135deg, transparent 40%, rgba(255,255,255,0.15) 100%);
        }
        .btn-login:hover { transform: translateY(-2px); box-shadow: 0 18px 40px rgba(46,128,255,0.36); }
        .btn-login:active { transform: translateY(0); }

        .register-box {
            text-align: center;
            border-top: 1px solid #edf2f9;
            padding-top: 20px;
        }
        .register-link {
            display: inline-block;
            width: 100%;
            padding: 13px;
            border: 1.5px solid var(--blue-bright);
            border-radius: 14px;
            background: transparent;
            color: var(--blue-bright);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
        }
        .register-link:hover { background: #f0f6ff; transform: translateY(-1px); }

        .alert { border-radius: 12px; font-size: 0.9rem; }

        /* ─── RIGHT PANEL: PHOTO HERO SLIDESHOW ─── */
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
            min-height: 560px;
        }

        /* Slides */
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

        /* Ken Burns on next slide entering */
        .hero-slide.entering {
            opacity: 0;
            transform: scale(1.08);
        }

        /* Gradient overlay — stronger at bottom for text legibility */
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

        /* All direct children of right-panel sit above overlay */
        .right-panel > *:not(.hero-slides):not(.hero-overlay) {
            position: relative;
            z-index: 2;
        }

        /* Progress bar dots — top right */
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

        /* Slide counter — top left */
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

        /* Category badge */
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
            transition: all 0.5s ease;
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            line-height: 1.15;
            margin-bottom: 10px;
            transition: all 0.5s ease;
        }

        .hero-text {
            font-size: 0.875rem;
            line-height: 1.6;
            color: rgba(255,255,255,0.82);
            margin-bottom: 20px;
            max-width: 320px;
            transition: all 0.5s ease;
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

        /* Progress ring for auto-advance */
        .progress-ring-wrap {
            position: absolute;
            top: 14px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 3;
        }

        /* Navigation arrows */
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
            .card-outer { flex-direction: column; border-radius: 24px; }
            .right-panel {
                width: 100% !important;
                min-height: 320px;
                order: 1;
                border-radius: 24px 24px 0 0;
                padding: 28px 24px;
            }
            .hero-title { font-size: 1.65rem; }
            .left-panel { padding: 40px 24px !important; order: 2; }
            .left-panel h1 { font-size: 2.5rem !important; text-align: center; }
            .left-panel .subtitle { text-align: center; margin-left: auto; margin-right: auto; }
            body { padding: 20px 10px; }
        }
        @media (max-width: 480px) {
            .left-panel h1 { font-size: 2.1rem !important; }
            .hero-title { font-size: 1.4rem; }
        }
    </style>
</head>
<body>
    <div class="dot-grid"></div>
    <div class="wrapper">
        <div class="card-outer">

            {{-- ──── LEFT: LOGIN FORM ──── --}}
            <div class="left-panel">
                <div class="brand-tag mx-auto mx-lg-0">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                    </svg>
                    KuyWisata Portal
                </div>

                <h1>Selamat<br class="d-none d-lg-block"><span>Datang</span></h1>
                <p class="subtitle">Silakan masuk menggunakan akun terdaftar kamu untuk menjelajahi keindahan Singkawang.</p>

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="input-wrap">
                        <label class="form-label" for="email">Email</label>
                        <input type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            id="email" name="email"
                            value="{{ old('email') }}"
                            placeholder="nama@email.com"
                            required autofocus>
                        <span class="input-icon">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                        </span>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-wrap">
                        <label class="form-label" for="password">Password</label>
                        <input type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password"
                            placeholder="••••••••"
                            required>
                        <span class="input-icon">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                            </svg>
                        </span>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="options-row">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Ingat saya</label>
                        </div>
                        <a href="#" class="forgot-link">Lupa Password?</a>
                    </div>

                    <button type="submit" class="btn-login">Masuk Sekarang →</button>
                </form>

                <div class="register-box">
                    <p class="text-muted small mb-2">Belum punya akun pengguna?</p>
                    <a href="{{ route('register') }}" class="register-link">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right:6px;">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                        Buat Akun Baru
                    </a>
                </div>
            </div>

            {{-- ──── RIGHT: PHOTO HERO SLIDESHOW ──── --}}
            <div class="right-panel" id="heroPanel">

                {{-- Slides --}}
                <div class="hero-slides" id="heroSlides">

                    {{-- Slide 1: Pantai --}}
                    <div class="hero-slide active"
                         style="background-image: url('https://images.unsplash.com/photo-1506929562872-bb421503ef21?auto=format&fit=crop&w=1200&q=80');">
                    </div>

                    {{-- Slide 2: Gunung --}}
                    <div class="hero-slide"
                         style="background-image: url('https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=1200&q=80');">
                    </div>

                    {{-- Slide 3: Sungai --}}
                    <div class="hero-slide"
                         style="background-image: url('https://images.unsplash.com/photo-1501854140801-50d01698950b?auto=format&fit=crop&w=1200&q=80');">
                    </div>

                </div>

                {{-- Dark overlay --}}
                <div class="hero-overlay"></div>

                {{-- Slide counter top-left --}}
                <div class="slide-counter" id="slideCounter">
                    <span class="current" id="counterCurrent">1</span>
                    <span style="opacity:0.4;">/</span>
                    <span>3</span>
                </div>

                {{-- Progress dots top-right --}}
                <div class="hero-dots" id="heroDots">
                    <div class="hero-dot active" data-index="0" onclick="goToSlide(0)"></div>
                    <div class="hero-dot" data-index="1" onclick="goToSlide(1)"></div>
                    <div class="hero-dot" data-index="2" onclick="goToSlide(2)"></div>
                </div>

                {{-- Text content --}}
                <div class="hero-badge" id="heroBadge">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/>
                    </svg>
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

                {{-- Navigation arrows --}}
                <div class="nav-arrows">
                    <div class="nav-btn" onclick="prevSlide()" title="Sebelumnya">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <polyline points="15 18 9 12 15 6"/>
                        </svg>
                    </div>
                    <div class="nav-btn" onclick="nextSlide()" title="Berikutnya">
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
        // ── Slide data ──────────────────────────────────────────────
        const slideData = [
            {
                badge:  'Pantai Singkawang',
                title:  'Pesona Pantai\nKalimantan Barat',
                text:   'Rasakan keindahan garis pantai Singkawang yang membentang luas dengan pasir lembut dan ombak tenang.',
                pills:  ['🌊 Pantai', '🌅 Sunset', '🐚 Wisata Bahari'],
                badgeIcon: '<svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M2 22c0-5.5 3.5-8 10-8s10 2.5 10 8"/><path d="M17 8c0 2.8-2.2 7-5 7s-5-4.2-5-7a5 5 0 0 1 10 0z"/></svg>'
            },
            {
                badge:  'Pegunungan Borneo',
                title:  'Keagungan Gunung\ndi Kalimantan',
                text:   'Jelajahi puncak-puncak megah Borneo yang menjulang di antara awan, menawarkan trekking dan panorama alam tiada tanding.',
                pills:  ['🏔 Gunung', '🥾 Trekking', '🌿 Alam Liar'],
                badgeIcon: '<svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M3 17l6-8 4 4 3-3 5 7H3z"/></svg>'
            },
            {
                badge:  'Sungai Borneo',
                title:  'Tenangnya Sungai\nTropis Singkawang',
                text:   'Susuri sungai jernih yang dikelilingi hutan hujan tropis lebat — surga tersembunyi bagi pecinta alam dan petualang sejati.',
                pills:  ['🌊 Sungai', '🌳 Hutan Hujan', '🦜 Satwa Liar'],
                badgeIcon: '<svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/></svg>'
            }
        ];

        let current = 0;
        let autoTimer = null;
        const slides  = document.querySelectorAll('.hero-slide');
        const dots    = document.querySelectorAll('.hero-dot');
        const INTERVAL = 5500; // ms

        // ── DOM refs ─────────────────────────────────────────────────
        const badgeEl   = document.getElementById('badgeText');
        const titleEl   = document.getElementById('heroTitle');
        const textEl    = document.getElementById('heroText');
        const pillsEl   = document.getElementById('heroPills');
        const counterEl = document.getElementById('counterCurrent');

        // ── Core transition ──────────────────────────────────────────
        function goToSlide(index) {
            if (index === current) return;

            // Fade out old slide
            slides[current].classList.remove('active');
            dots[current].classList.remove('active');

            current = index;

            // Fade in new slide
            slides[current].classList.add('active');
            dots[current].classList.add('active');

            // Update counter
            counterEl.textContent = current + 1;

            // Animate text content out → in
            updateContent();

            // Reset timer
            resetTimer();
        }

        function nextSlide() {
            goToSlide((current + 1) % slides.length);
        }

        function prevSlide() {
            goToSlide((current - 1 + slides.length) % slides.length);
        }

        // ── Content update with fade ──────────────────────────────────
        function updateContent() {
            const d = slideData[current];

            // Quick fade-out
            [badgeEl.parentElement, titleEl, textEl, pillsEl].forEach(el => {
                el.style.transition = 'opacity 0.25s, transform 0.25s';
                el.style.opacity    = '0';
                el.style.transform  = 'translateY(10px)';
            });

            setTimeout(() => {
                badgeEl.textContent = d.badge;
                titleEl.innerHTML   = d.title.replace('\n', '<br>');
                textEl.textContent  = d.text;
                pillsEl.innerHTML   = d.pills.map(p => `<span class="pill-badge">${p}</span>`).join('');

                // Fade back in
                [badgeEl.parentElement, titleEl, textEl, pillsEl].forEach(el => {
                    el.style.transition = 'opacity 0.45s ease, transform 0.45s ease';
                    el.style.opacity    = '1';
                    el.style.transform  = 'translateY(0)';
                });
            }, 260);
        }

        // ── Auto-advance (terus berjalan, tidak bisa dihentikan) ─────
        function resetTimer() {
            clearInterval(autoTimer);
            autoTimer = setInterval(nextSlide, INTERVAL);
        }

        // ── Swipe / touch support ────────────────────────────────────
        let touchStartX = 0;
        const panel = document.getElementById('heroPanel');

        panel.addEventListener('touchstart', e => {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        panel.addEventListener('touchend', e => {
            const diff = touchStartX - e.changedTouches[0].screenX;
            if (Math.abs(diff) > 40) {
                diff > 0 ? nextSlide() : prevSlide();
            }
        }, { passive: true });

        // ── Boot — langsung jalan terus tanpa henti ───────────────────
        autoTimer = setInterval(nextSlide, INTERVAL);
    </script>
</body>
</html>