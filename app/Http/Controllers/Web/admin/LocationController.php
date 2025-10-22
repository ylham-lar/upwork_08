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

        $locations = Location::when(isset($filter_location), fn ($query) => $query->where('id', $filter_location))
            ->orderBy('id')
            ->get();

        return view('admin.location.index')->with([
            'locations' => $locations,
        ]);
    }
}
