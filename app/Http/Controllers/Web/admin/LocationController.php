<?php

namespace App\Http\Controllers\Web\admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::orderBy('id', 'desc')
            ->get();

        return view('admin.location.index')->with([
            'locations' => $locations,
        ]);
    }
}
