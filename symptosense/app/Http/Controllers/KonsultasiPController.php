<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KonsultasiPController extends Controller
{
    public function konsultasiP()
    {
        // Get the current user's ID
        $userId = Auth::id();

        // Retrieve consultations only for the logged-in patient
        $consultations = DB::table('konsultasi')
            ->join('dokter', 'konsultasi.id_dokter', '=', 'dokter.id_dokter')
            ->join('diagnosis', 'konsultasi.id_diagnosis', '=', 'diagnosis.id_diagnosis')
            ->leftJoin('meetings', 'diagnosis.id_diagnosis', '=', 'meetings.id_diagnosis')
            ->where('konsultasi.id_pasien', $userId)
            ->select(
                'dokter.nama_lengkap', 
                'diagnosis.id_diagnosis', 
                'diagnosis.dokumen as diagnosis_dokter', 
                'konsultasi.status',
                'meetings.meeting_link',
                'meetings.status as meeting_status'
            )
            ->get();

        return view('Pasien.konsultasiP', ['consultations' => $consultations]);
    }
}



