<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'wisata_id',
        'parent_id', // 🚨 Diizinkan mass-assignment untuk mencatat ID komentar induk
        'nama_pengomentar',
        'email_pengomentar',
        'isi_komentar',
        'rating',
        'is_approved',
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_approved' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relasi ke Induk Komentar
     * Mengetahui komentar ini merupakan balasan dari komentar yang mana
     */
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    /**
     * Relasi ke Anak Komentar (Balasan)
     * Mengambil semua balasan dari komentar ini yang sudah disetujui (Approved)
     */
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id')->where('is_approved', true)->oldest();
    }

    /**
     * Relasi ke Model Wisata
     * Komentar milik satu Wisata
     */
    public function wisata()
    {
        return $this->belongsTo(Wisata::class);
    }

    /**
     * Scope untuk mendapatkan komentar yang sudah disetujui
     * Di-update sedikit agar yang muncul di loop utama HANYA komentar induk (yang parent_id-nya null)
     */
    public function scopeApproved($query)
    {
        return $query->where('is_approved', true)->whereNull('parent_id')->latest();
    }
}