<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Account;
use App\Models\Schedule;
use App\Models\Laporan_rpla;
use App\Models\Laporan_rplb;
use App\Models\Laporan_rplc;
use App\Models\Jadwal_rpla;
use App\Models\Jadwal_rplb;
use App\Models\Jadwal_rplc;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        if (!session('logged_in')) {
            return redirect()->route('login');
        }

        $i = 1;
        $rpla = Jadwal_rpla::all();
        $rplb = Jadwal_rplb::all();
        $rplc = Jadwal_rplc::all();
        $jumlahA = Student::where('kelas', 'XI RPL A')->count();
        $jumlahB = Student::where('kelas', 'XI RPL B')->count();
        $jumlahC = Student::where('kelas', 'XI RPL C')->count();
        $laporanA = Laporan_rpla::all();
        $laporanB = Laporan_rplb::all();
        $laporanC = Laporan_rplc::all();

        $user = session('user_id');
        $user = Account::find($user);

        return view('pages.laporan', compact(
          'i',
         'rpla',
         'rplb',
         'rplc',
         'jumlahA',
         'jumlahB',
         'jumlahC',
         'laporanA',
         'laporanB',
         'laporanC',
         'user'
        ));
    }
}
