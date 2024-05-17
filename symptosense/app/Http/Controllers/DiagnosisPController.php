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
    $pasienId = DB::table('pasien')->where('user_id', $userId)->value('id_pasien');
    // Fetching symptoms
    $keluhan = DB::table('jeniskeluhan')->select('nama_keluhan')->get();

    // Fetching diagnosis history similar to what you have in diagnosisP.blade.php
    $diagnosisHistory = DB::table('diagnosis')
        ->join('dokter', 'diagnosis.id_dokter', '=', 'dokter.id_dokter')
        ->select('dokter.nama_lengkap', 'diagnosis.id_diagnosis', 'diagnosis.dokumen as diagnosis_dokter', 'diagnosis.status')
        ->where('diagnosis.id_pasien', $pasienId)
        ->get();


    return view('Pasien/diagnosisP', [
        'keluhan' => $keluhan,
        'diagnosisHistory' => $diagnosisHistory
    ]);
}

    
}
