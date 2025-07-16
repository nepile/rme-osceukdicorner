<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\RestAPI\TesterAPI;
use App\Models\ExamSession;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExaminationManagementController extends Controller
{
    protected $examSessionModel;

    public function __construct()
    {
        $this->examSessionModel = new ExamSession();
    }

    public function index($sessionId): View
    {
        $examSession = $this->examSessionModel->where('session_id', $sessionId)->first();
        $data = [
            'title'         => 'Manajemen Soal',
            'session'       => $examSession,
            'mergedTesters' => TesterAPI::getMergedTesters($sessionId, null),
        ];
        return view('admin.examination-management', $data);
    }
}
