<?php

namespace App\Http\Controllers\Web\admin;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index()
    {
        $works = Work::orderBy('id')
            ->withCount('proposals', 'workSkills')
            ->get();

        return view('admin.work.index')->with([
            'works' => $works,
        ]);
    }
}
