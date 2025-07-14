<?php

namespace App\Http\Controllers\NonAdmin\Participant;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ArchivesController extends Controller
{
    /**
     * Display the archive page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data = [
            'title' => 'Arsip Ujian Saya',
            'arsip' => [
                '10 Juli 2025' => [
                    [
                        'nama_ujian' => 'Matematika',
                        'jam' => '08:00 - 09:30',
                        'nilai' => 88
                    ],
                    [
                        'nama_ujian' => 'Bahasa Indonesia',
                        'jam' => '10:00 - 11:30',
                        'nilai' => 74
                    ],
                ],
                '12 Juli 2025' => [
                    [
                        'nama_ujian' => 'IPA',
                        'jam' => '13:00 - 14:30',
                        'nilai' => 60
                    ],
                ],
            ]
        ];

        return view('nonadmin.participant.archives', $data);
    }

}
