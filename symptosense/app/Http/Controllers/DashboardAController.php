<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Diagnosis;
use App\Models\Konsultasi;
use App\Models\Pasien;
use App\Models\dokter;
use App\Models\Admin;

class DashboardAController extends Controller
{
    public function dashboardA()
    {
        // Fetch total registered patients
        $totalPatients = DB::table('pasien')->count();
        
        // Fetch total registered doctors
        $totalDoctors = DB::table('dokter')->count();

        // Get the currently authenticated user
        $userId = Auth::id();
        
        // Fetch the admin information based on the authenticated user's ID
        $adminId = DB::table('admin')->where('user_id', $userId)->value('id_admin');
        $admin = Admin::find($adminId);

        // Return the view with the admin data, totalPatients, and totalDoctors
        return view('Admin.dashboardA', compact('admin', 'totalPatients', 'totalDoctors'));
    }

}
