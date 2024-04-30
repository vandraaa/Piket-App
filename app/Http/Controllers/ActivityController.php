<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Activity;

class ActivityController extends Controller
{
    public function show() {
        if (!session('logged_in')) {
            return redirect()->route('login');
        }

        $i = 1;
        $user = session('user_id');
        $user = Account::find($user);
        $activities = Activity::latest()->paginate(10);

        if ($user->role === 'GUEST' || $user->role === 'ADMIN A' || $user->role === 'ADMIN B' || $user->role === 'ADMIN C') {
            return redirect()->route('pages.dashboard');
        }

        return view('pages.activity', compact('user', 'activities', 'i'));
    }

    // public function dashboard() {
    //     $history = Activity::all();
    //     $countHistory = Activity::count();

    //     return view('pages.dashboard', compact('history', 'countHistory'));
    // }
}
