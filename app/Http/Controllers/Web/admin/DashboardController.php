<?php

namespace App\Http\Controllers\Web\admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index')->with([
            'name' => 'hello'
        ]);
    }
}
