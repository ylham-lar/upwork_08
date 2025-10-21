<?php

namespace App\Http\Controllers\Web\admin;

use App\Http\Controllers\Controller;
use App\Models\AuthAttempt;
use Illuminate\Http\Request;

class AuthAttemptController extends Controller
{
    public function index()
    {
        $authAttempts = AuthAttempt::orderBy('id', 'desc')
            ->get();

        return view('admin.authattempt.index')->with([
            'authAttempts' => $authAttempts,
        ]);
    }
}
