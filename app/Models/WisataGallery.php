<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WisataGallery extends Model
{
    use HasFactory;

    protected $table = 'wisata_galleries';

    protected $fillable = [
        'wisata_id',
        'foto_path',
        'angle_type'
    ];

    public function wisata()
    {
        return $this->belongsTo(Wisata::class, 'wisata_id');
    }
}