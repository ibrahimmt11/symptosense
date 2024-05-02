<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiagnosisPController extends Controller
{
    public function diagnosisP()
    {
        $keluhan = DB::table('jeniskeluhan')->select('nama_keluhan')->get();

        return view('Pasien/diagnosisP', ['keluhan' => $keluhan]);
    }
}
