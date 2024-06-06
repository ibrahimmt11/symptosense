<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Diagnosis;
use App\Models\Konsultasi;


class DashboardPController extends Controller
{
    public function dashboardP()
    {
        $userId = Auth::id();
        $pasienId = DB::table('pasien')->where('user_id', $userId)->value('id_pasien');

        // Fetch total distinct doctors for consultations of the logged-in patient
        $totalConsultations = DB::table('konsultasi')
        ->where('id_pasien', $pasienId)
        ->count();

        // Fetch total diagnoses
        $totalDiagnoses = DB::table('diagnosis')
            ->where('id_pasien', $pasienId)
            ->count();

        // Fetch pending diagnoses
        $pendingDiagnoses = DB::table('diagnosis')
            ->where('id_pasien', $pasienId)
            ->where('status', 'Menunggu')
            ->count();

        // Fetch consultations data
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

        return view('Pasien/dashboardP', compact('totalConsultations', 'totalDiagnoses', 'pendingDiagnoses', 'consultations'));
    }

    public function dashboardD()
    {
        return view('Dokter/dashboardD');
    }

    public function dashboardA()
    {
        return view('Admin/dashboardA');
    }
}
