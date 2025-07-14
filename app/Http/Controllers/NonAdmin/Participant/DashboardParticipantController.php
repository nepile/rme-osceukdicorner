<?php

namespace App\Http\Controllers\NonAdmin\Participant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardParticipantController extends Controller
{
     public function index(): View 
     {
            $data = [
                'title' => 'Dasbor Peserta',
                'exams' => [
                    [
                        'tanggal' => '15 Juli 2025',
                        'penguji' => 2,
                        'gelombang' => 1,
                    ],
                    [
                        'tanggal' => '18 Juli 2025',
                        'penguji' => 3,
                        'gelombang' => 2,
                    ],
                ],
            ];

            return view('nonadmin.participant.dashboard', $data);
        }
}
