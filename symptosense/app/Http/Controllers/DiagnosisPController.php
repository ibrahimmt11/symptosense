<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DiagnosisPController extends Controller
{
    public function diagnosisP()
{
    $userId = Auth::id(); // Assuming you want to filter by logged-in user

    // Fetching symptoms
    $keluhan = DB::table('jeniskeluhan')->select('nama_keluhan')->get();

    // Fetching diagnosis history similar to what you have in KonsultasiP.blade.php
    $diagnosisHistory = DB::table('konsultasi')
        ->join('dokter', 'konsultasi.id_dokter', '=', 'dokter.id_dokter')
        ->join('diagnosis', 'konsultasi.id_diagnosis', '=', 'diagnosis.id_diagnosis')
        ->select('dokter.nama_lengkap', 'diagnosis.id_diagnosis', 'diagnosis.dokumen as diagnosis_dokter', 'konsultasi.status')
        ->where('konsultasi.id_pasien', $userId) // Assuming you want to filter by logged-in user
        ->get();

    return view('Pasien/diagnosisP', [
        'keluhan' => $keluhan,
        'diagnosisHistory' => $diagnosisHistory
    ]);
}

    
}
