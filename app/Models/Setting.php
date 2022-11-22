<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_berita_acara_atas',
        'tgl_berita_acara_ttd',
        'hari_ba',
        'tgl_hapak_atas',
        'awal_hapak',
        'akhir_hapak',
        'tgl_hapak_ttd',
        'tgl_pak_ttd',
        'kadis',
        'nama_kadis',
        'jabatan_kadis',
        'nip_kadis',
        'tgl_akhir',
        'periode',

    ];
}
