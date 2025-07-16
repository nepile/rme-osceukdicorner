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
}
