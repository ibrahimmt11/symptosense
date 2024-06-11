<?php

namespace App\Http\Controllers;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KeluhanController extends Controller
{
    public function keluhan()
    {
        // Fetch the authenticated doctor's ID
        $userId = Auth::id();
        $dokterId = DB::table('dokter')->where('user_id', $userId)->value('id_dokter');

        // Fetch the doctor's data
        $dokter = Dokter::find($dokterId); 

        return view('Dokter.keluhan', compact('dokter')); 
    }
}
