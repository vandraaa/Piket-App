<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Account;
use App\Models\Schedule;
use App\Models\Laporan_rplc;
use App\Models\Jadwal_rplc;
use App\Models\Activity;
use App\Exports\LaporanRPLCExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class LaporanRPLCController extends Controller
{
    public function show() {
        if (!session('logged_in')) {
            return redirect()->route('login');
        }

        $user = session('user_id');
        $user = Account::find($user);
        $laporanC = Laporan_rplc::all();

        return view('pages.laporan_rplc', compact('laporanC', 'user'));
    }

    public function edit($id) {
        $laporan_rplc = Laporan_rplc::findOrFail($id);
        return view('pages.LaporanEditC', compact('laporan_rplc'));
    }

    public function update(Request $request, $id) {
        $laporan_rplc  =  Laporan_rplc::findOrFail($id);
        $laporan_rplc -> tanggal = $request->input('tanggal');
        $laporan_rplc -> status_1 = $request->input('status_1');
        $laporan_rplc -> status_2 = $request->input('status_2');
        $laporan_rplc -> status_3 = $request->input('status_3');
        $laporan_rplc -> status_4 = $request->input('status_4');
        $laporan_rplc -> status_5 = $request->input('status_5');
        $laporan_rplc -> save();

        $user = session('user_id');
        $user = Account::find($user);

        Activity::create([
            'user' => $user->username,
            'activity_type' => 'add',
            'activity_details' => 'Menambahkan laporan pada jadwal RPL C hari ' . $laporan_rplc->hari,
        ]);

        session()->flash('showSuccessPopup', true);
        return redirect('/laporanxirplc');
    }

    public function clear()
    {
        Laporan_rplc::query()->update([
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
            'activity_details' => 'Menghapus seluruh laporan pada jadwal RPL C',
        ]);

        session()->flash('showSuccessClear', true);
        return redirect('/laporanxirplc');
    }

    public function downloadExcel()
    {
        return Excel::download(new LaporanRPLCExport, 'laporan_rplc.xlsx');
    }
}
