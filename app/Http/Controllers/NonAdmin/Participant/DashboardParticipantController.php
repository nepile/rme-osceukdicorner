<?php

namespace App\Http\Controllers\NonAdmin\Participant;

use App\Http\Controllers\Controller;
use App\Models\ExamSession;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardParticipantController extends Controller
{
    protected $examSessionModel;

    public function __construct()
    {
        $this->examSessionModel = new ExamSession();
    }

    public function index(): View
    {
        $data = [
            'title' => 'Dasbor Peserta',
            'exams' => $this->examSessionModel->with(['examDate', 'testers', 'waveSessions'])->get()
        ];

        return view('nonadmin.participant.dashboard', $data);
    }
}
