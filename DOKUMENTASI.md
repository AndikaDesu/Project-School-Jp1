# 🏛️ Aplikasi Kuywisata

Aplikasi web untuk menampilkan dan mengelola data tempat wisata di Kota Singkawang dengan fitur CRUD lengkap, responsive mobile design, dan admin panel.

## ✨ Fitur Utama

### 📱 Fitur Publik
- **Halaman Beranda (Home)** - Menampilkan wisata unggulan dengan desain menarik
- **Daftar Wisata** - Menampilkan semua wisata dalam bentuk kartu dengan gambar
- **Pencarian (Search)** - Cari wisata berdasarkan nama, deskripsi, atau lokasi
- **Pagination** - Menampilkan data dengan 6 wisata per halaman
- **Detail Wisata** - Informasi lengkap setiap wisata (jam buka, tiket, lokasi, dll)
- **Halaman Kontak** - Form untuk pengunjung menghubungi
- **Responsive Design** - Optimal di mobile, tablet, dan desktop

### 🔐 Fitur Admin
- **Login Admin** - Halaman login dengan email dan password
- **Kelola Wisata** - CRUD operations untuk wisata
  - **Create** - Tambah wisata baru dengan gambar
  - **Read** - Lihat daftar semua wisata
  - **Update** - Edit data wisata
  - **Delete** - Hapus wisata
- **Upload Gambar** - Upload gambar wisata (max 2MB, format: JPEG/PNG/JPG/GIF)
- **Admin Dashboard** - Panel admin dengan sidebar navigasi
- **Responsive Admin** - Admin panel responsive untuk mobile

## 📊 Data Wisata Singkawang (10 Attractions)

1. **Pantai Pasir Panjang** - Pantai ikonik dengan hamparan pasir putih yang membentang panjang
2. **Sinka Island Park** - Destinasi wisata terpadu dengan kolam renang dan kebun binatang
3. **Taman Bukit Bougenville** - Taman botani dengan puluhan spesies bunga berwarna-warni
4. **Pulau Simping** - Pulau terkecil di dunia yang diakui oleh PBB
5. **Danau Biru Singkawang** - Danau cantik dengan warna biru menyala dari bekas penambangan emas
6. **Gunung Poteng** - Kawasan cagar alam dengan habitat bunga Rafflesia Tuan-Mudae
7. **Taman Cinta Pajintan** - Kawasan wisata air (waterboom) dengan tema cinta
8. **Pantai Batu Burung** - Pantai unik dengan susunan batu granit besar
9. **Vihara Tri Dharma Bumi Raya** - Kelenteng tertua dan paling ikonik di Singkawang
10. **Taman Gunung Sari** - Hutan kota dengan area jogging dan bersantai

## 🛠️ Teknologi yang Digunakan

- **Framework**: Laravel 10
- **PHP**: 8.1.10
- **Database**: MySQL 8.0
- **Frontend**: Bootstrap 5.3
- **Icons**: Font Awesome 6.4
- **Server**: Laragon

## 📋 Persyaratan Sistem

- PHP >= 8.1
- Composer
- MySQL/MariaDB
- Node.js & NPM (untuk asset building)

## 🚀 Instalasi & Setup

### 1. Clone/Copy Project
```bash
cd C:\laragon\www\wisata-semarang
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Setup Environment
```bash
cp .env.example .env
```

Database sudah dikonfigurasi untuk MySQL:
```
DB_DATABASE=wisata_db
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Application Key
```bash
C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe artisan key:generate
```

### 5. Run Migrations & Seeders
```bash
C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe artisan migrate:fresh
C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe artisan db:seed
```

### 6. Link Storage untuk Gambar
```bash
C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe artisan storage:link
```

## 🏃 Menjalankan Aplikasi

### Menggunakan Laragon
1. Buka Laragon
2. Klik tombol START untuk Apache dan MySQL
3. Buka browser: `http://localhost` atau `http://wisata-semarang.test` (jika dikonfigurasi)

### Menggunakan PHP Artisan Serve
```bash
cd C:\laragon\www\wisata-semarang
C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe artisan serve
```
Akses aplikasi di: `http://127.0.0.1:8000`

