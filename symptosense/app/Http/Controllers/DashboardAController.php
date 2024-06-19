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
        // Fetch total patients and doctors
        $totalPatients = Pasien::count();
        $totalDoctors = Dokter::count();

        // Categorize patients by age
        $childPatients = Pasien::whereRaw('TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) < 12')->count();
        $teenPatients = Pasien::whereRaw('TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) BETWEEN 12 AND 18')->count();
        $adultPatients = Pasien::whereRaw('TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) BETWEEN 19 AND 59')->count();
        $olderPatients = Pasien::whereRaw('TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) >= 60')->count();

        // Fetch active doctors
        $activeDoctors = Dokter::whereHas('user', function ($query) {
            $query->where('status', 'Aktif');
        })->get();

        return view('Admin.dashboardA', compact('totalPatients', 'totalDoctors', 'childPatients', 'teenPatients', 'adultPatients', 'olderPatients', 'activeDoctors'));
    }


}
