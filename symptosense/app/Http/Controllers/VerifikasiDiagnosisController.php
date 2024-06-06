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
            // ->map(function($item) {
            //     $item->gejala_terpilih = json_decode($item->gejala_terpilih);
            //     return $item;
            // });

        return view('Dokter.verifikasiDiagnosis', compact('consultations'));
    }

    public function update(Request $request, string $id_diagnosis){
        $dataVerif = verifikasiDiagnosis::find($id_diagnosis);

        $request->validate([
            'keterangan' => 'required'
        ]);

        verifikasiDiagnosis::where('id_diagnosis', $dataVerif->id_diagnosis)->update([
            'keterangan' => $request['keterangan']
        ]);

        return redirect('/diagnosisP');
    }
}
