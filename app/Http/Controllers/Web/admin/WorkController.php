<?php

namespace App\Http\Controllers\Web\admin;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index()
    {
        $works = Work::orderBy('id', 'desc')
            ->get();

        return view('admin.work.index')->with([
            'works' => $works,
        ]);
    }
}
