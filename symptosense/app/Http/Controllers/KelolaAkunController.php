<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Diagnosis;
use App\Models\Konsultasi;
use App\Models\Pasien;
use App\Models\User;

class KelolaAkunController extends Controller
{
    public function kelolaAkun()
    {
        $users = User::all(); // Fetch all users
        return view('Admin.kelolaAkun', compact('users'));
    }

    public function activate($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'Aktif';
        $user->save();

        return redirect()->route('kelola-akun')->with('success', 'User activated successfully.');
    }

    public function deactivate($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'Tidak Aktif';
        $user->save();

        return redirect()->route('kelola-akun')->with('success', 'User deactivated successfully.');
    }
}