<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class LoginController extends Controller
{
    protected $endpointApi;

    public function __construct()
    {
        $this->endpointApi = config('services.api.url');
    }

    public function index(): View | RedirectResponse
    {
        if (session()->has('jwt_token')) {
            return back();
        }
        $title = 'Silakan masuk';
        return view('auth.login', compact('title'));
    }

    public function handleLogin(Request $request): RedirectResponse
    {
        $loginApi = $this->endpointApi . "login-jwt";

        $response = Http::post($loginApi, [
            'email'     => $request->email,
            'password'  => $request->password,
        ]);

        if ($response->failed()) {
            $errorMessage = $response->json(['message']) ?? 'Email atau password salah';
            return back()->with('danger', $errorMessage)->withInput();
        }

        $dataJson = $response->json();

        $data = [
            'token' => $dataJson['token'],
            'user'  => $dataJson['user'],
        ];

        session()->put('jwt_token', $data['token']);
        session()->put('user', $data['user']);

        $role = $data['user']['role'];

        if ($role === 'member') {
            return redirect()->route('dashboard-participant');
        } elseif ($role === 'mentor') {
            return redirect()->route('dashboard-tester');
        }

        return redirect()->route('dashboard-admin');
    }
}
