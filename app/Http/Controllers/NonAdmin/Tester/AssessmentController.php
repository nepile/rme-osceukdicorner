<?php

namespace App\Http\Controllers\NonAdmin\Tester;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AssessmentController extends Controller
{
    public function show($id): View
    {
        return view('nonadmin.tester.assessment', [
            'title' => 'Penilaian Peserta',
            'active' => 'penilaian',
        ]);
    }
}
