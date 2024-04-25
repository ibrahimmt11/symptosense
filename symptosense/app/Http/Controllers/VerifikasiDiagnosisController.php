<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerifikasiDiagnosisController extends Controller
{
    public function VerifikasiDiagnosis()
    {
        return view('Dokter/verifikasiDiagnosis');
    }
}
