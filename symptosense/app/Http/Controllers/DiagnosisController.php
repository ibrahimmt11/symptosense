<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiagnosisController extends Controller
{
    public function diagnosis()
    {
        return view('Diagnosis/diagnosis');
    }
}
