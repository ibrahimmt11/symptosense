<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Show the registration form
    public function show()
    {
        return view('Register.register');
    }

    // Handle the registration request
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',
            'bukti' => 'required' // required for dokter?
            // Add validation for 'role' and file upload if needed
        ]);

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role'),
            'bukti' => $request->file('bukti')->store('post-image', 'public'),
        ]);

        // Log the user in or redirect to login page
        $user->save();

        return redirect('/')->with('success', 'Registration successful!');
    }
}
