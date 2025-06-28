<?php

namespace App\Http\Controllers\NonAdmin\Tester;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardTesterController extends Controller
{
    public function index(): View
    {
        $data = [
            'title'     => 'Dasbor Penguji'
        ];
        return view('nonadmin.tester.dashboard', $data);
    }
}
