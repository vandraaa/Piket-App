<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Account;
use App\Models\Schedule;
use App\Models\Laporan_rpla;
use App\Models\Jadwal_rpla;
use App\Models\Activity;
use App\Exports\LaporanRPLAExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class LaporanRPLAController extends Controller
{

    public function show() {
        if (!session('logged_in')) {
            return redirect()->route('login');
        }

        $laporanA = Laporan_rpla::all();
        $user = session('user_id');
        $user = Account::find($user);

        return view('pages.laporan_rpla', compact('laporanA', 'user'));
    }

    public function edit($id) {
        $laporan_rpla = Laporan_rpla::findOrFail($id);
        return view('pages.laporanEditA', compact('laporan_rpla'));
    }

    public function update(Request $request, $id) {
        $laporan_rpla  =  Laporan_rpla::findOrFail($id);
        $laporan_rpla -> tanggal = $request->input('tanggal');
        $laporan_rpla -> status_1 = $request->input('status_1');
        $laporan_rpla -> status_2 = $request->input('status_2');
        $laporan_rpla -> status_3 = $request->input('status_3');
        $laporan_rpla -> status_4 = $request->input('status_4');
        $laporan_rpla -> status_5 = $request->input('status_5');
        $laporan_rpla -> save();

        $user = session('user_id');
        $user = Account::find($user);

        Activity::create([
            'user' => $user->username,
            'activity_type' => 'add',
            'activity_details' => 'Menambahkan laporan pada jadwal RPL A hari ' . $laporan_rpla->hari,
        ]);

        session()->flash('showSuccessPopup', true);
        return redirect('laporanxirpla');
    }

    public function clear()
    {
        Laporan_rpla::query()->update([
            'tanggal' => null,
            'status_1' => null,
            'status_2' => null,
            'status_3' => null,
            'status_4' => null,
            'status_5' => null,
        ]);

        $user = session('user_id');
        $user = Account::find($user);

        Activity::create([
            'user' => $user->username,
            'activity_type' => 'clear',
            'activity_details' => 'Menghapus seluruh laporan pada jadwal RPL A',
        ]);

        session()->flash('showSuccessClear', true);
        return redirect('laporanxirpla');
    }


    public function downloadExcel()
    {
        return Excel::download(new LaporanRPLAExport, 'laporan_rpla.xlsx');
    }
}
