<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal_rplb extends Model
{
    use HasFactory;

    protected $fillable = [
        'hari',
        'siswa_1',
        'siswa_2',
        'siswa_3',
        'siswa_4',
        'siswa_5'
    ];
}
