<?php

namespace App\Http\Controllers\NonAdmin;

use App\Http\Controllers\Controller;
use App\Models\AnswerTherapy;
use App\Models\EnrolledParticipant;
use App\Models\Tester;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TheraphyController extends Controller
{
    protected $testerModel;
    protected $answerTherapyModel;
    protected $enrolledParticipantModel;

    public function __construct()
    {
        $this->answerTherapyModel = new AnswerTherapy();
        $this->testerModel = new Tester();
        $this->enrolledParticipantModel = new EnrolledParticipant();
    }

    public function index($testerId): View
    {
        $tester = $this->testerModel->where('tester_id', $testerId)->first();
        $therapy = $this->answerTherapyModel->where('tester_id', $testerId)->where('participant_id', session('user.user_id'))->first();

        return view('nonadmin.theraphy', [
            'title' => 'Terapi',
            'active' => 'terapi',
            'tester'    => $tester,
            'therapy' => $therapy,
        ]);
    }

    public function storeTherapyAnswer(Request $request): RedirectResponse
    {
        $testerId = $request->input('tester_id');
        $this->answerTherapyModel->insert([
            'participant_id'    => session('user.user_id'),
            'tester_id'         => $testerId,
            'rslash1'           => $request->input('rslash1'),
            'rslash2'           => $request->input('rslash2'),
            'rslash3'           => $request->input('rslash3'),
            'rslash4'           => $request->input('rslash4'),
        ]);

        $this->enrolledParticipantModel->where('tester_id', $testerId)->update([
            'therapy'   => 'DIKUMPUL'
        ]);

        return back();
    }
}
