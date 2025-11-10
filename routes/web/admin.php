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

                Route::controller(IpAddresController::class)
                    ->prefix('ipaddress')
                    ->name('ipaddress.')
                    ->group(function () {
                        Route::get('', 'index')->name('index');
                    });

                Route::controller(UserAgentController::class)
                    ->prefix('useragent')
                    ->name('useragent.')
                    ->group(function () {
                        Route::get('', 'index')->name('index');
                    });

                Route::controller(AuthAttemptController::class)
                    ->prefix('authattempt')
                    ->name('authattempt.')
                    ->group(function () {
                        Route::get('', 'index')->name('index');
                    });

                Route::controller(VisitorController::class)
                    ->prefix('visitor')
                    ->name('visitor.')
                    ->group(function () {
                        Route::get('', 'index')->name('index');
                    });

                Route::controller(VerificationController::class)
                    ->prefix('verification')
                    ->name('verification.')
                    ->group(function () {
                        Route::get('', 'index')->name('index');
                    });

                Route::controller(UserController::class)
                    ->prefix('user')
                    ->name('user.')
                    ->group(function () {
                        Route::get('', 'index')->name('index');
                        Route::get('create', 'create')->name('create');
                        Route::post('', 'store')->name('store');
                        Route::get('{id}/edit', 'edit')->name('edit')->where(['id' => '[0-9]+']);
                        Route::put('{id}', 'update')->name('update')->where('id', '[0-9]+');
                        Route::delete('{id}', 'destroy')->name('destroy')->where('id', '[0-9]+');
                    });

                Route::controller(ClientController::class)
                    ->prefix('client')
                    ->name('client.')
                    ->group(function () {
                        Route::get('', 'index')->name('index');
                        Route::get('{id}', 'show')->name('show')->where(['id' => '[0-9]+']);
                        Route::get('create', 'create')->name('create');
                        Route::post('', 'store')->name('store');
                        Route::get('{id}/edit', 'edit')->name('edit')->where(['id' => '[0-9]+']);
                        Route::put('{id}', 'update')->name('update')->where('id', '[0-9]+');
                        Route::delete('{id}', 'destroy')->name('destroy')->where('id', '[0-9]+');
                    });

                Route::controller(FreelancerController::class)
                    ->prefix('freelancer')
                    ->name('freelancer.')
                    ->group(function () {
                        Route::get('', 'index')->name('index');
                        Route::get('{id}', 'show')->name('show')->where(['id' => '[0-9]+']);
                        Route::get('create', 'create')->name('create');
                        Route::post('', 'store')->name('store');
                        Route::get('{id}/edit', 'edit')->name('edit')->where(['id' => '[0-9]+']);
                        Route::put('{id}', 'update')->name('update')->where('id', '[0-9]+');
                        Route::delete('{id}', 'destroy')->name('destroy')->where('id', '[0-9]+');
                    });
                Route::controller(ProfileController::class)
                    ->prefix('profile')
                    ->name('profile.')
                    ->group(function () {
                        Route::get('', 'index')->name('index');
                        Route::get('{id}', 'show')->name('show')->where(['id' => '[0-9]+']);
                        Route::get('create', 'create')->name('create');
                        Route::post('', 'store')->name('store');
                        Route::get('{id}/edit', 'edit')->name('edit')->where(['id' => '[0-9]+']);
                        Route::put('{id}', 'update')->name('update')->where('id', '[0-9]+');
                        Route::delete('{id}', 'destroy')->name('destroy')->where('id', '[0-9]+');
                    });

                Route::controller(SkillController::class)
                    ->prefix('skill')
                    ->name('skill.')
                    ->group(function () {
                        Route::get('', 'index')->name('index');
                        Route::get('create', 'create')->name('create');
                        Route::post('', 'store')->name('store');
                        Route::get('{id}/edit', 'edit')->name('edit')->where(['id' => '[0-9]+']);
                        Route::put('{id}', 'update')->name('update')->where('id', '[0-9]+');
                        Route::delete('{id}', 'destroy')->name('destroy')->where('id', '[0-9]+');
                    });

                Route::controller(LocationController::class)
                    ->prefix('location')
                    ->name('location.')
                    ->group(function () {
                        Route::get('', 'index')->name('index');
                        Route::get('create', 'create')->name('create');
                        Route::post('', 'store')->name('store');
                        Route::get('{id}/edit', 'edit')->name('edit')->where(['id' => '[0-9]+']);
                        Route::put('{id}', 'update')->name('update')->where('id', '[0-9]+');
                        Route::delete('{id}', 'destroy')->name('destroy')->where('id', '[0-9]+');
                    });

                Route::controller(WorkController::class)
                    ->prefix('work')
                    ->name('work.')
                    ->group(function () {
                        Route::get('', 'index')->name('index');
                        Route::get('{id}', 'show')->name('show')->where(['id' => '[0-9]+']);
                        Route::delete('{id}', 'destroy')->name('destroy')->where('id', '[0-9]+');
                    });

                Route::controller(ReviewController::class)
                    ->prefix('review')
                    ->name('review.')
                    ->group(function () {
                        Route::get('', 'index')->name('index');
                    });

                Route::controller(ProposalController::class)
                    ->prefix('proposal')
                    ->name('proposal.')
                    ->group(function () {
                        Route::get('', 'index')->name('index');
                        Route::get('{id}', 'show')->name('show')->where(['id' => '[0-9]+']);
                    });
            });
    });

Route::middleware('auth')
    ->group(function () {
        Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
    });
