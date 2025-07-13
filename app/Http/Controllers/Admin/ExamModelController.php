<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExamDate;
use App\Models\Tester;
use App\Models\WaveSession;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class ExamModelController extends Controller
{
    protected $examDateModel;
    protected $testerModel;
    protected $waveSesionModel;
    protected $prefixRouteGET;
    protected $prefixRoutePOST;
    protected $prefixRouteDELETE;
    protected $endpointApi;

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');

        $this->examDateModel = new ExamDate();
        $this->testerModel = new Tester();
        $this->waveSesionModel = new WaveSession();

        $this->prefixRouteGET = 'create-exam-';
        $this->prefixRoutePOST = 'store-exam-';
        $this->prefixRouteDELETE = 'destroy-exam-';

        $this->endpointApi = config('services.api.url');
    }

    public function index(): View
    {
        $data = [
            'title'     => 'Model Ujian',
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

            $testerDB = $this->testerModel
                ->whereNull('session_id')
                ->select('tester_id', 'user_id')
                ->get();

            $userIds = $testerDB->pluck('user_id')->toArray();

            $response = Http::get($this->endpointApi . "testers-filter", [
                'user_id' => $userIds
            ]);

            $collectTesterAPIWithDB = collect($response->json('data'));
            $testerAPIWithDB = $testerDB->map(function ($tester) use ($collectTesterAPIWithDB) {
                $apiData = $collectTesterAPIWithDB->firstWhere('user_id', $tester->user_id);
                return [
                    'tester_id' => $tester->tester_id,
                    'user_id'   => $tester->user_id,
                    'name'      => $apiData['name'] ?? null,
                    'email'     => $apiData['email'] ?? null,
                ];
            });

            $testerAPI = Http::get($this->endpointApi . "testers")->json()['data'];
        } elseif ($this->sroute('session')) {
            $title = 'Sesi Gelombang';
            $wave = $this->waveSesionModel->where('session_id', null)->get();
        }

        $data = [
            'title'             => $title,
            'date'              => $date ?? null,
            'testerAPIWithDB'   => $testerAPIWithDB ?? null,
            'testerAPI'         => $testerAPI ?? null,
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
}
