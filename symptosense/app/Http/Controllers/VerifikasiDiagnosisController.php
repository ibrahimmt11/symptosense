<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Diagnosis;
use App\Models\Pasien;
use App\Models\Dokter;

class VerifikasiDiagnosisController extends Controller
{
    public function verifikasiDiagnosis()
    {
        $consultations = DB::table('diagnosis')
            ->join('pasien', 'diagnosis.id_pasien', '=', 'pasien.id_pasien')
            ->join('dokter', 'diagnosis.id_dokter', '=', 'dokter.id_dokter')
            ->select(
                'pasien.nama_lengkap',
                'diagnosis.id_diagnosis',
                'diagnosis.hasil_diagnosis',
                'diagnosis.dokumen as diagnosis_dokter',
                'diagnosis.gejala_terpilih'
            )
            ->get();

        return view('Dokter.verifikasiDiagnosis', compact('consultations'));
    }
}
