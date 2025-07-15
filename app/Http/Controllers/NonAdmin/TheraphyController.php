<?php

namespace App\Http\Controllers\NonAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TheraphyController extends Controller
{
    public function index(Request $request): View
    {
        return view('nonadmin.theraphy', [
            'title' => 'Terapi',
            'active' => 'terapi'
        ]);
    }
}
