<?php

namespace App\Http\Controllers\NonAdmin\Participant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardParticipantController extends Controller
{
    public function index(): View
    {
        $data = [
            'title'     => 'Dasbor Peserta'
        ];
        return view('nonadmin.participant.dashboard', $data);
    }
}
