<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Str;

class KonsultasiDController extends Controller
{
    public function konsultasiD()
    {
        $userId = Auth::id();

        // Fetch the 'id_dokter' based on the 'user_id'
        $dokterId = DB::table('dokter')->where('user_id', $userId)->value('id_dokter');

        // Fetch consultations for the dokter, including meeting details
        $consultations = DB::table('konsultasi')
            ->join('pasien', 'konsultasi.id_pasien', '=', 'pasien.id_pasien')
            ->join('diagnosis', 'konsultasi.id_diagnosis', '=', 'diagnosis.id_diagnosis')
            ->leftJoin('meetings', 'diagnosis.id_diagnosis', '=', 'meetings.id_diagnosis') // Left join to include meetings
            ->where('konsultasi.id_dokter', $dokterId) // Filter using the fetched 'dokterId'
            ->select(
                'pasien.nama_lengkap', 
                'diagnosis.id_diagnosis', 
                'diagnosis.dokumen as diagnosis_dokter', 
                'konsultasi.status',
                'meetings.meeting_link',
                'meetings.status as meeting_status' // Differentiate meeting status and consultation status
            )
            ->get();

        // Return the view with the consultations data
        return view('Dokter.konsultasiD', ['consultations' => $consultations]);
    }

}
