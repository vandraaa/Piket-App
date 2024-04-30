<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Account;
use App\Models\Activity;

class StudentController extends Controller
{
    public function datasiswa()
    {
        if (!session('logged_in')) {
            return redirect()->route('login');
        }

        $userId = session('user_id');

        $account = Account::all();
        $jumlahData = Account::count();
        $student = Student::paginate(15);
        $jumlahDataSiswa = Student::count();
        $i = 1;

        $user = session('user_id');
        $user = Account::find($user);

        return view('pages.datasiswa', compact(
            'jumlahData',
            'jumlahDataSiswa',
            'student',
            'i',
            'account',
            'user'
        ));
    }

    public function store(Request $request) {
        if (!session('logged_in')) {
            return redirect()->route('login');
        }

        $student = new Student();
        $student -> nama_siswa = $request->input('nama');
        $student -> kelas = $request->input('kelas');
        $student -> nis = $request->input('nis');
        $student -> save();

        $user = session('user_id');
        $user = Account::find($user);

        Activity::create([
            'user' => $user->username,
            'activity_type' => 'add',
            'activity_details' => 'Menambah data siswa dengan nama ' . $request->input('nama'),
        ]);

        session()->flash('showSuccessAdd', true);
        return redirect()->back();
    }

    public function destroy(Student $student) {
        $student -> delete();
        $user = session('user_id');
        $user = Account::find($user);

        Activity::create([
            'user' => $user->username,
            'activity_type' => 'delete',
            'activity_details' => 'Menghapus data siswa dengan nama ' . $student->nama_siswa,
        ]);

        session()->flash('showSuccessDelete', true);
        return redirect()->back();
    }

    public function edit($id) {
        $s = Student::findOrFail($id);
        $user = session('user_id');
        $user = Account::find($user);

        return view('pages.datasiswaEdit', compact('s', 'user'));
    }

    public function update(Request $request, $id) {
        $s = Student::findOrFail($id);
        $s->nama_siswa = $request->input('nama');
        $s->kelas = $request->input('kelas');
        $s->nis = $request->input('nis');
        $s->save();

        $user = session('user_id');
        $user = Account::find($user);

        Activity::create([
            'user' => $user->username,
            'activity_type' => 'update',
            'activity_details' => 'Mengedit data siswa dengan nama ' . $s->nama_siswa,
        ]);

        session()->flash('showSuccessPopup', true);
        return redirect('/datasiswa');
    }
}
