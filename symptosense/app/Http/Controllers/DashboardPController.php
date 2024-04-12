<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardPController extends Controller
{
    public function dashboardP()
    {
        return view('Pasien/dashboardP');
    }
}
