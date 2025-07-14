<?php

namespace App\Http\Controllers\NonAdmin\Participant;

use App\Http\Controllers\Controller;
use Illuminate\View\View; 
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(): View
    {
        $data = [
            'title' => 'Profil Peserta',
        ];
        return view('nonadmin.participant.profile', $data);
    }
}
