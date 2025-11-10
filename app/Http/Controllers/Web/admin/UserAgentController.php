<?php

namespace App\Http\Controllers\Web\admin;

use App\Http\Controllers\Controller;
use App\Models\UserAgent;
use Illuminate\Http\Request;

class UserAgentController extends Controller
{
    public function index()
    {

        $useragents = UserAgent::orderBy('id')
            ->get();

        return view('admin.useragent.index')->with([
            'useragents' => $useragents,
        ]);
    }
}
