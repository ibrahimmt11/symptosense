<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Diagnosis; // Import the Diagnosis model

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

    public function insertDiagnosis($prognosis, $selectedSymptoms) {
        $userId = Auth::id(); // Assuming you want to filter by logged-in user
        $pasienId = DB::table('pasien')->where('user_id', $userId)->value('id_pasien');
        try {
            $diagnosis = new Diagnosis;
            $diagnosis->hasil_diagnosis = $prognosis;
            $diagnosis->gejala_terpilih = $selectedSymptoms;
            $diagnosis->id_pasien = $pasienId;
            $diagnosis->id_dokter = "";
            $diagnosis->status = "";
            $diagnosis->dokumen = "";
            $diagnosis->save();

            return $diagnosis->id; // Returns the ID of the newly created record
        } catch (\Exception $e) {
            return $e->getMessage(); // Handle exception by returning the error message
        }
    }

    public function saveDiagnosis(Request $request)
    {
        $validatedData = $request->validate([
            'prognosis' => 'required|string',
            'selected_symptoms' => 'required|array',
        ]);

        $userId = Auth::id();
        $pasienId = DB::table('pasien')->where('user_id', $userId)->value('id_pasien');

        Diagnosis::create([
            'hasil_diagnosis' => $validatedData['prognosis'],
            'gejala_terpilih' => json_encode($validatedData['selected_symptoms']), // Store as JSON
            'id_pasien' => $pasienId,
            'id_dokter' => 1,
            'status' => 'Menunggu',
            'dokumen' => 'a',
            'nama_diagnosis' => 'sick',
        ]);

        return response()->json(['success' => true]);
    }

}
