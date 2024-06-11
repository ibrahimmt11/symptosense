<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Diagnosis;
use App\Models\Pasien;
use App\Models\Dokter;
use Illuminate\Support\Facades\Auth;

class VerifikasiDiagnosisController extends Controller
{
    public function verifikasiDiagnosis()
    {
        // Fetch the authenticated doctor's ID
        $userId = Auth::id();
        $dokterId = DB::table('dokter')->where('user_id', $userId)->value('id_dokter');

        // Fetch the doctor's data
        $dokter = Dokter::find($dokterId);

        // Fetch the consultations with diagnosis details for the logged-in doctor
        $consultations = DB::table('konsultasi')
            ->join('diagnosis', 'konsultasi.id_diagnosis', '=', 'diagnosis.id_diagnosis')
            ->join('pasien', 'diagnosis.id_pasien', '=', 'pasien.id_pasien')
            ->where('konsultasi.id_dokter', $dokterId)
            ->select(
                'pasien.nama_lengkap',
                'diagnosis.id_diagnosis',
                'diagnosis.hasil_diagnosis',
                'diagnosis.dokumen as diagnosis_dokter',
                'diagnosis.gejala_terpilih'
            )
            ->get();

        return view('Dokter.verifikasiDiagnosis', compact('consultations', 'dokter'));
    }

    public function update(Request $request, $id_diagnosis)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $diagnosis = Diagnosis::findOrFail($id_diagnosis);
        $diagnosis->status = $request->input('status');
        $diagnosis->save();

        return response()->json(['success' => true]);
    }

    public function saveConsultation(Request $request)
    {
        $validatedData = $request->validate([
            'id_dokter' => 'required|integer',
            'id_diagnosis' => 'required|integer',
        ]);

        $userId = Auth::id();
        $pasienId = DB::table('pasien')->where('user_id', $userId)->value('id_pasien');

        try {
            Konsultasi::create([
                'id_dokter' => $validatedData['id_dokter'],
                'id_pasien' => $pasienId,
                'id_diagnosis' => $validatedData['id_diagnosis'],
                'hasil_konsul' => '',
                'status' => 'Scheduled',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    public function updateConsultation(Request $request)
    {
        // Retrieve the data from the request
        $idDiagnosis = $request->input('id_diagnosis');
        $idDokter = $request->input('id_dokter');
        $verificationOption = $request->input('verificationOption'); // Assuming you're sending the verification option in the request

        // Update the diagnosis record based on the verification option
        if ($verificationOption === 'verify') {
            // Update the status to 'verified'
            DB::table('diagnosis')
                ->where('id_diagnosis', $idDiagnosis)
                ->update(['status' => 'verified']);

            // Optionally, you can save additional data in the konsultasi table
            // ...
        } else {
            // Update the status to 'not verified'
            DB::table('diagnosis')
                ->where('id_diagnosis', $idDiagnosis)
                ->update(['status' => 'not verified']);

            // Optionally, you can save additional data in the konsultasi table
            // ...
        }

        return response()->json(['success' => true]);
    }
}
