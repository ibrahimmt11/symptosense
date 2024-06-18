<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Diagnosis;
use App\Models\Konsultasi;
use App\Models\Pasien;
use App\Models\dokter;

class dashboardDController extends Controller
{
    public function dashboardD()
    {
        // Fetch total registered patients
        $userId = Auth::id(); 
        $dokterId = DB::table('dokter')->where('user_id', $userId)->value('id_dokter');
        $dokter = Dokter::find($dokterId); 

        // Fetch pending diagnoses
        $pendingDiagnoses = DB::table('diagnosis')
            ->where('status', 'Menunggu')
            ->count();

        return view('Dokter.dashboardD', compact('totalPatients', 'pendingDiagnoses', 'dokter'));
    }
}
