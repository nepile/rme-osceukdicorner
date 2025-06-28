<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function handleLogout(): RedirectResponse
    {
        session()->forget(['jwt_token', 'user']);
        return redirect()->route('login')->with('info', 'Anda telah keluar dari sesi.');
    }
}
