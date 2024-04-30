<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}

class YourController extends Controller
{
    // public function showDate()
    // {
    //     // Membuat objek Carbon untuk tanggal sekarang
    //     $tanggalSekarang = Carbon::now();

    //     // Memformat tanggal sesuai dengan format yang diinginkan
    //     $tanggalDiformat = $tanggalSekarang->format('l, j/n/Y');

    //     // Menampilkan tanggal yang sudah diformat
    //     echo $tanggalDiformat; // Contoh output: Friday, 2/2/2024

    //     // Menampilkan tanggal sekarang dalam format tertentu
    //     return view('your_view', ['tanggalSekarang' => $tanggalSekarang->toDateString()]);


    // }
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timezone('Asia/Jakarta');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->timezone('Asia/Jakarta');
    }
}
