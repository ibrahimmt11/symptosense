<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Diagnosis;
use App\Models\Konsultasi;
use App\Models\Verifikasi;
use App\Models\Pasien;

class DiagnosisPController extends Controller
{
    public function diagnosisP()
    {
        $userId = Auth::id();
        $pasienId = DB::table('pasien')->where('user_id', $userId)->value('id_pasien');
        $keluhan = DB::table('jeniskeluhan')->select('nama_keluhan')->get();
        $pasien = Pasien::where('user_id', $userId)->first();

        $diagnosisHistory = DB::table('diagnosis')
            ->join('konsultasi', 'diagnosis.id_diagnosis', '=', 'konsultasi.id_diagnosis')
            ->join('dokter', 'konsultasi.id_dokter', '=', 'dokter.id_dokter')
            ->select('dokter.nama_lengkap', 'diagnosis.id_diagnosis', 'diagnosis.hasil_diagnosis', 'diagnosis.dokumen as diagnosis_dokter', 'diagnosis.status', 'konsultasi.hasil_konsul')
            ->where('diagnosis.id_pasien', $pasienId)
            ->get();

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

        return view('Pasien/diagnosisP', [
            'keluhan' => $keluhan,
            'diagnosisHistory' => $diagnosisHistory,
            'pasien' => $pasien,
            'consultations' => $consultations
        ]);
    }

    public function insertDiagnosis($prognosis, $selectedSymptoms)
    {
        $userId = Auth::id();
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

            return $diagnosis->id;
        } catch (\Exception $e) {
            return $e->getMessage();
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
            'gejala_terpilih' => json_encode($validatedData['selected_symptoms']),
            'id_pasien' => $pasienId,
            'id_dokter' => 1,
            'status' => 'Menunggu',
            'dokumen' => 'a',
            'nama_diagnosis' => 'sick',
        ]);

        return response()->json(['success' => true]);
    }

    public function getDoctors()
    {
        $doctors = DB::table('dokter')->select('id_dokter', 'nama_lengkap', 'alamat')->get();
        return response()->json($doctors);
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

    public function getDiagnosisDetails($id_diagnosis)
    {
        $diagnosis = DB::table('diagnosis')
                        ->select('hasil_diagnosis', 'gejala_terpilih')
                        ->where('id_diagnosis', $id_diagnosis)
                        ->first();

        if (!$diagnosis) {
            return response()->json(['error' => 'Diagnosis not found'], 404);
        }

        return response()->json([
            'hasil_diagnosis' => $diagnosis->hasil_diagnosis,
            'gejala_terpilih' => $diagnosis->gejala_terpilih,
        ]);
    }

    public function getNewlyCreatedDiagnosisId($pasien_id)
    {
        $newDiagnosis = DB::table('diagnosis')
            ->where('id_pasien', $pasien_id)
            ->orderBy('created_at', 'desc')
            ->first();

        if ($newDiagnosis) {
            return response()->json(['id' => $newDiagnosis->id_diagnosis]);
        } else {
            return response()->json(['error' => 'No diagnosis found for the given patient ID'], 404);
        }
    }

    public function tambahGejala(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'gejala_baru' => 'required|string|max:255|unique:jeniskeluhan,nama_keluhan',
        ]);

        // Create a new JenisKeluhan record
        JenisKeluhan::create([
            'nama_keluhan' => $validatedData['gejala_baru'],
        ]);

        // Redirect or return a response
        return redirect()->back()->with('success', 'Gejala baru berhasil ditambahkan.');
    }



}
