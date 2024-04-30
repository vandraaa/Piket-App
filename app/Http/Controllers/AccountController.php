<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Account;
use App\Models\Schedule;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    // public function show() {
    //     if (!session('logged_in')) {
    //         return redirect()->route('login');
    //     }

    //     $userId = session('user_id');

    //     return view('pages.dashboard', ['user' => Account::find($userId)]);
    // }

    public function home() {
        return view('pages.home');
    }

    // public function index()
    // {
    //     $account = Account::all();
    //     $jumlahData = Account::count();
    //     $student = Student::all();
    //     $jumlahDataSiswa = Student::count();
    //     $i = 1;
    //     $userId = session('user_id');

    //     return view('pages.dashboard', [ 'jumlahData', 'jumlahDataSiswa', 'student', 'i', 'account', 'user' => Account::find($userId)]);
    // }

    public function dashboard()
    {
        if (!session('logged_in')) {
            return redirect()->route('login');
        }

        $account = Account::all();
        $jumlahData = Account::count();
        $student = Student::all();
        $jumlahDataSiswa = Student::count();
        $countActivity = Activity::count();
        $i = 1;

        $user = session('user_id');
        $user = Account::find($user);

        return view('pages.dashboard', compact('jumlahData', 'countActivity', 'jumlahDataSiswa', 'student', 'i', 'account', 'user'));
    }

    public function user()
    {
        if (!session('logged_in')) {
            return redirect()->route('login');
        }

        $account = Account::paginate(10);
        $jumlahData = Account::count();
        $student = Student::all();
        $jumlahDataSiswa = Student::count();
        $i = 1;

        $user = session('user_id');
        $user = Account::find($user);

        if ($user->role === 'GUEST' || $user->role === 'ADMIN A' || $user->role === 'ADMIN B' || $user->role === 'ADMIN C') {
            return redirect()->route('pages.dashboard');
        }

        return view('pages.user', compact('jumlahData', 'jumlahDataSiswa', 'student', 'i', 'account', 'user'));
    }

    public function store(Request $request) {
        $account = new Account();
        $account -> nama = $request->input('nama');
        $account -> username = $request->input('username');
        $account -> password = $request->input('password');
        $account -> role = $request->input('role');
        $account -> save();

        $user = session('user_id');
        $user = Account::find($user);

        Activity::create([
            'user' => $user->username,
            'activity_type' => 'add',
            'activity_details' => 'Menambah account dengan username ' . $request->input('username'),
        ]);

        session()->flash('showSuccessAdd', true);
        return redirect()->back();
    }

    public function edit($id) {
        $account = Account::findOrFail($id);
        return view ('pages.userEdit', compact('account'));
    }

    public function update(Request $request, $id) {
        $account = Account::findOrFail($id);
        $account->nama = $request->input('nama');
        $account->username = $request->input('username');
        $account->password = $request->input('password');
        $account->role = $request->input('role');
        $account->save();

        $user = session('user_id');
        $user = Account::find($user);

        Activity::create([
            'user' => $user->username,
            'activity_type' => 'update',
            'activity_details' => 'Mengedit account dengan username ' . $request->input('username'),
        ]);

        session()->flash('showSuccessPopup', true);
        return redirect('/pengguna');
    }

    public function destroy(Account $account) {
        $account -> delete();

        $user = session('user_id');
        $user = Account::find($user);

        Activity::create([
            'user' => $user->username,
            'activity_type' => 'delete',
            'activity_details' => 'Menghapus account dengan username ' . $account->username,
        ]);

        session()->flash('showSuccessDelete', true);
        return redirect()->back();
    }

    public function showLogin() {
        if (Auth::check()) {
            return redirect()->route('pages.dashboard');
        }

        return view('pages.login');
    }

    public function login(Request $request) {
        $username = $request->input('username');
        $password = $request->input('password');

        $account = Account::where('username', $username)
                        ->where('password', $password)
                        ->first();

        if ($account) {
            session(['logged_in' => true, 'user_id' => $account->id]);

            // Script to show the welcome card
            $script = "<script>document.getElementById('welcome-card').style.display = 'block';</script>";

            // Return the dashboard view along with the script
            return redirect()->route('pages.dashboard')->with('script', $script);
        } else {
            return redirect()->back()->withErrors(['error' => 'Account not found.']);
        }
    }

    public function logout()
    {
        session()->forget('logged_in');
        return redirect()->route('login');
    }
}
