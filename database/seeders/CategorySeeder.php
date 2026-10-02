<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('categories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('categories')->insert([
            ['id' => 1, 'nama' => 'Wisata Alam',    'slug' => 'wisata-alam',    'deskripsi' => null, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'nama' => 'Wisata Budaya',  'slug' => 'wisata-budaya',  'deskripsi' => null, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'nama' => 'Wisata Religi',  'slug' => 'wisata-religi',  'deskripsi' => null, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'nama' => 'Wisata Kuliner', 'slug' => 'wisata-kuliner', 'deskripsi' => null, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'nama' => 'Wisata Buatan',  'slug' => 'wisata-buatan',  'deskripsi' => null, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}