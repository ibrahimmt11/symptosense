<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use Illuminate\Support\Facades\Auth; 

class RiwayatPController extends Controller
{
    public function riwayatP()
    {
        $userId = Auth::id(); 
        $pasien = Pasien::where('user_id', $userId)->first(); // Fetch the patient data
        return view('Pasien/riwayatP', ['pasien' => $pasien]); // Pass the $pasien object to the view
    }
}
