<?php

namespace App\Http\Controllers\Web\admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    public function index(Request $request)
    {
        $request->validate([
            'location' => ['nullable', 'integer', 'min:1'],
        ]);
        $filter_location = $request->has('location') ? $request->location : null;

        $objs = Location::when(isset($filter_location), fn ($query) => $query->where('id', $filter_location))
            ->orderBy('id')
            ->get();

        return view('admin.location.index')->with([
            'objs' => $objs,
        ]);
    }

    public function create()
    {
        return view('admin.location.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
        ]);

        $obj = Location::create([
            'name' => $validated['name'],
        ]);

        return to_route('admin.location.index')
            ->with([
                'obj' => $obj,
                'success' => 'Location added',
            ]);
    }

    public function edit(string $id)
    {
        $obj = Location::where('id', $id)->firstOrFail();

        return view('admin.location.edit')->with([
            'obj' => $obj,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:skills,name,' . $id],
        ]);

        $obj = Location::where('id', $id)->firstOrFail();

        $obj->update([
            'name' => $request->name,
        ]);

        return to_route('admin.location.index')
            ->with('success', __('Location Edited Successfully'));
    }

    public function destroy($id)
    {
        $obj = Location::findOrFail($id);
        $obj->delete();

        return to_route('admin.location.index')
            ->with([
                'success' => 'Location deleted',
            ]);
    }
}
