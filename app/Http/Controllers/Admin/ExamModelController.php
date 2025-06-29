<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExamModelController extends Controller
{
    public function index(): View
    {
        $data = [
            'title'     => 'Model Ujian',
        ];
        return view('admin.exam-model', $data);
    }
}
