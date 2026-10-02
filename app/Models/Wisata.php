<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $fillable = [
        'nama',
        'deskripsi',
        'lokasi',
        'gambar',
        'jam_buka',
        'jam_tutup',
        'tiket_masuk',
        'telepon',
        'website',
        'rating',
        'category_id',
        'video_url',
        'maps_iframe',
        'video_youtube',
        'link_maps',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function galleries()
    {
        return $this->hasMany(WisataGallery::class, 'wisata_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'wisata_id');
    }
}