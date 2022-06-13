<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class relasi_l2pkb_usulan extends Model
{
    use HasFactory;
    protected $fillable = [
        'pendidikan_id',
        'l2pkb_id'
      ];
}
