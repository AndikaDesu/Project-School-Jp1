<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kuy Wisata - Singkawang')</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #0b2239;
            --primary-gradient: linear-gradient(135deg, #0f2a4a, #1a4975);
            --secondary-color: #ff6b6b;
            --accent-color: #00b4d8;
            --light-color: #f8fafc;
            --text-dark: #1e293b;
            --text-muted: #64748b;
            --transition-smooth: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            --gold: #e8c96d;
            --surface: #ffffff;
        }

        /* ─── Base ─── */
        *, *::before, *::after { box-sizing: border-box; }

        body {
            font-family: 'DM Sans', sans-serif;
            background-color: #f0f4f8;
            color: var(--text-dark);
            letter-spacing: -0.01em;
            overflow-x: hidden;
        }

        /* ─── Noise Grain Overlay ─── */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 9999;
            opacity: 0.35;
        }

        /* ─── Scrollbar ─── */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #e8eff6; }
        ::-webkit-scrollbar-thumb { background: #b0c4d8; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #7a9fc0; }

        /* ─── Navbar ─── */
        .navbar {
            background: rgba(7, 20, 36, 0.92) !important;
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border-bottom: 1px solid rgba(0, 180, 216, 0.12);
            padding: 0;
            transition: var(--transition-smooth);
        }

        .navbar .container {
            padding-top: 14px;
            padding-bottom: 14px;
        }

        /* Logo */
        .navbar-brand {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 1.35rem;
            color: #ffffff !important;
            letter-spacing: -0.04em;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-icon-wrap {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, #00b4d8, #0077a8);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            color: white;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(0, 180, 216, 0.35);
            transition: var(--transition-smooth);
        }

        .navbar-brand:hover .brand-icon-wrap {
            transform: rotate(-8deg) scale(1.1);
            box-shadow: 0 6px 18px rgba(0, 180, 216, 0.5);
        }

        .brand-text-papua {
            color: var(--gold);
        }

        /* Nav links */
        .nav-link {
            font-family: 'DM Sans', sans-serif;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.65) !important;
            transition: var(--transition-smooth);
            margin: 0 4px;
            padding: 7px 14px !important;
            border-radius: 8px;
            font-size: 0.9rem;
            position: relative;
            letter-spacing: 0.01em;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 4px;
            left: 50%;
            transform: translateX(-50%) scaleX(0);
            width: 16px;
            height: 2px;
            background: var(--accent-color);
            border-radius: 2px;
            transition: var(--transition-smooth);
        }

        .nav-link:hover::after, .nav-link.active::after { transform: translateX(-50%) scaleX(1); }
        .nav-link:hover, .nav-link.active {
            color: #ffffff !important;
            background: rgba(255, 255, 255, 0.07);
        }

        /* Login & Logout button */
        .btn-nav-login, .btn-nav-logout {
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            font-size: 0.85rem;
            letter-spacing: 0.04em;
            color: #071424 !important;
            background: var(--gold) !important;
            border: none;
            border-radius: 8px;
            padding: 8px 20px !important;
            box-shadow: 0 4px 14px rgba(232, 201, 109, 0.3);
            transition: var(--transition-smooth);
            text-transform: uppercase;
        }

        .btn-nav-login::after { display: none; }

        .btn-nav-login:hover, .btn-nav-logout:hover {
            background: #f0d77a !important;
            color: #071424 !important;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(232, 201, 109, 0.45);
        }

        /* Dropdown */
        .dropdown-menu {
            border: none !important;
            border-radius: 12px !important;
            box-shadow: 0 20px 50px rgba(11, 34, 57, 0.15), 0 0 0 1px rgba(0,0,0,0.04) !important;
            padding: 8px !important;
            margin-top: 10px !important;
            animation: dropFade 0.25s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        @keyframes dropFade {
            from { opacity: 0; transform: translateY(-8px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .dropdown-item {
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 500;
            transition: var(--transition-smooth);
        }

        .dropdown-item:hover { background: #f0f6ff; }

        /* ─── Cards ─── */
        .card {
            border: none;
            background: var(--surface);
            box-shadow: 0 2px 12px rgba(15, 42, 74, 0.05), 0 1px 3px rgba(15, 42, 74, 0.04);
            transition: var(--transition-smooth);
            border-radius: 18px;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-10px) scale(1.005);
            box-shadow: 0 24px 50px rgba(15, 42, 74, 0.13), 0 4px 12px rgba(15, 42, 74, 0.06);
        }

        /* ─── Buttons ─── */
        .btn-primary {
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            background: var(--primary-gradient);
            border: none;
            border-radius: 10px;
            padding: 11px 26px;
            font-size: 0.9rem;
            letter-spacing: 0.02em;
            box-shadow: 0 4px 16px rgba(26, 73, 117, 0.22);
            transition: var(--transition-smooth);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(26, 73, 117, 0.35);
            background: linear-gradient(135deg, #1a4975, #0f2a4a);
        }

        /* ─── Hero ─── */
        .hero-section {
            background: linear-gradient(160deg, #071424 0%, #0f2a4a 50%, #133a60 100%);
            color: white;
            padding: 90px 0;
            position: relative;
            overflow: hidden;
        }

        /* Animated mesh blobs */
        .hero-section::before {
            content: '';
            position: absolute;
            width: 700px; height: 700px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(0, 180, 216, 0.18) 0%, transparent 65%);
            top: -200px; right: -150px;
            animation: floatBlob 8s ease-in-out infinite alternate;
            pointer-events: none;
        }

        .hero-section::after {
            content: '';
            position: absolute;
            width: 500px; height: 500px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(232, 201, 109, 0.1) 0%, transparent 65%);
            bottom: -150px; left: -100px;
            animation: floatBlob 10s ease-in-out infinite alternate-reverse;
            pointer-events: none;
        }

        @keyframes floatBlob {
            0%   { transform: translate(0, 0) scale(1); }
            100% { transform: translate(40px, 30px) scale(1.08); }
        }

        /* Hero decorative dots grid */
        .hero-dots {
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(255,255,255,0.06) 1px, transparent 1px);
            background-size: 32px 32px;
            pointer-events: none;
        }

        /* ─── Footer ─── */
        .footer {
            background: #071424;
            color: #e2e8f0;
            padding: 70px 0 30px 0;
            margin-top: 80px;
            border-top: 1px solid rgba(255, 255, 255, 0.04);
            position: relative;
            overflow: hidden;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--accent-color), var(--gold), var(--accent-color), transparent);
            opacity: 0.6;
        }

        .footer::after {
            content: '';
            position: absolute;
            width: 600px; height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(0, 180, 216, 0.05) 0%, transparent 70%);
            top: -100px; right: -100px;
            pointer-events: none;
        }

        .footer h5 {
            font-family: 'Syne', sans-serif;
            color: #ffffff;
            font-weight: 700;
            font-size: 0.8rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            margin-bottom: 25px;
            position: relative;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .footer h5::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(255,255,255,0.08);
        }

        .footer p, .footer a {
            font-size: 0.88rem;
            line-height: 1.75;
        }

        .footer a {
            text-decoration: none;
            transition: var(--transition-smooth);
        }

        .footer a:hover {
            color: var(--accent-color) !important;
            padding-left: 6px;
        }

        .footer-social-link {
            width: 38px; height: 38px;
            border-radius: 10px;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.08);
            display: inline-flex; align-items: center; justify-content: center;
            color: rgba(255,255,255,0.5) !important;
            font-size: 0.9rem;
            transition: var(--transition-smooth);
        }

        .footer-social-link:hover {
            background: var(--accent-color) !important;
            border-color: var(--accent-color) !important;
            color: white !important;
            transform: translateY(-3px) !important;
            padding-left: 0 !important;
        }

        .footer-contact-item {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding: 10px 0;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }

        .footer-contact-item:last-child { border-bottom: none; }

        .footer-contact-icon {
            width: 32px; height: 32px;
            border-radius: 8px;
            background: rgba(0, 180, 216, 0.12);
            display: flex; align-items: center; justify-content: center;
            color: var(--accent-color);
            font-size: 0.8rem;
            flex-shrink: 0;
            margin-top: 1px;
        }

        .footer-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.08), transparent);
            margin: 40px 0 24px;
        }

        /* ─── Utilities ─── */
        .rating { color: #ffb020; font-size: 0.9rem; }

        .img-wisata {
            height: 260px;
            object-fit: cover;
            transition: var(--transition-smooth);
        }

        .card:hover .img-wisata { transform: scale(1.06); }

        .badge-rating {
            position: absolute;
            top: 15px; right: 15px;
            background: rgba(255, 107, 107, 0.95);
            backdrop-filter: blur(6px);
            color: white;
            padding: 6px 14px;
            border-radius: 30px;
            font-weight: 700;
            font-size: 0.82rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            z-index: 2;
            font-family: 'Syne', sans-serif;
            letter-spacing: 0.02em;
        }

        .breadcrumb-item a {
            color: var(--accent-color);
            text-decoration: none;
            font-weight: 500;
        }

        /* ─── Form Controls ─── */
        .form-control, .form-select {
            border: 1.5px solid #e2e8f0;
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 0.95rem;
            background: white;
            transition: var(--transition-smooth);
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 4px rgba(0, 180, 216, 0.12);
            outline: none;
        }

        /* ─── Page Load Animation ─── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .navbar { animation: fadeUp 0.5s ease both; }

        /* ─── Responsive ─── */
        @media (max-width: 768px) {
            .navbar .container { padding-top: 10px; padding-bottom: 10px; }
            .navbar-brand { font-size: 1.15rem; }
            .hero-section { padding: 60px 0; }
            .img-wisata { height: 200px; }
            .footer { padding: 50px 0 20px 0; }
            .nav-item { width: 100%; text-align: center; margin: 5px 0; }
            .dropdown-menu { text-align: center; }
        }
    </style>
    @yield('styles')
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <span class="brand-icon-wrap">
                    <i class="fas fa-map-location-dot"></i>
                </span>
                Kuy<span class="brand-text-papua">Wisata</span>
            </a>

            <button class="navbar-toggler border-0 shadow-none" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                           href="{{ route('home') }}">
                            <i class="fas fa-home me-1 opacity-75"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('wisata.*') ? 'active' : '' }}"
                           href="{{ route('wisata.index') }}">
                            <i class="fas fa-compass me-1 opacity-75"></i> Destinasi Wisata
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('tentang-kota') ? 'active' : '' }}"
                           href="{{ route('tentang-kota') }}">
                            <i class="fas fa-city me-1 opacity-75"></i> Tentang Kota
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact.*') ? 'active' : '' }}"
                           href="{{ route('contact.index') }}">
                            <i class="fas fa-envelope me-1 opacity-75"></i> Kontak
                        </a>
                    </li>

                    {{-- ✔ PERBAIKAN: Menu Dropdown Admin ini dikunci gaib, hanya muncul jika email kamu adalah admin --}}
                    @auth
                        @if(in_array(Auth::user()->email, ['dika@admin.com', 'admin@sekolah.sch.id']))
                            <li class="nav-item dropdown ms-lg-1">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-user-shield me-1 opacity-75"></i> Admin
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item py-2" href="{{ route('admin.wisata.index') }}">
                                            <i class="fas fa-table-list me-2 text-muted" style="font-size:0.85rem;"></i>
                                            Kelola Wisata
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                            @csrf
                                            <button class="dropdown-item py-2 text-danger" type="submit">
                                                <i class="fas fa-right-from-bracket me-2" style="font-size:0.85rem;"></i>
                                                Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            {{-- Jika user biasa login, tampilkan tombol logout biasa di ujung tanpa menu admin --}}
                            <li class="nav-item ms-lg-3">
                                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                    @csrf
                                    <button class="nav-link btn-nav-logout text-dark px-3 py-2 fw-bold" type="submit">
                                        <i class="fas fa-right-from-bracket me-1"></i> Logout
                                    </button>
                                </form>
                            </li>
                        @endif
                    @else
                        <li class="nav-item ms-lg-3">
                            <a class="nav-link btn-nav-login" href="{{ route('login') }}">
                                <i class="fas fa-arrow-right-to-bracket me-1"></i> Login
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="footer">
        <div class="container position-relative" style="z-index: 1;">
            <div class="row g-5">

                <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="brand-icon-wrap" style="width:42px; height:42px; font-size:1rem;">
                            <i class="fas fa-map-location-dot"></i>
                        </div>
                        <span style="font-family:'Syne',sans-serif; font-weight:800; font-size:1.2rem; letter-spacing:-0.03em;">
                            Kuy<span style="color: var(--gold);">Wisata</span>
                        </span>
                    </div>
                    <p class="text-white-50" style="line-height:1.85; font-size:0.875rem;">
                        Jelajahi keindahan destinasi wisata terbaik, keunikan budaya lokal, serta keindahan lanskap alam yang memukau dengan sajian informasi super lengkap.
                    </p>
                    <div class="d-flex gap-2 mt-4">
                        <a href="#" class="footer-social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="footer-social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="footer-social-link"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="footer-social-link"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 col-sm-6">
                    <h5>Navigasi</h5>
                    <ul class="list-unstyled d-flex flex-column gap-1 mt-3">
                        <li><a href="{{ route('home') }}" class="text-white-50">Home</a></li>
                        <li><a href="{{ route('wisata.index') }}" class="text-white-50">Destinasi Wisata</a></li>
                        <li><a href="{{ route('tentang-kota') }}" class="text-white-50">Tentang Kota</a></li>
                        <li><a href="{{ route('contact.index') }}" class="text-white-50">Kontak</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 d-none d-lg-block"></div>

                <div class="col-lg-4 col-md-10">
                    <h5>Hubungi Kami</h5>
                    <div class="mt-3">
                        <div class="footer-contact-item">
                            <div class="footer-contact-icon">
                                <i class="fas fa-phone-flip"></i>
                            </div>
                            <div>
                                <div style="font-size:0.72rem; text-transform:uppercase; letter-spacing:0.08em; color:rgba(255,255,255,0.3); margin-bottom:2px;">Telepon</div>
                                <span class="text-white-50" style="font-size:0.875rem;">(0562) 123-4567</span>
                            </div>
                        </div>
                        <div class="footer-contact-item">
                            <div class="footer-contact-icon">
                                <i class="fas fa-envelope-open-text"></i>
                            </div>
                            <div>
                                <div style="font-size:0.72rem; text-transform:uppercase; letter-spacing:0.08em; color:rgba(255,255,255,0.3); margin-bottom:2px;">Email</div>
                                <span class="text-white-50" style="font-size:0.875rem;">info@kuywisata.com</span>
                            </div>
                        </div>
                        <div class="footer-contact-item">
                            <div class="footer-contact-icon">
                                <i class="fas fa-location-dot"></i>
                            </div>
                            <div>
                                <div style="font-size:0.72rem; text-transform:uppercase; letter-spacing:0.08em; color:rgba(255,255,255,0.3); margin-bottom:2px;">Lokasi</div>
                                <span class="text-white-50" style="font-size:0.875rem;">Singkawang, Kalimantan Barat, Indonesia</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="footer-divider"></div>

            <div class="d-flex flex-column flex-sm-row align-items-center justify-content-between gap-3">
                <p class="mb-0 text-white-50" style="font-size:0.82rem;">
                    &copy; 2026 <span style="color:rgba(255,255,255,0.7); font-weight:500;">Kuy Wisata</span>. All rights reserved.
                </p>
                <div class="d-flex gap-3" style="font-size:0.78rem;">
                    <a href="#" class="text-white-50" style="text-decoration:none;">Kebijakan Privasi</a>
                    <span style="color:rgba(255,255,255,0.15);">·</span>
                    <a href="#" class="text-white-50" style="text-decoration:none;">Syarat & Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{!! session('success') !!}",
                showConfirmButton: false,
                timer: 2500,
                background: '#ffffff',
                customClass: { popup: 'rounded-4 shadow' }
            });
        });
    </script>
    @endif

    <script>
        // Navbar scroll effect padding animation
        (function() {
            const navbar = document.querySelector('.navbar');
            if (!navbar) return;
            window.addEventListener('scroll', () => {
                if (window.scrollY > 20) {
                    navbar.style.padding = '0';
                    navbar.style.boxShadow = '0 4px 30px rgba(0,0,0,0.3)';
                } else {
                    navbar.style.padding = '';
                    navbar.style.boxShadow = '';
                }
            }, { passive: true });
        })();
    </script>
    
    @yield('scripts')
</body>
</html>