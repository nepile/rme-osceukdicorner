<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
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

    public function showCreateExam(): View
    {
        if (request()->routeIs('create-exam-date')) {
            $title = 'Tanggal Pelaksanaan';
        } elseif (request()->routeIs('create-exam-tester')) {
            $title = 'Penguji';
        } elseif (request()->routeIs('create-exam-session')) {
            $title = 'Sesi Gelombang';
        }

        $data = [
            'title'     => $title
        ];

        return view('admin.manage-exam', $data);
    }
}
