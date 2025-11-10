<?php

namespace App\Http\Controllers\Web\admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $objs = Skill::orderBy('id')
            ->get();

        return view('admin.skill.index')->with([
            'objs' => $objs,
        ]);
    }

    public function create()
    {
        return view('admin.skill.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
        ]);

        $obj = Skill::create([
            'name' => $validated['name'],
        ]);

        return to_route('admin.skill.index')
            ->with([
                'obj' => $obj,
                'success' => 'Skill added',
            ]);
    }

    public function edit(string $id)
    {
        $obj = Skill::where('id', $id)->firstOrFail();

        return view('admin.skill.edit')->with([
            'obj' => $obj,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:skills,name,' . $id],
        ]);

        $obj = Skill::where('id', $id)->firstOrFail();

        $obj->update([
            'name' => $request->name,
        ]);

        return to_route('admin.skill.index')
            ->with('success', __('Skill Edited Successfully'));
    }


    public function destroy($id)
    {
        $obj = Skill::findOrFail($id);
        $obj->delete();

        return to_route('admin.skill.index')
            ->with([
                'success' => 'Skill deleted',
            ]);
    }
}
