<?php

namespace App\Http\Controllers\NonAdmin;

use App\Http\Controllers\Controller;
use App\Http\RestAPI\TesterAPI;
use App\Models\AnswerExamination;
use App\Models\EnrolledParticipant;
use App\Models\ExamSession;
use App\Models\Question;
use App\Models\Tester;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExaminationController extends Controller
{
    protected $examSessionModel;
    protected $questionModel;
    protected $testerModel;
    protected $answerExaminationModel;
    protected $enrolledParticipantModel;

    public function __construct()
    {
        $this->examSessionModel = new ExamSession();
        $this->questionModel = new Question();
        $this->testerModel = new Tester();
        $this->answerExaminationModel = new AnswerExamination();
        $this->enrolledParticipantModel = new EnrolledParticipant();
    }

    public function index($testerId): View
    {
        $examinationQuestions = $this->questionModel->with('subQuestions')->where('tester_id', $testerId)->get();
        $tester = $this->testerModel->where('tester_id', $testerId)->first();

        return view('nonadmin.examination', [
            'title'     => 'Pemeriksaan',
            'active'    => 'pemeriksaan',
            'questions' => $examinationQuestions,
            'tester'    => $tester,
            'checkStatus' => $this->answerExaminationModel->where('participant_id', session('user.user_id'))->whereHas('subquestion.question', function ($query) use ($testerId) {
                $query->where('tester_id', $testerId);
            })->where('status', 'DIKUMPUL')->first()
        ]);
    }

    public function storeExaminationAnswer(Request $request): RedirectResponse
    {
        $this->answerExaminationModel->insert([
            'participant_id'        => session('user.user_id'),
            'subquestion_id'        => $request->input('subquestion_id'),
            'answer'                => $request->input('answer') ?? null
        ]);

        return back();
    }

    public function deleteExaminationAnswer($answerExaminationId): RedirectResponse
    {
        $this->answerExaminationModel->where('answerexamination_id', $answerExaminationId)->delete();
        return back();
    }

    public function finalizationExaminationAnswer(Request $request): RedirectResponse
    {
        $testerId = $request->input('tester_id');
        $participantId = session('user.user_id');

        $this->answerExaminationModel
            ->where('participant_id', $participantId)
            ->whereHas('subquestion.question', function ($query) use ($testerId) {
                $query->where('tester_id', $testerId);
            })
            ->update([
                'status'     => 'DIKUMPUL'
            ]);

        $this->enrolledParticipantModel->where('tester_id', $testerId)->update([
            'examination'   => 'DIKUMPUL',
        ]);

        return back()->with('success', 'Finalisasi berhasil.');
    }
}
