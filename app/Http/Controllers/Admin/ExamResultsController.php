<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use illuminate\view\View;

class ExamResultsController extends Controller
{
    public function index(Request $request): View
    {
        return view('admin.exam-results', [
            'title' => 'Hasil Ujian'
        ]);
    }
}
