<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal_rplb;
use App\Models\Laporan_rplb;
use App\Models\Student;
use App\Models\Activity;
use App\Models\Account;
use App\Exports\JadwalRPLBExport;
use Maatwebsite\Excel\Facades\Excel;

class JadwalRPLBController extends Controller
{
    public function show() {
        if (!session('logged_in')) {
            return redirect()->route('login');
        }

        $rplb = Jadwal_rplb::all();
        $b = Student::where('kelas', 'XI RPL B')->get();
        $user = session('user_id');
        $user = Account::find($user);

        return view('pages.table_rplb', compact('rplb', 'user', 'b'));
    }

    public function store(Request $request) {
        $jadwal_rplb = new Jadwal_rplb();
        $jadwal_rplb->hari = $request->input('hari');
        $jadwal_rplb->siswa_1 = $request->input('siswa_1');
        $jadwal_rplb->siswa_2 = $request->input('siswa_2');
        $jadwal_rplb->siswa_3 = $request->input('siswa_3');
        $jadwal_rplb->siswa_4 = $request->input('siswa_4');
        $jadwal_rplb->siswa_5 = $request->input('siswa_5');
        $jadwal_rplb->save();

        $laporan_rplb = new Laporan_rplb();
        $laporan_rplb->hari = $request->input('hari');
        $laporan_rplb->siswa_1 = $request->input('siswa_1');
        $laporan_rplb->siswa_2 = $request->input('siswa_2');
        $laporan_rplb->siswa_3 = $request->input('siswa_3');
        $laporan_rplb->siswa_4 = $request->input('siswa_4');
        $laporan_rplb->siswa_5 = $request->input('siswa_5');
        $laporan_rplb->save();

        $user = session('user_id');
        $user = Account::find($user);

        Activity::create([
            'user' => $user->username,
            'activity_type' => 'add',
            'activity_details' => 'Menambah jadwal RPL B hari ' . $request->input('hari'),
        ]);

        session()->flash('showSuccessAdd', true);
        return redirect('/jadwalxirplb');
    }

    public function destroy($id) {
        $jadwal_rplb = Jadwal_rplb::findOrFail($id);
        $jadwal_rplb->delete();
        $laporan_rplb = Laporan_rplb::findOrFail($id);
        $laporan_rplb->delete();

        $user = session('user_id');
        $user = Account::find($user);

        Activity::create([
            'user' => $user->username,
            'activity_type' => 'delete',
            'activity_details' => 'Menghapus jadwal RPL B hari ' . $jadwal_rplb->hari,
        ]);

        session()->flash('showSuccessDelete', true);
        return redirect('/jadwalxirplb');
    }

    public function edit($id) {
        $b = Student::where('kelas', 'XI RPL B')->get();
        $jadwal_rplb = Jadwal_rplb::findOrFail($id);
        $laporan_rplb = Laporan_rplb::findOrFail($id);
        return view('pages.jadwalEditrplb', compact('jadwal_rplb', 'b', 'laporan_rplb'));
    }

    public function update(Request $request, $id) {
        $jadwal_rplb = Jadwal_rplb::findOrFail($id);
        $jadwal_rplb->hari = $request->input('hari');
        $jadwal_rplb->siswa_1 = $request->input('siswa_1');
        $jadwal_rplb->siswa_2 = $request->input('siswa_2');
        $jadwal_rplb->siswa_3 = $request->input('siswa_3');
        $jadwal_rplb->siswa_4 = $request->input('siswa_4');
        $jadwal_rplb->siswa_5 = $request->input('siswa_5');
        $jadwal_rplb->save();

        $laporan_rplb = Laporan_rplb::findOrFail($id);
        $laporan_rplb->hari = $request->input('hari');
        $laporan_rplb->siswa_1 = $request->input('siswa_1');
        $laporan_rplb->siswa_2 = $request->input('siswa_2');
        $laporan_rplb->siswa_3 = $request->input('siswa_3');
        $laporan_rplb->siswa_4 = $request->input('siswa_4');
        $laporan_rplb->siswa_5 = $request->input('siswa_5');
        $laporan_rplb->save();

        $user = session('user_id');
        $user = Account::find($user);

        Activity::create([
            'user' => $user->username,
            'activity_type' => 'update',
            'activity_details' => 'Mengedit jadwal RPL B hari ' . $request->input('hari'),
        ]);

        session()->flash('showSuccessPopup', true);
        return redirect('/jadwalxirplb');
    }

    public function clear()
    {
        Jadwal_rplb::truncate();
        Laporan_rplb::truncate();

        $user = session('user_id');
        $user = Account::find($user);

        Activity::create([
            'user' => $user->username,
            'activity_type' => 'clear',
            'activity_details' => 'Menghapus seluruh jadwal RPL B',
        ]);

        session()->flash('showSuccessClear', true);
        return redirect('/jadwalxirplb');
    }


    public function downloadExcel()
    {
        return Excel::download(new JadwalRPLBExport(), 'jadwal_rplb.xlsx');
    }
}
