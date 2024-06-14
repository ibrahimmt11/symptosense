<?php

namespace App\Http\Controllers;
use App\Models\Dokter;
use App\Models\Gejala;
use App\Models\pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KeluhanController extends Controller
{
    public function keluhan()
    {
        // Fetch the authenticated doctor's ID
        $userId = Auth::id();
        $dokterId = DB::table('dokter')->where('user_id', $userId)->value('id_dokter');
        $dataGejala = Gejala::with('pasien')->get();
        // Fetch the doctor's data
        $dokter = Dokter::find($dokterId);

        return view('Dokter.keluhan', compact('dokter','dataGejala'));
    }

    public function updateStatus(Request $request, $id)
    {
        $gejala = Gejala::find($id);

        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('dataset'), $filename);
            $gejala->dataset_baru = $filename;
        }

        // Update the status
        // Gejala::where('id_gejala', $gejala->id_gejala)->update([

        // ]);

        $gejala->status = $request->input('status');
        $gejala->save();

        return response()->json(['success' => true]);
    }

    // public function updateStatus(Request $request, $id)
    // {
    //     $status = $request->input('status');

    //     // Update status di database
    //     $gejala = Gejala::findOrFail($id);
    //     $gejala->status = $status;
    //     $gejala->save();

    //     return redirect('/keluhan')->response()->json(['success' => true]);
    // }
}
