<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DashboardPController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\DiagnosisPController;
use App\Http\Controllers\KelolaAkunController;
use App\Http\Controllers\KeluhanController;
use App\Http\Controllers\KonsultasiDController;
use App\Http\Controllers\KonsultasiPController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengaturanAController;
use App\Http\Controllers\PengaturanPController;
use App\Http\Controllers\PengaturanDController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RiwayatPController;
use App\Http\Controllers\VerifikasiDiagnosisController;
use App\Http\Controllers\MeetingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'landing']);
Route::get('/artikel', [ArtikelController::class, 'artikel']);
Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/diagnosis', [DiagnosisController::class, 'diagnosis']);

Route::get('/diagnosisP', [DiagnosisPController::class, 'diagnosisP']);
Route::post('/save-diagnosis', [DiagnosisPController::class, 'store']);
Route::get('/konsultasiP', [KonsultasiPController::class, 'konsultasiP'])->middleware('auth');

Route::get('/konsultasiD', [KonsultasiDController::class, 'konsultasiD'])->middleware('auth');;
Route::get('/verifikasiDiagnosis', [VerifikasiDiagnosisController::class, 'verifikasiDiagnosis']);
Route::get('/keluhan', [KeluhanController::class, 'keluhan']);


Route::get('/pengaturanD', [PengaturanDController::class, 'index']);
Route::post('/update-profile-dokter', [PengaturanDController::class, 'update']);

Route::get('/dashboardA', [DashboardPController::class, 'dashboardA']);
Route::get('/pengaturanA', [PengaturanAController::class, 'pengaturanA']);
Route::get('/kelolaAkun', [KelolaAkunController::class, 'kelolaAkun']);

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

// Define routes for creating and joining Jitsi Meet rooms
Route::get('/meeting/create', [MeetingController::class, 'create'])->name('meeting.create');
Route::get('/meeting/join/{roomName}', [MeetingController::class, 'join'])->name('meeting.join');

Route::get('/meetings/start/{id_diagnosis}', [MeetingController::class, 'startMeeting'])->name('meetings.start');

Route::post('/save-diagnosis', [DiagnosisPController::class, 'saveDiagnosis']);
// Fetch all doctors
Route::get('/doctors', [DiagnosisPController::class, 'getDoctors']);

// Save consultation
Route::post('/save-consultation', [DiagnosisPController::class, 'saveConsultation']);

Route::get('/get-diagnosis-details/{id_diagnosis}', [DiagnosisPController::class, 'getDiagnosisDetails']);

Route::get('/get-newly-created-diagnosis-id/{pasien_id}', [DiagnosisPController::class, 'getNewlyCreatedDiagnosisId']);

Route::post('/consultations/{id_diagnosis}/complete', [KonsultasiDController::class, 'updateConsultationStatus'])->name('consultations.complete');
