# 🚀 QUICK START GUIDE

## 🎯 🎯 Aplikasi Kuywisata - Setup & Run

Panduan cepat untuk menjalankan aplikasi Kuywisata.

---

## ✅ Status Terkini

**Aplikasi sudah sepenuhnya siap digunakan!**

- ✅ Database created: `wisata_db`
- ✅ Migrations executed
- ✅ 10 wisata data sudah di-seed
- ✅ Admin user sudah di-buat
- ✅ Storage link sudah di-setup

---

## 🏃 Cara Menjalankan (3 Cara)

### **CARA 1: Menggunakan Laragon (PALING MUDAH)**

1. **Buka Laragon**
   - Cari Laragon di Start Menu atau klik Laragon di taskbar

2. **Start Services**
   - Klik tombol **START** (Apache & MySQL akan jalan)
   - Tunggu sampai status menunjukkan "All Services Running"

3. **Buka Browser**
   - Buka web browser: Chrome, Firefox, atau Edge
   - Ketik: `http://localhost`
   - Atau: `http://localhost:8000`

4. **Aplikasi Siap Digunakan!** 🎉

---

### **CARA 2: Menggunakan PHP Artisan Serve**

1. **Buka Command Prompt / PowerShell**
   - Windows: Tekan `Win + R`, ketik `cmd`, tekan Enter
   - Atau klik Start Menu > PowerShell

2. **Navigate ke folder project**
   ```
   cd C:\laragon\www\wisata-semarang
   ```

3. **Jalankan server**
   ```
   C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe artisan serve
   ```

4. **Buka di browser**
   - Buka: `http://127.0.0.1:8000`

---

### **CARA 3: Menggunakan Laragon Menu**

1. **Right-click pada Laragon icon di taskbar**
2. **Pilih folder wisata-semarang**
3. **Pilih "Open Terminals" atau "Open in Browser"**
4. **Aplikasi akan otomatis terbuka di browser**

---

## 📍 URL Aplikasi

Setelah start, akses di:

```
http://localhost
http://localhost:8000
http://127.0.0.1:8000
http://wisata-papua.test (jika sudah dikonfigurasi)
```

---

## 👤 Login Admin

Gunakan kredensial berikut untuk login ke panel admin:

| Field | Value |
|-------|-------|
| **Email** | admin@wisatapapua.com |
| **Password** | admin123456 |

### Cara Login:
1. Klik menu **"Login"** di navbar
2. Atau langsung ke: `http://localhost/login`
3. Masukkan email dan password
4. Klik **"Masuk"**
5. Anda akan diarahkan ke admin panel

---

## 🎯 Menu & Navigasi

### **Halaman Publik**

| Menu | URL | Deskripsi |
|------|-----|-----------|
| Beranda | `/` | Halaman utama |
| Wisata | `/wisata` | Daftar semua wisata |
| Kontak | `/contact` | Form kontak |
| Login | `/login` | Login admin |

### **Halaman Admin** (Setelah login)

| Menu | URL | Deskripsi |
|------|-----|-----------|
| Dashboard | `/admin` | Redirect ke kelola wisata |
| Kelola Wisata | `/admin/wisata` | Daftar wisata |
| Tambah Wisata | `/admin/wisata/create` | Form tambah wisata |

---

## 🎨 Fitur Utama

### 🏠 **Halaman Beranda**
- Tampilan wisata unggulan
- Statistik wisata
- Call-to-action buttons

### 🗂️ **Daftar Wisata**
- Semua wisata dalam kartu
- **SEARCH** - Cari wisata dengan keyword
- **PAGINATION** - 6 wisata per halaman
- Rating dan harga tiket

### 🔍 **Detail Wisata**
- Informasi lengkap setiap wisata
- Gambar wisata
- Jam buka/tutup
- Lokasi, telepon, website

### 📧 **Hubungi Kami**
- Form kontak lengkap
- Info kontak yang tersedia

