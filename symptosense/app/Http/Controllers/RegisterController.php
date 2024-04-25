<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\pasien;
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
            'bukti' => 'required' ,// required for dokter?
            // Add validation for 'role' and file upload if needed
        ]);

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role'),
            'bukti' => $request->file('bukti')->store('post-image', 'public'),
        ]);
        
        $user->save();

        if ($request->input('role') === 'pasien') {
            $pasien = new Pasien([
                'user_id' => $user->id,
                'nama_lengkap' => $request->input('name'),
                'jenis_kelamin' => $request->input('jenis_kelamin') ?: null, 
                'tgl_lahir' => $request->input('tgl_lahir') ?: null, 
                'no_telp' => $request->input('no_telp') ?: null, 
                'email' => $request->input('email'),
                'alamat' => $request->input('alamat') ?: null, 
                'tinggi_badan' => $request->input('tinggi_badan') ?: null, 
                'berat_badan' => $request->input('berat_badan') ?: null, 
                'NIK' => $request->input('NIK') ?: null,
                ]);
    
            $pasien->save();
        }


        return redirect('/')->with('success', 'Registration successful!');
    }
}
