<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wisatas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi');
            $table->text('lokasi');
            $table->string('gambar')->nullable();
            $table->string('jam_buka');
            $table->string('jam_tutup');
            $table->string('tiket_masuk');
            $table->string('telepon')->nullable();
            $table->string('website')->nullable();
            $table->decimal('rating', 3, 1)->default(5.0);
            
            // 🚨 ✔ FIX RELASI: Mengubah string 'kategori' menjadi foreignId yang terhubung ke tabel categories
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null');
            
            $table->text('video_url')->nullable();
            $table->text('maps_iframe')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wisatas');
    }
};