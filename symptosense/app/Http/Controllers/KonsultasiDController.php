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

        $consultations = DB::table('konsultasi')
            ->join('pasien', 'konsultasi.id_pasien', '=', 'pasien.id_pasien')
            ->join('diagnosis', 'konsultasi.id_diagnosis', '=', 'diagnosis.id_diagnosis')
            ->leftJoin('meetings', 'diagnosis.id_diagnosis', '=', 'meetings.id_diagnosis')
            ->where('konsultasi.id_dokter', $dokterId)
            ->select(
                'pasien.nama_lengkap', 
                'diagnosis.id_diagnosis', 
                'diagnosis.dokumen as diagnosis_dokter', 
                'konsultasi.status',
                'meetings.meeting_link',
                'meetings.status as meeting_status'
            )
            ->get();

        // Return the view with the consultations data
        return view('Dokter.konsultasiD', ['consultations' => $consultations]);
    }

    public function updateConsultationStatus($id_diagnosis)
    {
        // Update the consultation status to "completed"
        DB::table('konsultasi')
            ->where('id_diagnosis', $id_diagnosis)
            ->update(['status' => 'completed']);

        // Remove the meeting link from the database
        DB::table('meetings')
            ->where('id_diagnosis', $id_diagnosis)
            ->update(['meeting_link' => null]);

        // Redirect back to the consultations page
        return redirect('/konsultasiD');
    }

}
