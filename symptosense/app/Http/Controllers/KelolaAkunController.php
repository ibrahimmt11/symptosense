<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelolaAkunController extends Controller
{
    public function kelolaAkun()
    {
        return view('Admin/kelolaAkun');
    }
}
