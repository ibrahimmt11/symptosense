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
        //
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
        $user = Auth::user(); // Get the currently authenticated user
        $pasien = pasien::where('user_id', $user->id)->first(); // Find the patient record linked to the user
        

        if ($request->isMethod('post')) {
            // Hanya jalankan logika update jika ini adalah request POST
            $pasien->user_id = $user->id;
            $pasien->nama_lengkap = $request->input('nama_lengkap');
            $pasien->tgl_lahir = $request->input('tanggalLahir');
            $pasien->jenis_kelamin = $request->input('jenisKelamin');
            $pasien->no_telp = $request->input('noTelp');
            $pasien->email = $request->input('email');
            $pasien->alamat = $request->input('alamat');
            $pasien->tinggi_badan = $request->input('tinggiBadan');
            $pasien->berat_badan = $request->input('beratBadan');

            $pasien->save();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pasien = Pasien::find($id);
        return view('Pasien.pengaturanP', ['pasien' => $pasien]);
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
