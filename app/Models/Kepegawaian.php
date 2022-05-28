<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepegawaian extends Model
{
    use HasFactory;

    protected $fillable = ['sk_cpns','sk_penyesuaian','sk_ggd', 'sk_pangkat', 'sk_jafung', 'ijazah', 'karpeg','user_id','nilai_pak_pangkat_akhir'];
}
