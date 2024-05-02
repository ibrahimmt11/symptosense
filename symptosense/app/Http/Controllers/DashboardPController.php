<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardPController extends Controller
{
    public function dashboardP()
    {
        $data = User::all();
        return view('Pasien/dashboardP', compact('data'));
    }

    public function dashboardD()
    {
        return view('Dokter/dashboardD');
    }

    public function dashboardA()
    {
        return view('Admin/dashboardA');
    }
}
