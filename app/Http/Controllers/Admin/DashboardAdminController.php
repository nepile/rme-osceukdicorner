<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardAdminController extends Controller
{
    public function index(): View
    {
        $data = [
            'title'     => 'Dasbor Admin'
        ];
        return view('admin.dashboard', $data);
    }
}
