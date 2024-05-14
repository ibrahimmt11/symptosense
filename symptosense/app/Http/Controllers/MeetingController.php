<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Str;

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

    public function startMeeting($id_diagnosis) {
        $meetingLink = $this->generateJitsiMeetingLink();
        Meeting::create([
            'id_diagnosis' => $id_diagnosis,
            'meeting_link' => $meetingLink,
            'status' => 'scheduled',
            'scheduled_time' => now()
        ]);
    
        return redirect()->to($meetingLink);
    }
    
    private function generateJitsiMeetingLink() {
        // Generate a unique meeting URL or ID
        return 'https://meet.jit.si/' . Str::random(40);
    }

    public function joinMeeting($id_diagnosis) {
        $meeting = Meeting::where('id_diagnosis', $id_diagnosis)->firstOrFail();
        return redirect()->to($meeting->meeting_link);
    }
    
    

}
