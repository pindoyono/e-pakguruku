<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles, HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'user_id',
        'email',
        'password',
        'name',
        'email',
        'password',
        'agama',
        'pangkat_golongan',
        'username',
        'pendidikan',
        'jenis_guru',
        'tugas_tambahan',
        'jenis_kelamin',
        'alamat_sekolah',
        'sekolah',
        'alamat_rumah',
        'tempat_lahir',
        'tanggal_lahir',
        'nuptk',
        'no_sk_cpns',
        'tmt_cpns',
        'tmt_pns',
        'tmt_jabatan',
        'no_hp',
        'avatar',
        'wilayah_kerja',
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
        'status_naik_pangkat',
        'tertinggal',
        'ak_akhir',
        'lama',
        'baru',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function paks()
    {
        return $this->belongsTo(pak::class);
    }

}
