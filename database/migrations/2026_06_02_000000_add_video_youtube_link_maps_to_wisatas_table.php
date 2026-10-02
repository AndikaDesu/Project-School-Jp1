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
        Schema::table('wisatas', function (Blueprint $table) {
            // Tambah kolom jika belum ada
            if (!Schema::hasColumn('wisatas', 'video_youtube')) {
                $table->text('video_youtube')->nullable()->after('video_url');
            }
            
            if (!Schema::hasColumn('wisatas', 'link_maps')) {
                $table->text('link_maps')->nullable()->after('maps_iframe');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wisatas', function (Blueprint $table) {
            if (Schema::hasColumn('wisatas', 'video_youtube')) {
                $table->dropColumn('video_youtube');
            }
            
            if (Schema::hasColumn('wisatas', 'link_maps')) {
                $table->dropColumn('link_maps');
            }
        });
    }
};
