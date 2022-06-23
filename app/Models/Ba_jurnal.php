<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ba_jurnal extends Model
{
    use HasFactory;
    protected $fillable = [
        'tanggal',
        'judul',
        'penilai_id',
        'nilai',
        'pak_id',
    ];

}
