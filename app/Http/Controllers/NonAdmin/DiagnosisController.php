<?php

namespace App\Http\Controllers\NonAdmin;

use App\Http\Controllers\Controller;
use App\Models\AnswerDiagnosis;
use App\Models\EnrolledParticipant;
use App\Models\Tester;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DiagnosisController extends Controller
{
    protected $testerModel;
    protected $answerDiagnosisModel;
    protected $enrolledParticipantModel;

    public function __construct()
    {
        $this->answerDiagnosisModel = new AnswerDiagnosis();
        $this->testerModel = new Tester();
        $this->enrolledParticipantModel = new EnrolledParticipant();
    }

    public function index($testerId): View
    {
        $tester = $this->testerModel->where('tester_id', $testerId)->first();
        $diagnoses = $this->answerDiagnosisModel->where('tester_id', $testerId)->where('participant_id', session('user.user_id'))->first();

        return view('nonadmin.diagnosis', [
            'title' => 'Diagnosis',
            'active' => 'diagnosis',
            'tester'    => $tester,
            'diagnoses' => $diagnoses,
        ]);
    }

    public function storeDiagnosisAnswer(Request $request): RedirectResponse
    {
        $testerId = $request->input('tester_id');
        $this->answerDiagnosisModel->insert([
            'participant_id'    => session('user.user_id'),
            'tester_id'         => $testerId,
            'diagnosis1'        => $request->input('diagnosis1') ?? null,
            'diagnosis2'        => $request->input('diagnosis2') ?? null,
            'diagnosis3'        => $request->input('diagnosis3') ?? null,
        ]);

        $this->enrolledParticipantModel->where('tester_id', $testerId)->update([
            'diagnosis'     => 'DIKUMPUL',
        ]);

        return back();
    }
}
