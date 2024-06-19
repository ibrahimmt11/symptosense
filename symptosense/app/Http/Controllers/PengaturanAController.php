<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PengaturanAController extends Controller
{
    public function index()
    {
        $admin = Auth::user(); // Assuming the logged-in user is an admin
        return view('Admin.pengaturanA', compact('admin'));
    }

    public function update(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'tanggalLahir' => 'required|date',
            'jenisKelamin' => 'required|string',
            'noTelp' => 'required|string',
            'alamat' => 'required|string',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $admin = Auth::user();

        if ($request->hasFile('profilePicture')) {
            $file = $request->file('profilePicture');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('assets/pfp', $filename, 'public');
            $admin->profile_picture = $filePath;
        }

        $admin->name = $request->nama;
        $admin->email = $request->email;
        $admin->tgl_lahir = $request->tanggalLahir;
        $admin->jenis_kelamin = $request->jenisKelamin;
        $admin->no_telp = $request->noTelp;
        $admin->alamat = $request->alamat;

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect()->route('pengaturanA')->with('success', 'Profile updated successfully.');
    }
}
