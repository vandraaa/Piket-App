<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal_rplc;
use App\Models\Laporan_rplc;
use App\Models\Student;
use App\Models\Activity;
use App\Models\Account;
use App\Exports\JadwalRPLCExport;
use Maatwebsite\Excel\Facades\Excel;

class JadwalRPLCController extends Controller
{
    public function show() {
        if (!session('logged_in')) {
            return redirect()->route('login');
        }

        $rplc = Jadwal_rplc::all();
        $c = Student::where('kelas', 'XI RPL C')->get();
        $user = session('user_id');
        $user = Account::find($user);

        return view('pages.table_rplc', compact('rplc', 'user', 'c'));
    }

    public function store(Request $request) {
        $jadwal_rplc = new Jadwal_rplc();
        $jadwal_rplc -> hari = $request->input('hari');
        $jadwal_rplc -> siswa_1 = $request->input('siswa_1');
        $jadwal_rplc -> siswa_2 = $request->input('siswa_2');
        $jadwal_rplc -> siswa_3 = $request->input('siswa_3');
        $jadwal_rplc -> siswa_4 = $request->input('siswa_4');
        $jadwal_rplc -> siswa_5 = $request->input('siswa_5');
        $jadwal_rplc -> save();

        $laporan_rplc = new Laporan_rplc();
        $laporan_rplc -> hari = $request->input('hari');
        $laporan_rplc -> siswa_1 = $request->input('siswa_1');
        $laporan_rplc -> siswa_2 = $request->input('siswa_2');
        $laporan_rplc -> siswa_3 = $request->input('siswa_3');
        $laporan_rplc -> siswa_4 = $request->input('siswa_4');
        $laporan_rplc -> siswa_5 = $request->input('siswa_5');
        $laporan_rplc -> save();

        $user = session('user_id');
        $user = Account::find($user);

        Activity::create([
            'user' => $user->username,
            'activity_type' => 'add',
            'activity_details' => 'Menambah jadwal RPL C hari ' . $request->input('hari'),
        ]);

        session()->flash('showSuccessAdd', true);
        return redirect('/jadwalxirplc');
    }

    public function destroy($id) {
        $jadwal_rplc = Jadwal_rplc::findOrFail($id);
        $jadwal_rplc -> delete();
        $laporan_rplc = Laporan_rplc::findOrFail($id);
        $laporan_rplc -> delete();

        $user = session('user_id');
        $user = Account::find($user);

        Activity::create([
            'user' => $user->username,
            'activity_type' => 'delete',
            'activity_details' => 'Menghapus jadwal RPL C hari ' . $jadwal_rplc->hari,
        ]);

        session()->flash('showSuccessDelete', true);
        return redirect('/jadwalxirplc');
    }

    public function edit($id) {
        $c = Student::where('kelas', 'XI RPL C')->get();
        $jadwal_rplc = Jadwal_rplc::findOrFail($id);
        $laporan_rplc = Laporan_rplc::findOrFail($id);
        session()->flash('showSuccessAdd', true);
        return view('pages.jadwalEditrplc', compact('jadwal_rplc', 'c', 'laporan_rplc'));
    }

    public function update(Request $request, $id) {
        $jadwal_rplc  =  Jadwal_rplc::findOrFail($id);
        $jadwal_rplc -> hari = $request->input('hari');
        $jadwal_rplc -> siswa_1 = $request->input('siswa_1');
        $jadwal_rplc -> siswa_2 = $request->input('siswa_2');
        $jadwal_rplc -> siswa_3 = $request->input('siswa_3');
        $jadwal_rplc -> siswa_4 = $request->input('siswa_4');
        $jadwal_rplc -> siswa_5 = $request->input('siswa_5');
        $jadwal_rplc -> save();

        $laporan_rplc = Laporan_rplc::findOrFail($id);
        $laporan_rplc -> hari = $request->input('hari');
        $laporan_rplc -> siswa_1 = $request->input('siswa_1');
        $laporan_rplc -> siswa_2 = $request->input('siswa_2');
        $laporan_rplc -> siswa_3 = $request->input('siswa_3');
        $laporan_rplc -> siswa_4 = $request->input('siswa_4');
        $laporan_rplc -> siswa_5 = $request->input('siswa_5');
        $laporan_rplc -> save();

        $user = session('user_id');
        $user = Account::find($user);

        Activity::create([
            'user' => $user->username,
            'activity_type' => 'update',
            'activity_details' => 'Mengedit jadwal RPL C hari ' . $request->input('hari'),
        ]);

        session()->flash('showSuccessPopup', true);
        return redirect('/jadwalxirplc');
    }

    public function clear()
    {
        Jadwal_rplc::truncate();
        Laporan_rplc::truncate();

        $user = session('user_id');
        $user = Account::find($user);

        Activity::create([
            'user' => $user->username,
            'activity_type' => 'clear',
            'activity_details' => 'Menghapus seluruh jadwal RPL C',
        ]);

        session()->flash('showSuccessClear', true);
        return redirect('/jadwalxirplc');
    }

    public function downloadExcel()
    {
        return Excel::download(new JadwalRPLCExport, 'jadwal_rplc.xlsx');
    }
}
