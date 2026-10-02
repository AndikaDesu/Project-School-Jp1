@extends('layouts.app')

@section('content')
<div class="hero-section" style="
    background: linear-gradient(rgba(7, 20, 36, 0.5), rgba(15, 42, 74, 0.85)), url('https://images.unsplash.com/photo-1571896349842-33c89424de2d?q=80&w=1470&auto=format&fit=cover');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    padding: 140px 0 90px;
    color: white;
    text-align: center;
">
    <div class="container animate-fade-in">
        <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold text-uppercase mb-3 tracking-wider" style="font-size: 0.8rem; letter-spacing: 2px;">Ragam Budaya & Harmoni</span>
        <h1 class="display-3 fw-bold mb-3" style="font-family: 'Syne', sans-serif; text-shadow: 0 4px 15px rgba(0,0,0,0.5);">Tentang Kota Singkawang</h1>
        <p class="lead text-white-70 mx-auto" style="max-width: 700px; font-size: 1.2rem; font-weight: 300; text-shadow: 0 2px 8px rgba(0,0,0,0.4);">
            Mengenal lebih dekat Kota Tertoleran di Indonesia yang memadukan pesona alam bahari dengan kehangatan tradisi lintas etnis.
        </p>
    </div>
</div>

<div class="container" style="margin-top: -40px; position: relative; z-index: 4;">
    <div class="card border-0 shadow-lg rounded-4 p-4 p-md-5 bg-white mb-5 animate-slide-up">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="position-relative p-2 bg-light rounded-4 overflow-hidden shadow-sm img-hover-zoom">
                    <div class="badge bg-dark text-white position-absolute top-3 start-3 z-3 px-3 py-2 rounded-3 fw-bold small"><i class="fas fa-camera me-1"></i> Pesisir Singkawang</div>
                    <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=600&auto=format&fit=cover" class="img-fluid rounded-4 w-100 style-image" style="height: 380px; object-fit: cover;" alt="Singkawang">
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="ps-lg-3">
                    <h6 class="text-accent fw-bold text-uppercase tracking-wide mb-2" style="color: #00b4d8;"><i class="fas fa-landmark me-2"></i> Selayang Pandang</h6>
                    <h2 class="fw-bold mb-4" style="color: #0f2a4a; font-family: 'Syne', sans-serif;">Kota Amoy yang Penuh Pesona Harmoni</h2>
                    <p class="text-secondary mb-3" style="text-align: justify; line-height: 1.8; font-size: 1.05rem;">
                        <strong>Singkawang</strong> atau yang dikenal dalam bahasa Hakka sebagai <em>San Khew Jong</em> (Shan Kou Yang), merupakan sebuah kota pelabuhan dan perdagangan yang dikelilingi oleh barisan pegunungan megah di Provinsi Kalimantan Barat.
                    </p>
                    <p class="text-secondary mb-0" style="text-align: justify; line-height: 1.8; font-size: 1.05rem;">
                        Identitas kota ini terbentuk dari tiga etnis besar yang hidup berdampingan dengan sangat rukun, yaitu <strong>Tionghoa, Dayak, dan Melayu (Tidayu)</strong>. Keberagaman ini melahirkan akulturasi budaya, arsitektur kelenteng kuno, seni kuliner pusaka, serta perayaan Cap Go Meh legendaris yang mendunia.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-light py-5 border-top border-bottom border-light-subtle">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color: #0f2a4a; font-family: 'Syne', sans-serif;">Pilar & Karakter Kota</h2>
            <p class="text-muted">Keunikan autentik yang menjadikan Singkawang berbeda dari kota lainnya</p>
        </div>
        
        <div class="row text-center g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 text-start bg-white h-100 card-feature-interactive">
                    <div class="icon-box mb-4 d-flex align-items-center justify-content-center rounded-3 bg-warning-subtle text-warning shadow-sm" style="width: 60px; height: 60px;">
                        <i class="fas fa-hand-holding-heart fa-2x"></i>
                    </div>
                    <h5 class="fw-bold mb-3" style="color: #0f2a4a;">Kota Tertoleran</h5>
                    <p class="text-secondary small mb-0 style-justify">Secara beruntun meraih predikat Kota Paling Toleran se-Indonesia dari Setara Institute atas keharmonisan kehidupan antar-etnis dan umat beragama.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 text-start bg-white h-100 card-feature-interactive">
                    <div class="icon-box mb-4 d-flex align-items-center justify-content-center rounded-3 bg-primary-subtle text-primary shadow-sm" style="width: 60px; height: 60px;">
                        <i class="fas fa-torii-gate fa-2x"></i>
                    </div>
                    <h5 class="fw-bold mb-3" style="color: #0f2a4a;">Seribu Kelenteng</h5>
                    <p class="text-secondary small mb-0 style-justify">Julukan legendaris karena di setiap sudut kawasan kota, vihara dan kelenteng bersejarah berdiri megah menampilkan ornamen naga khas Tiongkok kuno.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 text-start bg-white h-100 card-feature-interactive">
                    <div class="icon-box mb-4 d-flex align-items-center justify-content-center rounded-3 bg-danger-subtle text-danger shadow-sm" style="width: 60px; height: 60px;">
                        <i class="fas fa-umbrella-beach fa-2x"></i>
                    </div>
                    <h5 class="fw-bold mb-3" style="color: #0f2a4a;">Surga Bahari & Kuliner</h5>
                    <p class="text-secondary small mb-0 style-justify">Berbatasan langsung dengan Laut Natuna, menganugerahi pantai-pantai eksotis yang indah serta kuliner khas legendaris seperti Choipan dan Kopi Aming.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container my-5 py-4">
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="color: #0f2a4a; font-family: 'Syne', sans-serif;">Garis Waktu Sejarah</h2>
        <p class="text-muted">Transformasi perjalanan Singkawang dari desa persinggahan hingga kota modern</p>
    </div>

    <div class="row align-items-stretch g-4">
        <div class="col-lg-4">
            <div class="p-4 bg-white rounded-4 border-start border-warning border-4 shadow-sm h-100">
                <span class="badge bg-warning text-dark mb-2 fw-bold">Abad ke-18</span>
                <h5 class="fw-bold text-dark">Awal Persinggahan Mandor</h5>
                <p class="text-muted small mb-0 style-justify">Awalnya merupakan desa persinggahan penambang emas etnis Tionghoa asal Monterado sebelum mereka berlayar pulang membawa hasil bumi.</p>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="p-4 bg-white rounded-4 border-start border-primary border-4 shadow-sm h-100">
                <span class="badge bg-primary text-white mb-2 fw-bold">Tahun 2001</span>
                <h5 class="fw-bold text-dark">Berstatus Kota Otonom</h5>
                <p class="text-muted small mb-0 style-justify">Resmi memisahkan diri dari Kabupaten Sambas dan disahkan menjadi Daerah Otonom Kota Mandya berdasarkan UU No. 12 Tahun 2001.</p>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="p-4 bg-white rounded-4 border-start border-success border-4 shadow-sm h-100">
                <span class="badge bg-success text-white mb-2 fw-bold">Masa Kini</span>
                <h5 class="fw-bold text-dark">Metropolitan Budaya</h5>
                <p class="text-muted small mb-0 style-justify">Berkembang menjadi pusat destinasi pariwisata unggulan, cagar budaya multietnis, dan ikon kota toleransi percontohan nasional.</p>
            </div>
        </div>
    </div>
