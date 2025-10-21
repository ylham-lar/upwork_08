<?php

namespace App\Http\Controllers\Web\admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index()
    {
        $visitors = Visitor::orderBy('id', 'desc')
            ->get();

        return view('admin.visitor.index')->with([
            'visitors' => $visitors,
        ]);
    }
}
