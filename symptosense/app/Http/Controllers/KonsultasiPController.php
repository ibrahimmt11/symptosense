<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KonsultasiPController extends Controller
{
    public function konsultasiP()
    {
        $userId = Auth::id();

        // Fetch the 'id_pasien' based on the 'user_id'
        $pasienId = DB::table('pasien')->where('user_id', $userId)->value('id_pasien');

        $consultations = DB::table('konsultasi')
            ->join('dokter', 'konsultasi.id_dokter', '=', 'dokter.id_dokter')
            ->join('diagnosis', 'konsultasi.id_diagnosis', '=', 'diagnosis.id_diagnosis')
            ->leftJoin('meetings', 'diagnosis.id_diagnosis', '=', 'meetings.id_diagnosis')
            ->where('konsultasi.id_pasien', $pasienId)
            ->select(
                'dokter.nama_lengkap', 
                'diagnosis.id_diagnosis', 
                'diagnosis.dokumen as diagnosis_dokter', 
                'diagnosis.hasil_diagnosis',
                'konsultasi.status',
                'meetings.meeting_link',
                'meetings.status as meeting_status'
            )
            ->get();

        // Return the view with the consultations data
        return view('Pasien.konsultasiP', ['consultations' => $consultations]);
    }
}



