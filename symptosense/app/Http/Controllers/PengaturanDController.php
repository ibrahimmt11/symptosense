<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\dokter;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class PengaturanDController extends Controller
{
    public function index()
    {
        $data['dokter'] = dokter::select('dokter.*','users.name as username')
                                    ->leftJoin('users','users.id','=','dokter.user_id')
                                    ->where('user_id',auth()->user()->id)
                                    ->first();
        // dd($data);  
        return view('dokter.pengaturanD',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user(); 
        $dokter = dokter::where('user_id', $user->id)->first();
        return view('dokter.pengaturanD', ['dokter' => $dokter]);
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
        return view('dokter.pengaturanP');
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
        ]);

        // Find the dokter record
        $dokter = dokter::where('id_dokter',$request->id_dokter)->first();
        $dokter->nama_lengkap = $request->nama;
        $dokter->jenis_kelamin = $request->jenisKelamin;
        $dokter->tgl_lahir = $request->tanggalLahir; 
        $dokter->no_telp = $request->noTelp;
        $dokter->email = $request->email;
        $dokter->alamat = $request->alamat; 
        $dokter->save();

        $user = User::where('id',$request->id_user)->first();
        $user->name = $request->nama;
        $user->email = $request->email;
        if($request->password != null){
            $user->password = bcrypt($request->password);
        }
        $user->save();
    
        // Redirect back to the edit page
        return redirect(url('pengaturanD'))->with('message',"Data Updated successfully");;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