### 🔐 **Admin Panel**
- **Lihat Wisata** - Tabel semua wisata
- **Tambah Wisata** - Form dengan upload gambar
- **Edit Wisata** - Update data & gambar
- **Hapus Wisata** - Delete dengan konfirmasi

---

## 🧪 Test Features

### Test Search:
1. Buka halaman **Wisata**
2. Di kolom search, ketik: "Lawang" atau "Pantai"
3. Hasil pencarian akan muncul
4. Klik "Reset" untuk kembali ke daftar lengkap

### Test Pagination:
1. Di halaman Wisata, lihat tombol pagination di bawah
2. Klik halaman 2, 3, dst. untuk melihat wisata lainnya
3. Tekan "Sebelumnya" dan "Selanjutnya" untuk navigasi

### Test Admin:
1. Klik "Login" atau buka `/login`
2. Masukkan email: `admin@wisatapapua.com`
3. Password: `admin123456`
4. Klik "Masuk"
5. Anda akan masuk ke admin panel

### Test Upload Gambar:
1. Login sebagai admin
2. Klik "Tambah Wisata"
3. Isi semua field
4. Klik "Pilih file" di bagian Gambar
5. Pilih gambar dari komputer (jpg, png, gif max 2MB)
6. Klik "Simpan"
7. Gambar akan tersimpan dan ditampilkan

---

## 📱 Responsive Design

Aplikasi ini responsif di semua ukuran layar:

✅ Mobile (320px - 480px)
✅ Tablet (481px - 768px)  
✅ Laptop (769px - 1024px)
✅ Desktop (1025px+)

### Test di Mobile:
1. Tekan **F12** di browser (buka Developer Tools)
2. Klik icon **device toggle** (biasanya di toolbar atas)
3. Pilih device: iPhone, iPad, atau ukuran custom
4. Navigasi aplikasi di mobile view

---

## 🆘 Troubleshooting

### **Error: Database connection failed**
- Pastikan MySQL running di Laragon
- Klik START di Laragon
- Tunggu sampai status OK

### **Error: Storage link not found**
- Storage link sudah di-setup
- Jika masih error: `php artisan storage:link`

### **Error: 404 Not Found**
- Pastikan URL benar
- Pastikan Laragon sudah START
- Refresh halaman (F5)

### **Error: CSRF Token Mismatch**
- Clear browser cache
- Atau restart server

---

## 💡 Tips & Tricks

✅ **Gunakan Search Feature**
   - Cari wisata dengan nama, deskripsi, atau lokasi

✅ **Responsif di Mobile**
   - Test aplikasi di HP atau tablet
   - Klik hamburger menu untuk mobile navigation

✅ **Upload Gambar**
   - Gunakan gambar JPG/PNG dengan ukuran < 2MB
   - Gambar akan otomatis di-resize

✅ **Contact Form**
   - Pesan kontak disimpan di database
   - Bisa dilihat nanti untuk follow-up

✅ **Admin Panel**
   - Login dengan email/password yang sudah disediakan
   - Bisa menambah, edit, atau hapus wisata
   - Upload gambar untuk setiap wisata

---

## 📞 Info Kontak Aplikasi

```
Kuywisata
📧 Email: info@kuywisata.com
📱 Telepon: (0562) 631-001
📍 Alamat: Kota Singkawang, Kalimantan Barat
⏰ Jam Kerja: Senin-Jumat 09:00-17:00, Sabtu 09:00-13:00
```

---

## 🎓 Informasi Teknis

- **Framework**: Laravel 10.x
- **PHP**: 8.1.10
- **Database**: MySQL 8.0
- **Frontend**: Bootstrap 5.3
- **Icons**: Font Awesome 6.4

---

## 🎉 Selamat!

Aplikasi **Kuywisata** sudah siap digunakan.

**Enjoy exploring!** 🏛️✨

---

Untuk dokumentasi lengkap, lihat file:
- `DOKUMENTASI.md` - Dokumentasi teknis lengkap
- `RINGKASAN_IMPLEMENTASI.md` - Ringkasan fitur yang diimplementasikan
