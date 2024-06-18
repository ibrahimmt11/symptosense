<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show the login form
    public function show()
    {
        return view('Login.login');
    }

    // Handle the login request
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);



        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $userName = Auth::user()->name;
            if (Auth::user()->role == 'pasien') {
                return redirect()->route('dashboardP'); // Redirect to the patient dashboard
            } elseif (Auth::user()->role == 'dokter') {
                return redirect()->route('dashboardD'); // Redirect to the doctor dashboard
            } else {
                return redirect()->route('dashboardA'); // Redirect to the admin dashboard
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    

    public function logout(Request $request)
    {
        Auth::logout(); // Log the user out

        $request->session()->invalidate(); // Invalidate the session

        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect()->route('login')->with('success', 'You have been logged out.'); 
    }
}