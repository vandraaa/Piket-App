<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Account;
use App\Models\Schedule;
use App\Models\Laporan_rplb;
use App\Models\Jadwal_rplb;
use App\Models\Activity;
use App\Exports\LaporanRPLBExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class LaporanRPLBController extends Controller
{

    public function show() {
        if (!session('logged_in')) {
            return redirect()->route('login');
        }

        $user = session('user_id');
        $user = Account::find($user);
        $laporanB = Laporan_rplb::all();

        return view('pages.laporan_rplb', compact('laporanB', 'user'));
    }

    public function edit($id) {
        $laporan_rplb = Laporan_rplb::findOrFail($id);
        return view('pages.LaporanEditB', compact('laporan_rplb'));
    }

    public function update(Request $request, $id) {
        $laporan_rplb  =  Laporan_rplb::findOrFail($id);
        $laporan_rplb -> tanggal = $request->input('tanggal');
        $laporan_rplb -> status_1 = $request->input('status_1');
        $laporan_rplb -> status_2 = $request->input('status_2');
        $laporan_rplb -> status_3 = $request->input('status_3');
        $laporan_rplb -> status_4 = $request->input('status_4');
        $laporan_rplb -> status_5 = $request->input('status_5');
        $laporan_rplb -> save();

        $user = session('user_id');
        $user = Account::find($user);

        Activity::create([
            'user' => $user->username,
            'activity_type' => 'add',
            'activity_details' => 'Menambahkan laporan pada jadwal RPL B hari ' . $laporan_rplb->hari,
        ]);

        session()->flash('showSuccessPopup', true);
        return redirect('/laporanxirplb');
    }

    public function clear()
    {
        Laporan_rplb::query()->update([
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
            'activity_details' => 'Menghapus seluruh laporan pada jadwal RPL B',
        ]);

        session()->flash('showSuccessClear', true);
        return redirect('/laporanxirplb');
    }

    public function downloadExcel()
    {
        return Excel::download(new LaporanRPLBExport, 'laporan_rplb.xlsx');
    }
}
