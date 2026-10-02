<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Matikan foreign key check lalu bersihkan HANYA tabel wisatas
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('wisatas')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 2. Kumpulan Data Master 10 Wisata Singkawang (Tanpa kolom 'kategori' lama, sudah diganti category_id)
        $dataWisata = [
            [
                'nama' => 'Gunung Poteng',
                'deskripsi' => 'Gunung Poteng menawarkan pesona alam yang asri dengan udara yang sangat sejuk. Tempat ini sangat cocok untuk para pecinta alam yang hobi melakukan trekking dan hiking sambil menikmati keindahan pemandangan Kota Singkawang dari ketinggian.',
                'lokasi' => 'Kecamatan Singkawang Timur, Kota Singkawang',
                'gambar' => 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=800&q=80',
                'jam_buka' => '07:00',
                'jam_tutup' => '17:00',
                'tiket_masuk' => '10000',
                'telepon' => '08123456789',
                'website' => 'https://singkawang.go.id',
                'rating' => 4.5,
                'category_id' => 1, // Wisata Alam
            ],
            [
                'nama' => 'Pantai Pasir Panjang',
                'deskripsi' => 'Pantai Pasir Panjang adalah ikon wisata populer di Singkawang dengan hamparan pasir putih yang luas dan ombak yang tenang. Sangat cocok untuk rekreasi keluarga, menikmati sunset, atau bermain wahana air.',
                'lokasi' => 'Kecamatan Singkawang Selatan, Kota Singkawang',
                'gambar' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=800&q=80',
                'jam_buka' => '06:00',
                'jam_tutup' => '18:00',
                'tiket_masuk' => '20000',
                'telepon' => '08987654321',
                'website' => 'https://singkawang.go.id',
                'rating' => 4.7,
                'category_id' => 1, // Wisata Alam
            ],
            [
                'nama' => 'Bukit Bougenville',
                'deskripsi' => 'Sebuah taman bunga yang super cantik di kaki bukit, didominasi oleh bunga Bougenville dari berbagai belahan dunia. Suasananya sangat asri, rindang, dan memiliki banyak spot foto instagramable.',
                'lokasi' => 'Sijangkung, Kecamatan Singkawang Selatan',
                'gambar' => 'https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?auto=format&fit=crop&w=800&q=80',
                'jam_buka' => '08:00',
                'jam_tutup' => '17:30',
                'tiket_masuk' => '15000',
                'telepon' => '081345678901',
                'website' => 'https://singkawang.go.id',
                'rating' => 4.4,
                'category_id' => 1, // Wisata Alam
            ],
            [
                'nama' => 'Pantai Tanjung Bajau',
                'deskripsi' => 'Wisata pantai yang unik karena menggabungkan keindahan pantai berbatu dengan perbukitan dan wahana bermain anak (Fantasy Island). Sangat direkomendasikan untuk liburan keluarga besar.',
                'lokasi' => 'Kecamatan Singkawang Selatan, Kota Singkawang',
                'gambar' => 'https://images.unsplash.com/photo-1519046904884-53103b34b206?auto=format&fit=crop&w=800&q=80',
                'jam_buka' => '07:00',
                'jam_tutup' => '19:00',
                'tiket_masuk' => '25000',
                'telepon' => '085211223344',
                'website' => 'https://singkawang.go.id',
                'rating' => 4.6,
                'category_id' => 1, // Wisata Alam
            ],
            [
                'nama' => 'Danau Biru Singkawang',
                'deskripsi' => 'Danau eksotis berair biru mencolok yang terbentuk secara alami akibat bekas penambangan emas. Pemandangan airnya yang kontras dengan tanah putih di sekitarnya memberikan panorama yang memanjakan mata.',
                'lokasi' => 'Roban, Kecamatan Singkawang Tengah',
                'gambar' => 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=800&q=80',
                'jam_buka' => '06:00',
                'jam_tutup' => '18:00',
                'tiket_masuk' => '5000',
                'telepon' => null,
                'website' => null,
                'rating' => 4.3,
                'category_id' => 1, // Wisata Alam
            ],
            [
                'nama' => 'Kawasan Tradisional Rumah Marga Tjhia',
                'deskripsi' => 'Situs cagar budaya berupa rumah keluarga berarsitektur kuno Tiongkok yang dibangun sejak tahun 1902. Di sini pengunjung bisa belajar sejarah sekaligus mencicipi kuliner khas Choir Pao yang legendaris.',
                'lokasi' => 'Condong, Kecamatan Singkawang Tengah',
                'gambar' => 'https://images.unsplash.com/photo-1596402184320-417e7178b2cd?auto=format&fit=crop&w=800&q=80',
                'jam_buka' => '08:00',
                'jam_tutup' => '21:00',
                'tiket_masuk' => '0',
                'telepon' => '081255667788',
                'website' => 'https://singkawang.go.id',
                'rating' => 4.8,
                'category_id' => 2, // Wisata Budaya
            ],
            [
                'nama' => 'Vihara Tri Dharma Bumi Raya',
                'deskripsi' => 'Vihara tertua di pusat Kota Singkawang yang menjadi simbol toleransi dan pusat perayaan keagamaan seperti Imlek dan Cap Go Meh. Bangunannya sangat ikonik dengan ornamen naga yang megah.',
                'lokasi' => 'Melayu, Kecamatan Singkawang Barat',
                'gambar' => 'https://images.unsplash.com/photo-1541088960295-9382904f03a6?auto=format&fit=crop&w=800&q=80',
                'jam_buka' => '05:00',
                'jam_tutup' => '22:00',
                'tiket_masuk' => '0',
                'telepon' => null,
                'website' => null,
                'rating' => 4.9,
                'category_id' => 2, // Wisata Budaya
            ],
            [
                'nama' => 'Cagar Alam Raya Pasi',
                'deskripsi' => 'Kawasan hutan lindung yang menyimpan kekayaan flora dan fauna langka, termasuk bunga Rafflesia yang mekar di waktu tertentu. Sangat cocok untuk petualangan alam liar eksklusif.',
                'lokasi' => 'Pamilang, Kecamatan Singkawang Selatan',
                'gambar' => 'https://images.unsplash.com/photo-1448375240586-882707db888b?auto=format&fit=crop&w=800&q=80',
                'jam_buka' => '08:00',
                'jam_tutup' => '16:00',
                'tiket_masuk' => '10000',
                'telepon' => '081299001122',
                'website' => null,
                'rating' => 4.2,
                'category_id' => 1, // Wisata Alam
            ],
            [
                'nama' => 'Sinka Island Park',
                'deskripsi' => 'Kawasan wisata terpadu yang memiliki kebun binatang di pinggir pantai (Sinka Zoo), jembatan penyeberangan menuju Pulau Simping (pulau terkecil di dunia), dan pemandangan tebing laut.',
                'lokasi' => 'Sedau, Kecamatan Singkawang Selatan',
                'gambar' => 'https://images.unsplash.com/photo-1546182990-dffeafbe841d?auto=format&fit=crop&w=800&q=80',
                'jam_buka' => '07:30',
                'jam_tutup' => '18:00',
                'tiket_masuk' => '30000',
                'telepon' => '087766554433',
                'website' => 'https://singkawang.go.id',
                'rating' => 4.5,
                'category_id' => 5, // Wisata Buatan
            ],
            [
                'nama' => 'Waterboom Singkawang',
                'deskripsi' => 'Wahana permainan air modern terbesar di Singkawang dengan berbagai macam kolam arus, seluncuran ekstrem, dan area bermain air anak yang sangat seru untuk menghabiskan akhir pekan.',
                'lokasi' => 'Pasiran, Kecamatan Singkawang Barat',
                'gambar' => 'https://images.unsplash.com/photo-1576013551627-0cc20b96c2a7?auto=format&fit=crop&w=800&q=80',
                'jam_buka' => '09:00',
                'jam_tutup' => '17:00',
                'tiket_masuk' => '35000',
                'telepon' => '081122334455',
                'website' => null,
                'rating' => 4.4,
                'category_id' => 5, // Wisata Buatan
            ]
        ];

        // 3. Masukkan data ke tabel wisatas secara massal
        foreach ($dataWisata as $wisata) {
            $wisata['created_at'] = now();
            $wisata['updated_at'] = now();
            
            DB::table('wisatas')->insert($wisata);
        }
    }
}