<?php

namespace App\Http\Controllers\NonAdmin;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Profile',
        ];
        return view('nonadmin.profile', $data);
    }
}
