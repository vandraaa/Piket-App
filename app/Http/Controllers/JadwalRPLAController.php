<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal_rpla;
use App\Models\Laporan_rpla;
use App\Models\Activity;
use App\Models\Account;
use App\Models\Student;
use App\Exports\JadwalRPLAExport;
use Maatwebsite\Excel\Facades\Excel;

class JadwalRPLAController extends Controller
{
    public function show() {
        if (!session('logged_in')) {
            return redirect()->route('login');
        }

        $rpla = Jadwal_rpla::all();
        $a = Student::where('kelas', 'XI RPL A')->get();
        $user = session('user_id');
        $user = Account::find($user);

        return view('pages.table_rpla', compact('rpla', 'user', 'a'));
    }

    public function store(Request $request) {
        $jadwal_rpla = new Jadwal_rpla();
        $jadwal_rpla -> hari = $request->input('hari');
        $jadwal_rpla -> siswa_1 = $request->input('siswa1a');
        $jadwal_rpla -> siswa_2 = $request->input('siswa2a');
        $jadwal_rpla -> siswa_3 = $request->input('siswa3a');
        $jadwal_rpla -> siswa_4 = $request->input('siswa4a');
        $jadwal_rpla -> siswa_5 = $request->input('siswa5a');
        $jadwal_rpla -> save();

        $laporan_rpla = new Laporan_rpla();
        $laporan_rpla -> hari = $request->input('hari');
        $laporan_rpla -> siswa_1 = $request->input('siswa1a');
        $laporan_rpla -> siswa_2 = $request->input('siswa2a');
        $laporan_rpla -> siswa_3 = $request->input('siswa3a');
        $laporan_rpla -> siswa_4 = $request->input('siswa4a');
        $laporan_rpla -> siswa_5 = $request->input('siswa5a');
        $laporan_rpla -> save();

        $user = session('user_id');
        $user = Account::find($user);

        Activity::create([
            'user' => $user->username,
            'activity_type' => 'add',
            'activity_details' => 'Menambah jadwal RPL A hari ' . $request->input('hari'),
        ]);

        session()->flash('showSuccessAdd', true);
        return redirect('/jadwalxirpla');
    }

    public function destroy($id) {
        $jadwal_rpla = Jadwal_rpla::findOrFail($id);
        $jadwal_rpla -> delete();
        $laporan_rpla = Laporan_rpla::findOrFail($id);
        $laporan_rpla -> delete();

        $user = session('user_id');
        $user = Account::find($user);

        Activity::create([
            'user' => $user->username,
            'activity_type' => 'delete',
            'activity_details' => 'Menghapus jadwal RPL A hari ' . $jadwal_rpla->hari,
        ]);

        session()->flash('showSuccessDelete', true);
        return redirect('/jadwalxirpla');
    }

    public function edit($id) {
        $a = Student::where('kelas', 'XI RPL A')->get();
        $jadwal_rpla = Jadwal_rpla::findOrFail($id);
        $laporan_rpla = Laporan_rpla::findOrFail($id);
        return view('pages.jadwalEditrpla', compact('jadwal_rpla', 'a', 'laporan_rpla'));
    }

    public function update(Request $request, $id) {
        $jadwal_rpla = Jadwal_rpla::findOrFail($id);
        $jadwal_rpla->hari = $request->input('hari');
        $jadwal_rpla->siswa_1 = $request->input('siswa1a');
        $jadwal_rpla->siswa_2 = $request->input('siswa2a');
        $jadwal_rpla->siswa_3 = $request->input('siswa3a');
        $jadwal_rpla->siswa_4 = $request->input('siswa4a');
        $jadwal_rpla->siswa_5 = $request->input('siswa5a');
        $jadwal_rpla->save();

        $laporan_rpla = Laporan_rpla::findOrFail($id);
        $laporan_rpla -> hari = $request->input('hari');
        $laporan_rpla -> siswa_1 = $request->input('siswa1a');
        $laporan_rpla -> siswa_2 = $request->input('siswa2a');
        $laporan_rpla -> siswa_3 = $request->input('siswa3a');
        $laporan_rpla -> siswa_4 = $request->input('siswa4a');
        $laporan_rpla -> siswa_5 = $request->input('siswa5a');
        $laporan_rpla -> save();

        $user = session('user_id');
        $user = Account::find($user);

        Activity::create([
            'user' => $user->username,
            'activity_type' => 'update',
            'activity_details' => 'Mengedit jadwal RPL A hari ' . $request->input('hari'),
        ]);

        session()->flash('showSuccessPopup', true);
        return redirect('/jadwalxirpla');
    }

    public function clear()
    {
        Jadwal_rpla::truncate();
        Laporan_rpla::truncate();

        $user = session('user_id');
        $user = Account::find($user);

        Activity::create([
            'user' => $user->username,
            'activity_type' => 'clear',
            'activity_details' => 'Menghapus seluruh jadwal RPL A',
        ]);

        session()->flash('showSuccessClear', true);
        return redirect('/jadwalxirpla');
    }

    public function downloadExcel()
    {
        return Excel::download(new JadwalRPLAExport, 'jadwal_rpla.xlsx');
    }
}

