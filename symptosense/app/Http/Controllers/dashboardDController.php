<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Diagnosis;
use App\Models\Konsultasi;
use App\Models\pasien;
use App\Models\dokter;

class dashboardDController extends Controller
{
    public function dashboardD()
    {
        // Fetch total registered patients
        $totalPatients = DB::table('pasien')->count();
        $userId = Auth::id(); 
        $dokterId = DB::table('dokter')->where('user_id', $userId)->value('id_dokter');
        $dokter = dokter::find($dokterId); 
        $dataPasien = pasien::all();

        // Fetch pending diagnoses
        $pendingDiagnoses = DB::table('diagnosis')
            ->where('status', 'Menunggu')
            ->count();

        $categories = [
            'Child' => 0,
            'Teen' => 0,
            'Adult' => 0,
            'Older' => 0,
        ];

        foreach ($dataPasien as $dP) {
            $age = Carbon::parse($dP->tgl_lahir)->age;

            if ($age < 13) {
                $categories['Child']++;
            } elseif ($age < 20) {
                $categories['Teen']++;
            } elseif ($age < 50) {
                $categories['Adult']++;
            } else {
                $categories['Older']++;
            }
        }
    
        return view('Dokter.dashboardD', compact('totalPatients', 'pendingDiagnoses', 'dokter', 'dataPasien', 'categories'));
    }
}