## 👤 Akun Login Admin

- **Email**: admin@kuywisata.com
- **Password**: admin123456

## 📂 Struktur Direktori

```
wisata-semarang/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── WisataController.php
│   │   │   ├── ContactController.php
│   │   │   └── Auth/LoginController.php
│   │   │   └── Admin/WisataController.php
│   │   ├── Middleware/
│   │   └── Kernel.php
│   └── Models/
│       ├── Wisata.php
│       ├── Contact.php
│       └── User.php
├── database/
│   ├── migrations/
│   │   ├── 2026_05_19_000000_create_wisatas_table.php
│   │   └── 2026_05_19_000001_create_contacts_table.php
│   └── seeders/
│       ├── WisataSeeder.php
│       └── AdminUserSeeder.php
├── resources/
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php (Layout Public)
│       │   └── admin.blade.php (Layout Admin)
│       ├── public/
│       │   ├── home.blade.php
│       │   ├── wisata/
│       │   │   ├── index.blade.php
│       │   │   └── show.blade.php
│       │   └── contact/
│       │       └── index.blade.php
│       ├── admin/
│       │   └── wisata/
│       │       ├── index.blade.php
│       │       ├── create.blade.php
│       │       └── edit.blade.php
│       └── auth/
│           └── login.blade.php
├── routes/
│   └── web.php
├── storage/
│   └── app/public/wisatas/ (Folder untuk upload gambar)
└── public/
    └── storage/ (Symbolic link)
```

## 🔗 URL Routes

### Public Routes
- `/` - Halaman Beranda
- `/wisata` - Daftar Wisata (dengan search & pagination)
- `/wisata/{id}` - Detail Wisata
- `/contact` - Halaman Kontak
- `/login` - Login Admin

### Admin Routes (Memerlukan Login)
- `/admin` - Dashboard Admin (redirect ke kelola wisata)
- `/admin/wisata` - Kelola Wisata (List)
- `/admin/wisata/create` - Tambah Wisata
- `/admin/wisata/{id}/edit` - Edit Wisata
- `/admin/wisata/{id}` - Delete Wisata

## 🎨 Design & User Experience

### Mobile Responsive
- Navbar yang responsive dengan hamburger menu
- Tabel yang adaptif di mobile
- Form yang user-friendly
- Gambar yang lazy-loaded
- Optimasi untuk semua ukuran layar

### Color Scheme
- **Primary**: #2c3e50 (Dark Blue)
- **Secondary**: #e74c3c (Red)
- **Light**: #ecf0f1 (Light Gray)

### UX Features
- Breadcrumb navigation
- Alert messages untuk feedback
- Confirmation dialogs untuk delete
- Form validation
- Image preview
- Loading states

## 📝 Fitur Detail

### Search & Filter
- Real-time search di halaman wisata
- Filter berdasarkan nama, deskripsi, lokasi
- Reset search functionality

### Pagination
- 6 wisata per halaman di public site
- 10 wisata per halaman di admin panel
- Navigasi pagination yang user-friendly

### Upload Gambar
- Support: JPEG, PNG, JPG, GIF
- Max size: 2MB
- Auto resize & optimization
- Preview di admin sebelum update

### Rating Sistem
- Rating 0-5 untuk setiap wisata
- Ditampilkan sebagai badge di kartu wisata
- Rating dapat diupdate dari admin

## 🔒 Security

- CSRF Protection (Token)
- SQL Injection Prevention (Eloquent ORM)
- Password Hashing (Bcrypt)
- Input Validation
- Authentication Check
- Authorization dengan middleware

## 🖥️ Browser Support

- Chrome (Latest)
- Firefox (Latest)
- Safari (Latest)
- Edge (Latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## 📞 Kontak & Support

Untuk pertanyaan atau bug report, silakan hubungi:
- **Email**: admin@kuywisata.com
- **Telepon**: (0562) 631-001
- **Alamat**: Kota Singkawang, Kalimantan Barat

## 📄 Lisensi

Aplikasi ini dibuat untuk kebutuhan pendidikan dan pembelajaran Laravel Framework.

---

**Dibuat dengan ❤️ menggunakan Laravel Framework**
