<?php

namespace App\Http\Controllers\NonAdmin\Participant;

use App\Http\Controllers\Controller;
use App\Http\RestAPI\TesterAPI;
use App\Models\EnrolledParticipant;
use App\Models\ExamSession;
use App\Models\WaveSession;
use Illuminate\Http\Request;

class ExamDetailController extends Controller
{
    protected $examSessionModel;
    protected $waveSessionModel;
    protected $enrolledParticipantModel;

    public function __construct()
    {
        $this->examSessionModel = new ExamSession();
        $this->waveSessionModel = new WaveSession();
        $this->enrolledParticipantModel = new EnrolledParticipant();
    }

    /**
     * Display the exam detail page.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index($sessionId)
    {
        $session = $this->examSessionModel->with(['examDate', 'testers'])->where('session_id', $sessionId)->first();
        $waveSessions = $this->waveSessionModel->where('session_id', $sessionId)->get();

        $data = [
            'title' => 'Detail Ujian Peserta',
            'session' => $session,
            'testers' => TesterAPI::getMergedTesters($sessionId, null),
            'waves' => $waveSessions,
            'participant' => $this->enrolledParticipantModel->where('participant_id', session('user.user_id'))->first(),
        ];

        return view('nonadmin.participant.exam-detail', $data);
    }
}
