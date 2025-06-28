<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\NonAdmin\Participant\DashboardParticipantController;
use App\Http\Controllers\NonAdmin\Tester\DashboardTesterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/handle-login', [LoginController::class, 'handleLogin'])->name('handle-login');
Route::post('/handle-logout', [LogoutController::class, 'handlelogout'])->name('handle-logout');

Route::middleware('jwt.auth.custom')->group(function () {
    Route::middleware('role:admin')->prefix('/admin')->group(function () {
        Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard-admin');
    });

    Route::middleware('role:mentor')->prefix('/tester')->group(function () {
        Route::get('/dashboard', [DashboardTesterController::class, 'index'])->name('dashboard-tester');
    });

    Route::middleware('role:member')->prefix('/participant')->group(function () {
        Route::get('/dashboard', [DashboardParticipantController::class, 'index'])->name('dashboard-participant');
    });
});
