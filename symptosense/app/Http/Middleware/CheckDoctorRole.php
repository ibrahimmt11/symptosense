<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symphony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckDoctorRole
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() && Auth::user()->role == 'dokter') { 
            return $next($request);
        }

        return redirect()->route('login')->with('error', 'You must be logged in as a patient to access this area.');
    }
}
