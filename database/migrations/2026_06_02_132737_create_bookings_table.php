<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
{
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        $table->foreignId('wisata_id')->constrained()->onDelete('cascade');
        $table->string('nama_pemesan');
        $table->string('email');
        $table->integer('jumlah_tiket');
        $table->decimal('total_harga', 12, 2);
        $table->date('tanggal_kunjungan');
        $table->string('status')->default('Success');
        $table->timestamps();
    });
}
};
 