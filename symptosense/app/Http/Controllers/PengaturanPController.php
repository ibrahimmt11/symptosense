<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\pasien;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PengaturanPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Pasien.pengaturanP');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user(); 
        $pasien = pasien::where('user_id', $user->id)->first();
        return view('Pasien.pengaturanP', ['pasien' => $pasien]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('Pasien.pengaturanP');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email',
            'tgl_lahir' => 'required',
            'jenis_kelamin'  => 'required',
            'no_telp' => 'required',
            'alamat'  => 'required',
            'berat_badan'  => 'required',
            'tinggi_badan' => 'required',
        ]);

        // Find the Pasien record
        $pasien = Pasien::findOrFail($id);

        // Update the Pasien record with validated data
        $pasien->fill($validatedData);
        $pasien->save();

        // Flash a success message
        flash('Data updated')->success();

        // Redirect back to the edit page
        return redirect()->route('edit.pengaturanP', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
