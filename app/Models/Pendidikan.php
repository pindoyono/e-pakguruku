<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;
    protected $fillable = [
        'kegiatan_id',
        'pak_id',
        'judul',
        'nilai',
        'lampiran',
    ];

}
