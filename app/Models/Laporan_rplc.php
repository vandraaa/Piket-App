<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan_rplc extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'hari',
        'status_1',
        'siswa_1',
        'status_2',
        'siswa_2',
        'status_3',
        'siswa_3',
        'status_4',
        'siswa_4',
        'status_5',
        'siswa_5'
    ];
}
