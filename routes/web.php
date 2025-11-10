<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)
   ->group(function () {
       Route::get('', 'index')->name('home');
   });


require 'web/admin.php';
require 'web/client.php';
require 'web/freelancer.php';
