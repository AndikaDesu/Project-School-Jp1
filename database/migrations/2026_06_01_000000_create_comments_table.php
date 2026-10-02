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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wisata_id')->constrained('wisatas')->onDelete('cascade');
            $table->string('nama_pengomentar');
            $table->string('email_pengomentar');
            $table->text('isi_komentar');
            $table->unsignedTinyInteger('rating')->default(5)->comment('Rating 1-5');
            $table->boolean('is_approved')->default(false)->comment('Komentar perlu persetujuan admin');
            $table->timestamps();
            
            // Index untuk query lebih cepat
            $table->index('wisata_id');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
