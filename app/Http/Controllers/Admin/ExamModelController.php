<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\RestAPI\TesterAPI;
use App\Models\ExamDate;
use App\Models\ExamSession;
use App\Models\Tester;
use App\Models\WaveSession;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;

class ExamModelController extends Controller
{
    protected $examSessionModel;
    protected $examDateModel;
    protected $testerModel;
    protected $waveSesionModel;
    protected $prefixRouteGET;
    protected $prefixRoutePOST;
    protected $prefixRouteDELETE;

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');

        $this->examSessionModel = new ExamSession();
        $this->examDateModel = new ExamDate();
        $this->testerModel = new Tester();
        $this->waveSesionModel = new WaveSession();

        $this->prefixRouteGET = 'create-exam-';
        $this->prefixRoutePOST = 'store-exam-';
        $this->prefixRouteDELETE = 'destroy-exam-';
    }

    public function index(): View
    {
        $data = [
            'title'         => 'Model Ujian',
            'examSessions'  => $this->examSessionModel->with(['examDate', 'testers', 'waveSessions'])->latest()->get()
        ];
        return view('admin.exam-model', $data);
    }

    public function sroute($route): bool
    {
        $method = request()->method();
        $prefixRoute = null;

        if ($method === 'POST') {
            $prefixRoute = $this->prefixRoutePOST;
        } elseif ($method === 'DELETE') {
            $prefixRoute = $this->prefixRouteDELETE;
        } else {
            $prefixRoute = $this->prefixRouteGET;
        }

        return request()->routeIs($prefixRoute . $route);
    }

    public function showCreateExam(): View | RedirectResponse
    {
        if ($this->sroute('date')) {
            $title = 'Tanggal Pelaksanaan';
            $date = $this->examDateModel->where('session_id', null)->first();
        } elseif ($this->sroute('tester')) {
            $title = 'Penguji';

            $testerAPIWithDB = TesterAPI::getMergedTesters(null, null);

            $testerAPI = TesterAPI::getAllTesters();
        } elseif ($this->sroute('session')) {
            $title = 'Sesi Gelombang';
            $wave = $this->waveSesionModel->where('session_id', null)->get();
        }

        $data = [
            'title'             => $title,
            'date'              => $date ?? null,
            'mergedTesters'     => $testerAPIWithDB ?? null,
            'allTesters'        => $testerAPI ?? null,
            'waves'             => $wave ?? null,
        ];

        return view('admin.manage-exam', $data);
    }

    public function storeExam(Request $request): RedirectResponse
    {
        $message = '';
        $messageType = '';

        if ($this->sroute('date')) {
            $date = $request->input('date');
            $dateIsUnavailable = $this->examDateModel->where('date', $date)->first();
            if ($dateIsUnavailable) {
                $message = 'Tanggal ' . $date . ' sudah digunakan';
                $messageType = 'danger';
            } else {
                $this->examDateModel->insert([
                    'session_id'    => null,
                    'date'          => $date,
                ]);
            }
        } elseif ($this->sroute('tester')) {
            $userId = $request->input('user_id');
            $testerIsDuplicate = $this->testerModel->where('user_id', $userId)->where('session_id', null)->first();

            if ($testerIsDuplicate) {
                $message = 'Penguji sudah ditambahkan';
                $messageType = 'danger';
            } else {
                $this->testerModel->insert([
                    'user_id'       => $request->input('user_id'),
                    'session_id'    => null,
                    'created_at'    => now(),
                ]);
            }
        } elseif ($this->sroute('session')) {
            $startTime = $request->input('start_time');
            $endTime = $request->input('end_time');

            $start = Carbon::parse($startTime);
            $end = Carbon::parse($endTime);

            if ($start->diffInMinutes($end, false) < 1) {
                $message = 'Waktu berakhir harus lebih besar 1 menit dari waktu mulai';
                $messageType = 'danger';
            } else {
                $this->waveSesionModel->insert([
                    'session_id'    => null,
                    'start'         => $startTime,
                    'end'           => $endTime
                ]);
            }
        }

        return back()->with($messageType, $message);
    }

    public function destroyExam($id): RedirectResponse
    {
        if ($this->sroute('date')) {
            $this->examDateModel->where('date_id', $id)->delete();
        } elseif ($this->sroute('tester')) {
            $this->testerModel->where('tester_id', $id)->delete();
        } elseif ($this->sroute('session')) {
            $this->waveSesionModel->where('wave_id', $id)->delete();
        }

        return back();
    }

    public function finalizationExam(): RedirectResponse
    {
        $countDate = $this->examDateModel->where('session_id', null)->count();
        $countTester = $this->testerModel->where('session_id', null)->count();
        $countWaveSession = $this->waveSesionModel->where('session_id', null)->count();

        if ($countDate < 1) {
            return back()->with('danger', 'Tanggal ujian belum ditentukan.');
        } elseif ($countTester < 1) {
            return back()->with('danger', 'Penguji belum ditentukan. (minimal 1 penguji)');
        } else if ($countWaveSession < 1) {
            return back()->with('danger', 'Sesi gelombang belum ditentukan. (minimal 1 sesi gelombang).');
        }

        $uuid = (string) Str::uuid();

        $this->examSessionModel->session_id = $uuid;
        $this->examSessionModel->status = 'AKTIF';
        $this->examSessionModel->save();

        $sessionId = $uuid;

        $this->examDateModel->where('session_id', null)->update([
            'session_id'    => $sessionId
        ]);
        $this->testerModel->where('session_id', null)->update([
            'session_id'    => $sessionId
        ]);
        $this->waveSesionModel->where('session_id', null)->update([
            'session_id'    => $sessionId
        ]);

        return redirect()->route('exam-model')->with('success', 'Berhasil membuat sesi ujian');
    }
}
