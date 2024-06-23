<?php

// app/Http/Controllers/NotificationController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class NotificationController extends Controller
{
    public function notifyMeetingStart(Request $request)
    {
        // Simpan notifikasi di cache atau database
        Cache::put('meeting_notification', $request->id_diagnosis, now()->addMinutes(10));
        
        return response()->json(['status' => 'success'], 200);
    }

    public function checkNotification()
    {
        // Cek notifikasi dari cache atau database
        $notification = Cache::get('meeting_notification');
        
        return response()->json(['notification' => $notification]);
    }
}
