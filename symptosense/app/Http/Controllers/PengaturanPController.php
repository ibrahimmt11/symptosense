<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\pasien;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengaturanPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pasien'] = Pasien::select('pasien.*','users.name as username')
                                    ->leftJoin('users','users.id','=','pasien.user_id')
                                    ->where('user_id',auth()->user()->id)
                                    ->first();
        // dd($data);  
        return view('Pasien.pengaturanP',$data);
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
    public function update(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'tanggalLahir' => 'required',
            'jenisKelamin'  => 'required',
            'noTelp' => 'required',
            'alamat'  => 'required',
            'beratBadan'  => 'required',
            'tinggiBadan' => 'required',
        ]);

        $pasien = Pasien::where('id_pasien',$request->id_pasien)->first();
        $user = User::where('id', $request->id_user)->first();

        if ($request->hasFile('profilePicture')) {
            $file = $request->file('profilePicture');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('/assets/pfp');
            $file->move($destinationPath, $filename);
            $fotoHelperPath = 'assets/pfp/' . $filename;
        } else {
            $fotoHelperPath = null; // atau handle error sesuai kebutuhan Anda
        }

        // Find the Pasien record
        $pasien = Pasien::where('id_pasien',$request->id_pasien)->first();
        $pasien->nama_lengkap = $request->nama;
        $pasien->jenis_kelamin = $request->jenisKelamin;
        $pasien->tgl_lahir = $request->tanggalLahir; 
        $pasien->no_telp = $request->noTelp;
        $pasien->email = $request->email;
        $pasien->alamat = $request->alamat; 
        $pasien->tinggi_badan = $request->tinggiBadan;
        $pasien->berat_badan = $request->beratBadan;
        $pasien->profile_picture = $fotoHelperPath;
        $pasien->save();

        $user = User::where('id',$request->id_user)->first();
        $user->name = $request->nama;
        $user->email = $request->email;
        if($request->password != null){
            $user->password = bcrypt($request->password);
        }
        $user->save();
    
        // Redirect back to the edit page
        return redirect(url('pengaturanP'))->with('message',"Data Updated successfully");;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
