<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeluhanController extends Controller
{
    public function keluhan()
    {
        return view('Dokter/keluhan');
    }
}
