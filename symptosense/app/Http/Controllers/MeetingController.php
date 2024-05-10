<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeetingController extends Controller
{
    public function create()
    {
        $roomName = 'meeting_' . auth()->id() . '_' . time();
        return redirect()->route('meeting.join', ['roomName' => $roomName]);
    }

    public function join($roomName)
    {
        // Check user role and permissions
        return view('meeting.join', compact('roomName'));
    }

}
