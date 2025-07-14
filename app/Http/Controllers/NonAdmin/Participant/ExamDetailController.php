<?php

namespace App\Http\Controllers\NonAdmin\Participant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExamDetailController extends Controller
{
    /**
     * Display the exam detail page.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $tanggal = $request->query('tanggal');
        $penguji = (int) $request->query('penguji', 0);
        $jumlah_gelombang = (int) $request->query('gelombang', 1);

        $mapel = [
            'Matematika',
            'Bahasa Indonesia',
            'IPA',
            'Bahasa Inggris',
            'Agama',
            'PKN',
            'IPS',
            'TIK',
            'Seni Budaya',
            'Penjaskes'
        ];

        $mapel_dipakai = array_slice($mapel, 0, $penguji);

        $jam_template = [
            ['08:00', '09:30'],
            ['10:00', '11:30'],
            ['13:00', '14:30'],
            ['15:00', '16:30'],
            ['17:00', '18:30'],
        ];

        $gelombang = [];
        $pengujiKe = 0;

        for ($i = 1; $i <= $jumlah_gelombang; $i++) {
            $ujian = [];

            $max_ujian = ceil($penguji / $jumlah_gelombang);

            for ($j = 1; $j <= $max_ujian && $pengujiKe < $penguji; $j++) {
                $ujian[] = [
                    'nama' => $mapel_dipakai[$pengujiKe],
                    'penguji' => "Penguji " . ($pengujiKe + 1)
                ];
                $pengujiKe++;
            }

            $gelombang[$i] = [
                'jam_mulai' => $jam_template[$i - 1][0],
                'jam_selesai' => $jam_template[$i - 1][1],
                'ujian' => $ujian
            ];
        }

        $data = [
            'title' => 'Detail Ujian Peserta',
            'tanggal' => $tanggal,
            'penguji' => $penguji,
            'jumlah_gelombang' => $jumlah_gelombang,
            'gelombang' => $gelombang
        ];

        return view('nonadmin.participant.exam-detail', $data);
    }
}

