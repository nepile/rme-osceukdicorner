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
    public function index(): View
    {
        $data = [
            'title' => 'Arsip Ujian',
        ];
        return view('nonadmin.participant.archives', $data);
    }
}
