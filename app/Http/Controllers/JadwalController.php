<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Account;
use App\Models\Jadwal_rpla;
use App\Models\Jadwal_rplb;
use App\Models\Jadwal_rplc;

class JadwalController extends Controller
{
    public function index()
    {
        if (!session('logged_in')) {
            return redirect()->route('login');
        }

        $student = Student::all();
        $jumlahDataSiswa = Student::count();
        $i = 1;

        $a = Student::where('kelas', 'XI RPL A')->get();
        $jumlahA = Student::where('kelas', 'XI RPL A')->count();
        $b = Student::where('kelas', 'XI RPL B')->get();
        $jumlahB = Student::where('kelas', 'XI RPL B')->count();
        $c = Student::where('kelas', 'XI RPL C')->get();
        $jumlahC = Student::where('kelas', 'XI RPL C')->count();

        $rpla = Jadwal_rpla::all();
        $rplb = Jadwal_rplb::all();
        $rplc = Jadwal_rplc::all();

        $user = session('user_id');
        $user = Account::find($user);

        return view('pages.jadwal', compact(
            'student',
            'i',
            'jumlahDataSiswa',
            'a',
            'b',
            'c',
            'jumlahA',
            'jumlahB',
            'jumlahC',
            'rpla',
            'rplb',
            'rplc',
            'user'
        ));
    }
}
