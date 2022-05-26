<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pak extends Model
{
    use HasFactory;
    protected $fillable = [
        'awal',
        'user_id',
        'akhir',
        'pendidikan_sekolah',
        'pelatihan_prajabatan',
        'proses_pembelajaran',
        'proses_bimbingan',
        'tugas_lain',
        'pengembangan_diri',
        'publikasi_ilmiah',
        'karya_inovatif',
        'ijazah_tidak_sesuai',
        'pendukung_tugas_guru',
        'memperoleh_penghargaan',
        'surat_pengantar',
        'tidak_dihukum',
        'dupak',
        'surat_pembelajaran',
        'surat_bimbingan_tertentu',
        'surat_penunjang',
        'surat_pkb',
        'sk_ganjil',
        'sk_genap',
        'scan_pak',
        'pkg',
        'skp',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

























