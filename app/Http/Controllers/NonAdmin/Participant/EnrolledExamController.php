<?php

namespace App\Http\Controllers\Nonadmin\Participant;

use App\Http\Controllers\Controller;
use App\Models\EnrolledParticipant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EnrolledExamController extends Controller
{
    public function enrolled($testerId): RedirectResponse
    {
        EnrolledParticipant::insert([
            'participant_id'    => session('user.user_id'),
            'participant_name'    => session('user.name'),
            'participant_email'    => session('user.email'),
            'tester_id'     => $testerId,
            'start'         => now(),
        ]);

        return redirect()->route('examination', $testerId);
    }
}