</div>

<style>
    /* Jalur Perataan Teks */
    .style-justify {
        text-align: justify;
    }
    
    /* Animasi Masuk */
    .animate-fade-in {
        animation: fadeIn 1s ease-out forwards;
    }
    .animate-slide-up {
        animation: slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    /* Zoom Gambar Saat Hover */
    .img-hover-zoom {
        overflow: hidden;
    }
    .img-hover-zoom img {
        transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .img-hover-zoom:hover img {
        transform: scale(1.05);
    }

    /* Efek Interaktif pada Card Fitur */
    .card-feature-interactive {
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        border-top: 3px solid transparent !important;
    }
    .card-feature-interactive:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(15, 42, 74, 0.12) !important;
        background-color: #ffffff;
    }
    .card-feature-interactive:hover .icon-box {
        transform: scale(1.1) rotate(5deg);
        transition: all 0.3s ease;
    }
    
    /* Pewarnaan border hover dinamis */
    .col-md-4:nth-child(1) .card-feature-interactive:hover { border-top-color: #ffc107 !important; }
    .col-md-4:nth-child(2) .card-feature-interactive:hover { border-top-color: #0d6efd !important; }
    .col-md-4:nth-child(3) .card-feature-interactive:hover { border-top-color: #dc3545 !important; }

    /* Keyframes */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes slideUp {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection