<?php

namespace App\Http\Controllers\Web\admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('id', 'desc')
            ->get();

        return view('admin.skill.index')->with([
            'skills' => $skills,
        ]);
    }
}
