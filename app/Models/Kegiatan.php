<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $fillable = [
        'unsur',
        'sub_unsur',
        'kegiatan',
        'kode',
        'satuan_hasil',
        'angka_kredit',
        'pelaksana',
    ];
}
