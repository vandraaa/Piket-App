<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal_rpla;
use App\Models\Jadwal_rplb;
use App\Models\Jadwal_rplc;

class HomeController extends Controller
{
    public function index()
    {
        $rpla = Jadwal_rpla::all();
        $rplb = Jadwal_rplb::all();
        $rplc = Jadwal_rplc::all();

        return view('pages.home', compact('rpla', 'rplb', 'rplc'));
    }
}
