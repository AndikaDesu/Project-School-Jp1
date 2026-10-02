<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'wisata_id', 
        'nama_pemesan', 
        'email', 
        'jumlah_tiket', 
        'total_harga', 
        'tanggal_kunjungan', 
        'status'
    ];

    public function wisata()
    {
        return $this->belongsTo(Wisata::class);
    }
}