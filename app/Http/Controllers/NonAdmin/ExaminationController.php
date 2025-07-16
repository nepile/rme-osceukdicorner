<?php

namespace App\Http\Controllers\NonAdmin;

use App\Http\Controllers\Controller;
use App\Http\RestAPI\TesterAPI;
use App\Models\ExamSession;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExaminationController extends Controller
{
    protected $examSessionModel;

    public function __construct()
    {
        $this->examSessionModel = new ExamSession();
    }

    public function index(Request $request): View
    {
        return view('nonadmin.examination', [
            'title' => 'Ujian',
            'active' => 'pemeriksaan'
        ]);
    }

    public function showQuestion($sessionId, $testerId): View
    {
        $session = $this->examSessionModel->where('session_id', $sessionId)->first();
        $tester = TesterAPI::getMergedTesters($sessionId, $testerId)->first();

        $data = [
            'title'     => 'Soal - ' . $tester['name'],
            'tester'    => $tester,
            'session'   => $session,
        ];

        return view('admin.question-management', $data);
    }
}
