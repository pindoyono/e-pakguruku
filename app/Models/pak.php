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
        'status',
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
        'pendidikan_sekolah2',
        'pelatihan_prajabatan2',
        'proses_pembelajaran2',
        'proses_bimbingan2',
        'tugas_lain2',
        'pengembangan_diri2',
        'publikasi_ilmiah2',
        'karya_inovatif2',
        'ijazah_tidak_sesuai2',
        'pendukung_tugas_guru2',
        'memperoleh_penghargaan2',
        'penilai_id',
        'pesan_perbaikan',
        'tertinggal',
        'tertinggal2',
        'saran',
        'jurnal',
        'lap_pi',
        'no_sk',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

























