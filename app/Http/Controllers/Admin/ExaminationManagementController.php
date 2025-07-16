<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\RestAPI\TesterAPI;
use App\Models\ExamSession;
use App\Models\Question;
use App\Models\SubQuestion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExaminationManagementController extends Controller
{
    protected $examSessionModel;
    protected $questionModel;
    protected $subQuestionModel;

    public function __construct()
    {
        $this->examSessionModel = new ExamSession();
        $this->questionModel = new Question();
        $this->subQuestionModel = new SubQuestion();
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

    public function showQuestion($sessionId, $testerId): View
    {
        $session = $this->examSessionModel->where('session_id', $sessionId)->first();
        $tester = TesterAPI::getMergedTesters($sessionId, $testerId)->first();

        $data = [
            'title'     => 'Soal - ' . $tester['name'],
            'tester'    => $tester,
            'session'   => $session,
            'questions' => $this->questionModel->with('subQuestions')->where('tester_id', $testerId)->get()
        ];

        return view('admin.question-management', $data);
    }

    public function createExaminationQuestion(Request $request): RedirectResponse
    {
        $questionName = $request->input('question_name');
        $testerId = $request->input('tester_id');

        $this->questionModel->insert([
            'question_name' => $questionName,
            'tester_id'     => $testerId
        ]);

        return back()->with('success', 'Soal telah ditambahkan');
    }

    public function deleteExaminationQuestion($questionId): RedirectResponse
    {
        $this->questionModel->where('question_id', $questionId)->delete();

        return back()->with('warning', 'Soal telah dihapus');
    }

    public function updateExaminationQuestion(Request $request, $questionId): RedirectResponse
    {
        $questionName = $request->input('question_name');

        $this->questionModel->where('question_id', $questionId)->update([
            'question_name' => $questionName
        ]);

        return back()->with('success', 'Soal berhasil diperbarui');
    }

    public function createExaminationSubQuestion(Request $request): RedirectResponse
    {
        $subQuestionName = $request->input('subquestion_name');
        $questionId = $request->input('question_id');

        if ($request->hasFile('subquestion_image')) {
            $subQuestionImage = $request->file('subquestion_image');
            $imgName = time() . $subQuestionImage->getClientOriginalName();
            $destinationImgPath = public_path('img/subquestion/');

            $subQuestionImage->move($destinationImgPath, $imgName);
        }

        $this->subQuestionModel->insert([
            'subquestion_name'  => $subQuestionName,
            'subquestion_image' => $imgName ?? null,
            'question_id'    => $questionId
        ]);

        return back()->with('success', 'Sub Soal telah ditambahkan');
    }

    public function deleteExaminationSubQuestion($subQuestionId): RedirectResponse
    {
        $subQuestion = $this->subQuestionModel->where('subquestion_id', $subQuestionId)->first();

        if ($subQuestion && $subQuestion->subquestion_image) {
            $imagePath = public_path('img/subquestion/' . $subQuestion->subquestion_image);

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $this->subQuestionModel->where('subquestion_id', $subQuestionId)->delete();

        return back()->with('warning', 'Soal telah dihapus beserta gambarnya (jika ada).');
    }

    public function updateExaminationSubQuestion(Request $request, $subQuestionId): RedirectResponse
    {
        $subQuestionName = $request->input('subquestion_name');

        $subQuestion = $this->subQuestionModel->where('subquestion_id', $subQuestionId)->first();

        $dataUpdate = [
            'subquestion_name' => $subQuestionName
        ];

        if ($request->hasFile('subquestion_image')) {
            if ($subQuestion && $subQuestion->subquestion_image) {
                $oldImagePath = public_path('img/subquestion/' . $subQuestion->subquestion_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $newImage = $request->file('subquestion_image');
            $newImageName = time() . $newImage->getClientOriginalName();
            $destinationPath = public_path('img/subquestion/');
            $newImage->move($destinationPath, $newImageName);

            $dataUpdate['subquestion_image'] = $newImageName;
        }

        $this->subQuestionModel->where('subquestion_id', $subQuestionId)->update($dataUpdate);

        return back()->with('success', 'Sub Soal berhasil diperbarui');
    }
}
