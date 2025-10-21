<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\admin\UserController;
use App\Http\Controllers\Web\admin\LoginController;
use App\Http\Controllers\Web\admin\SkillController;
use App\Http\Controllers\Web\admin\ClientController;
use App\Http\Controllers\Web\admin\ReviewController;
use App\Http\Controllers\Web\admin\ProfileController;
use App\Http\Controllers\Web\admin\VisitorController;
use App\Http\Controllers\Web\admin\IpAddresController;
use App\Http\Controllers\Web\admin\LocationController;
use App\Http\Controllers\Web\admin\DashboardController;
use App\Http\Controllers\Web\admin\UserAgentController;
use App\Http\Controllers\Web\admin\FreelancerController;
use App\Http\Controllers\Web\admin\AuthAttemptController;
use App\Http\Controllers\Web\admin\ProposalController;
use App\Http\Controllers\Web\admin\VerificationController;
use App\Http\Controllers\Web\admin\WorkController;

Route::middleware('guest')
    ->group(function () {
        Route::get('login', [LoginController::class, 'create'])->name('login');
        Route::post('login', [LoginController::class, 'store']);
    });

Route::middleware('auth')
    ->group(function () {
        Route::prefix('admin')
            ->name('admin.')
            ->group(function () {
                Route::get('', [DashboardController::class, 'index'])->name('dashboard');
                Route::get('ipaddres', [IpAddresController::class, 'index'])->name('ipaddres');
                Route::get('useragent', [UserAgentController::class, 'index'])->name('useragent');
                Route::get('authattempt', [AuthAttemptController::class, 'index'])->name('authattempt');
                Route::get('visitor', [VisitorController::class, 'index'])->name('visitor');
                Route::get('verification', [VerificationController::class, 'index'])->name('verification');
                Route::get('user', [UserController::class, 'index'])->name('user');
                Route::get('client', [ClientController::class, 'index'])->name('client');
                Route::get('freelancer', [FreelancerController::class, 'index'])->name('freelancer');
                Route::get('profile', [ProfileController::class, 'index'])->name('profile');
                Route::get('skill', [SkillController::class, 'index'])->name('skill');
                Route::get('location', [LocationController::class, 'index'])->name('location');
                Route::get('review', [ReviewController::class, 'index'])->name('review');
                Route::get('work', [WorkController::class, 'index'])->name('work');
                Route::get('proposal', [ProposalController::class, 'index'])->name('proposal');
            });
    });



Route::middleware('auth')
    ->group(function () {
        Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
    });
