<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\ExaminationManagementController;
use App\Http\Controllers\Admin\ExamModelController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\NonAdmin\Participant\DashboardParticipantController;
use App\Http\Controllers\NonAdmin\Tester\DashboardTesterController;
use App\Http\Controllers\NonAdmin\Participant\ExamDetailController;
use App\Http\Controllers\NonAdmin\ProfileController;
use App\Http\Controllers\NonAdmin\Participant\ArchivesController;
use App\Http\Controllers\NonAdmin\ExaminationController;
use App\Http\Controllers\NonAdmin\DiagnosisController;
use App\Http\Controllers\NonAdmin\TheraphyController;
use App\Http\Controllers\NonAdmin\Tester\AssessmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/handle-login', [LoginController::class, 'handleLogin'])->name('handle-login');
Route::post('/handle-logout', [LogoutController::class, 'handlelogout'])->name('handle-logout');

Route::middleware('jwt.auth.custom')->group(function () {
    Route::middleware('role:admin')->prefix('/admin')->group(function () {
        Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard-admin');
        Route::prefix('/exam-model')->group(function () {
            Route::get('/', [ExamModelController::class, 'index'])->name('exam-model');
            Route::prefix('/create-exam')->group(function () {
                Route::get('/date', [ExamModelController::class, 'showCreateExam'])->name('create-exam-date');
                Route::post('/date', [ExamModelController::class, 'storeExam'])->name('store-exam-date');
                Route::delete('/date/{date_id}', [ExamModelController::class, 'destroyExam'])->name('destroy-exam-date');

                Route::get('/tester', [ExamModelController::class, 'showCreateExam'])->name('create-exam-tester');
                Route::post('/tester', [ExamModelController::class, 'storeExam'])->name('store-exam-tester');
                Route::delete('/tester/{tester_id}', [ExamModelController::class, 'destroyExam'])->name('destroy-exam-tester');

                Route::get('/session', [ExamModelController::class, 'showCreateExam'])->name('create-exam-session');
                Route::post('/session', [ExamModelController::class, 'storeExam'])->name('store-exam-session');
                Route::delete('/session/{session_id}', [ExamModelController::class, 'destroyExam'])->name('destroy-exam-session');

                Route::post('/finalization', [ExamModelController::class, 'finalizationExam'])->name('finalization-exam');
            });
        });
        Route::prefix('/examination-management')->group(function () {
            Route::get('/{session_id}', [ExaminationManagementController::class, 'index'])->name('examination-management');
            Route::get('/question/{session_id}/{tester_id}', [ExaminationController::class, 'showQuestion'])->name('examination-question');
            Route::get('/list-tester')->name('examination-list-tester');
        });
    });

    Route::middleware(['role:member,mentor'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::get('/examination', [ExaminationController::class, 'index'])->name('examination');
        Route::get('/diagnosis', [DiagnosisController::class, 'index'])->name('diagnosis');
        Route::get('/theraphy', [TheraphyController::class, 'index'])->name('theraphy');
    });

    Route::middleware('role:mentor')->prefix('/tester')->group(function () {
        Route::get('/dashboard', [DashboardTesterController::class, 'index'])->name('dashboard-tester');
        Route::get('/assessment/{id}', [AssessmentController::class, 'show'])->name('assessment-tester');
        Route::get('/assessment', [AssessmentController::class, 'index'])->name('assessment');
    });

    Route::middleware('role:member')->prefix('/participant')->group(function () {
        Route::get('/dashboard', [DashboardParticipantController::class, 'index'])->name('dashboard-participant');
        Route::get('/exam-detail', [ExamDetailController::class, 'index'])->name('exam-detail');
        Route::get('/archives', [ArchivesController::class, 'index'])->name('archives');
    });
});
