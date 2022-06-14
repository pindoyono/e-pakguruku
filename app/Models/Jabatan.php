<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'target_sebelum',
        'jabatan',
        'pangkat',
        'target',
        'akk',
        'akpkbpd',
        'akpkbpiki',
        'akp',
        'pangkat_sebelum',
    ];
}
