<?php

use App\Http\Controllers\DashboardPController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\DiagnosisPController;
use App\Http\Controllers\KeluhanController;
use App\Http\Controllers\KonsultasiDController;
use App\Http\Controllers\KonsultasiPController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengaturanPController;
use App\Http\Controllers\PengaturanDController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RiwayatPController;
use App\Http\Controllers\VerifikasiDiagnosisController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'landing']);
Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/diagnosis', [DiagnosisController::class, 'diagnosis']);

Route::get('/diagnosisP', [DiagnosisPController::class, 'diagnosisP']);
Route::get('/konsultasiP', [KonsultasiPController::class, 'konsultasiP'])->middleware('auth');

Route::get('/konsultasiD', [KonsultasiDController::class, 'konsultasiD']);
Route::get('/verifikasiDiagnosis', [VerifikasiDiagnosisController::class, 'verifikasiDiagnosis']);
Route::get('/keluhan', [KeluhanController::class, 'keluhan']);
Route::get('/pengaturanD', [PengaturanDController::class, 'pengaturanD']);

Route::get('/dashboardP', [DashboardPController::class, 'dashboardP'])
    ->name('dashboardP')
    ->middleware('auth', 'pasien');


Route::get('/dashboardD', [DashboardPController::class, 'dashboardD'])
    ->name('dashboardD')
    ->middleware('auth', 'dokter');


Route::get('/riwayatP', [RiwayatPController::class, 'riwayatP']);
Route::get('/pengaturanP', [PengaturanPController::class, 'index']);
Route::post('/update-profile-pasien', [PengaturanPController::class, 'update']);

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
