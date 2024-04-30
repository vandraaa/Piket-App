<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AccountController;

use App\Http\Controllers\StudentController;

use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JadwalRPLAController;
use App\Http\Controllers\JadwalRPLBController;
use App\Http\Controllers\JadwalRPLCController;

use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LaporanRPLAController;
use App\Http\Controllers\LaporanRPLBController;
use App\Http\Controllers\LaporanRPLCController;

use App\Http\Controllers\ActivityController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AccountController:: class, 'home']);

// Dashboard
Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->name('dashboard');

Route::get('/dashboard', [AccountController::class, 'dashboard'])->name('pages.dashboard');

// Home
Route::get('/', [HomeController::class, 'index'])->name('pages.home');

// Jadwal
Route::get('/jadwal', [JadwalController::class, 'index'])->name('pages.jadwal');
Route::resource('jadwal', JadwalController::class);

// RPL A
Route::get('/jadwalxirpla', [JadwalRPLAController::class, 'show'])->name('jadwal_rpla');
Route::post('/jadwal/rpla/store', [JadwalRPLAController::class, 'store'])->name('jadwal.rpla.store');
Route::post('/jadwal/rpla/clear', [JadwalRPLAController::class, 'clear'])->name('jadwal.rpla.clear');
Route::delete('/jadwal/rpla/{id}/destroy', [JadwalRPLAController::class, 'destroy'])->name('jadwal.rpla.destroy');
Route::get('/jadwal_rpla/{id}/edit', [JadwalRPLAController::class, 'edit'])->name('jadwal_rpla.edit');
Route::put('/jadwal_rpla/{id}', [JadwalRPLAController::class, 'update'])->name('jadwal_rpla.update');
Route::get('/jadwal-rpla/download-excel', [JadwalRPLAController::class, 'downloadExcel'])->name('jadwal-rpla.download-excel');


// RPL B
Route::post('/jadwal/rplb/store', [JadwalRPLBController::class, 'store'])->name('jadwal.rplb.store');
Route::get('/jadwalxirplb', [JadwalRPLBController::class, 'show'])->name('jadwal_rplb');
Route::post('/jadwal/rplb/clear', [JadwalRPLBController::class, 'clear'])->name('jadwal.rplb.clear');
Route::get('/jadwal_rplb/{id}/edit', [JadwalRPLBController::class, 'edit'])->name('jadwal_rplb.edit');
Route::delete('/jadwal/rplb/{id}/destroy', [JadwalRPLBController::class, 'destroy'])->name('jadwal.rplb.destroy');
Route::put('/jadwal_rplb/{id}', [JadwalRPLBController::class, 'update'])->name('jadwal_rplb.update');
Route::get('/jadwal-rplb/download-excel', [JadwalRPLBController::class, 'downloadExcel'])->name('jadwal-rplb.download-excel');


// RPL C
Route::get('/jadwalxirplc', [JadwalRPLCController::class, 'show'])->name('jadwal_rplc');
Route::post('/jadwal/rplc/store', [JadwalRPLCController::class, 'store'])->name('jadwal.rplc.store');
Route::post('/jadwal/rplc/clear', [JadwalRPLCController::class, 'clear'])->name('jadwal.rplc.clear');
Route::delete('/jadwal/rplc/{id}/destroy', [JadwalRPLCController::class, 'destroy'])->name('jadwal.rplc.destroy');
Route::get('/jadwal_rplc/{id}/edit', [JadwalRPLCController::class, 'edit'])->name('jadwal_rplc.edit');
Route::put('/jadwal_rplc/{id}', [JadwalRPLCController::class, 'update'])->name('jadwal_rplc.update');
Route::get('/jadwal-rplc/download-excel', [JadwalRPLCController::class, 'downloadExcel'])->name('jadwal-rplc.download-excel');

// Account
Route::resource('account', AccountController::class);
Route::post('/account/store', [AccountController::class, 'store'])->name('account.store');
Route::get('/pengguna', [AccountController::class, 'user']);
Route::get('/pengguna/{id}/edit', [AccountController::class, 'edit'])->name('account.edit');
Route::put('/pengguna/{id}', [AccountController::class, 'update'])->name('account.update');

// Datasiswa
Route::resource('student', StudentController::class);
Route::get('/datasiswa', [StudentController::class, 'datasiswa']);
Route::get('/datasiswa/{id}/edit', [StudentController::class, 'edit'])->name('datasiswa.edit');
Route::get('/datasiswa/edit', [StudentController::class, 'showEdit'])->name('datasiswa.show.edit');
Route::put('/datasiswa/{id}', [StudentController::class, 'update'])->name('datasiswa.update');

// Laporan
Route::get('/laporan', [LaporanController::class, 'show'])->name('pages.laporan');
Route::resource('laporan', LaporanController::class);

// Laporan RPL A
Route::get('/laporanxirpla', [LaporanRPLAController::class, 'show'])->name('laporan_rpla');
Route::get('/laporan_rpla/{id}/edit', [LaporanRPLAController::class, 'edit'])->name('laporan_rpla.edit');
Route::post('/laporan_rpla/clear', [LaporanRPLAController::class, 'clear'])->name('laporan_rpla.clear');
Route::put('/laporan_rpla/{id}', [LaporanRPLAController::class, 'update'])->name('laporan_rpla.update');
Route::get('/laporan_rpla/download-excel', [LaporanRPLAController::class, 'downloadExcel'])->name('laporan-rpla.download-excel');

// Laporan RPL B
Route::get('/laporanxirplb', [LaporanRPLBController::class, 'show'])->name('laporan_rplb');
Route::get('/laporan_rplb/{id}/edit', [LaporanRPLBController::class, 'edit'])->name('laporan_rplb.edit');
Route::post('/laporan_rplb/clear', [LaporanRPLBController::class, 'clear'])->name('laporan_rplb.clear');
Route::put('/laporan_rplb/{id}', [LaporanRPLBController::class, 'update'])->name('laporan_rplb.update');
Route::get('/laporan_rplb/download-excel', [LaporanRPLBController::class, 'downloadExcel'])->name('laporan-rplb.download-excel');

// Laporan RPL C
Route::get('/laporanxirplc', [LaporanRPLCController::class, 'show'])->name('laporan_rplc');
Route::get('/laporan_rplc/{id}/edit', [LaporanRPLCController::class, 'edit'])->name('laporan_rplc.edit');
Route::post('/laporan_rplc/clear', [LaporanRPLCController::class, 'clear'])->name('laporan_rplc.clear');
Route::put('/laporan_rplc/{id}', [LaporanRPLCController::class, 'update'])->name('laporan_rplc.update');
Route::get('/laporan_rplc/download-excel', [LaporanRPLCController::class, 'downloadExcel'])->name('laporan-rplc.download-excel');

Route::get('/login', [AccountController::class, 'showLogin']);
Route::post('/login', [AccountController::class, 'login'])->name('login');
Route::get('/logout', [AccountController::class, 'logout'])->name('logout');


// Activity
Route::get('/riwayataktivitas', [ActivityController::class, 'show']);
