<?php

namespace App\Http\Controllers\Web\admin;

use App\Http\Controllers\Controller;
use App\Models\Freelancer;
use Illuminate\Http\Request;

class FreelancerController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'location_id' => ['nullable', 'integer', 'min:1'],
            'freelancer_id' => ['nullable', 'integer', 'min:1'],
        ]);
        $filter_location = $request->has('location_id') ? $request->location_id : null;
        $filter_freelancer = $request->has('freelancer_id') ? $request->freelancer_id : null;

        $freelancers = Freelancer::when(isset($filter_location), fn ($query) => $query->where('location_id', $filter_location))
        ->when(isset($filter_freelancer), fn ($query) => $query->where('id', $filter_freelancer))
        ->orderBy('id')
        ->get();

        return view('admin.freelancer.index')->with([
            'freelancers' => $freelancers,
        ]);
    }
}
