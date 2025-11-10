<?php

namespace App\Http\Controllers\Web\admin;

use App\Models\Location;
use App\Models\Freelancer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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

        $objs = Freelancer::when(isset($filter_location), fn ($query) => $query->where('location_id', $filter_location))
            ->when(isset($filter_freelancer), fn ($query) => $query->where('id', $filter_freelancer))
            ->orderBy('id')
            ->get();

        return view('admin.freelancer.index')->with([
            'objs' => $objs,
        ]);
    }

    public function show($id)
    {
        $obj = Freelancer::where('id', $id)
            ->with('location', 'works.client',  'clientReviews', 'myReviews', 'profiles')
            ->withCount('works')
            ->firstOrFail();

        return view('admin.freelancer.show')->with([
            'obj' => $obj,
        ]);
    }

    public function create()
    {
        $locations = Location::get();

        return view('admin.freelancer.create')
            ->with([
                'locations' => $locations
            ]);
    }


    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'location_id' => ['nullable', 'string', 'between:0,200'],
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048', 'dimensions:width=1000,height=1000'],
            'username' => ['required', 'integer', 'regex:/^(6[0-5]\d{6}|71\d{6})$/', 'unique:freelancers,username'],
            'password' => ['required', 'string', 'between:8,50'],
            'rating' => ['required', 'integer', 'between:0,5'],
            'verified' => ['required', 'integer', 'between:0,1'],
            'total_jobs' => ['required', 'integer', 'min:0'],
            'total_earnings' => ['required', 'integer', 'min:0'],
        ]);
        if ($validated->fails()) {
            return redirect()->back()
                ->withErrors($validated)
                ->withInput();
        }

        $location = Location::findOrFail($request->location_id);

        $objs = Freelancer::create([
            'location_id' => $location->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'avatar' => $request->avatar,
            'username' => $request->username,
            'password' => $request->password,
            'rating' => $request->rating,
            'verified' => $request->verified,
            'total_jobs' => $request->total_jobs,
            'total_earnings' => $request->total_earnings,
        ]);

        return to_route('admin.freelancer.index')
            ->with([
                'objs' => $objs,
                'success' => 'Freelancer added',
            ]);
    }

    public function edit(string $id)
    {
        $locations = Location::get();
        $obj = Freelancer::where('id', $id)->firstOrFail();

        return view('admin.freelancer.edit')
            ->with([
                'locations' => $locations,
                'obj' => $obj
            ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'location_id' => ['nullable', 'string', 'between:0,200'],
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048', 'dimensions:width=1000,height=1000'],
            'username' => ['required', 'integer', 'regex:/^(6[0-5]\d{6}|71\d{6})$/', 'unique:freelancers,username'],
            'password' => ['required', 'string', 'between:8,50'],
            'rating' => ['required', 'numeric', 'between:0,5'],
            'verified' => ['required', 'integer', 'between:0,1'],
            'total_jobs' => ['required', 'integer', 'min:0'],
            'total_earnings' => ['required', 'integer', 'min:0'],
        ]);

        $location = Location::findOrFail($request->location_id);
        $obj = Freelancer::where('id', $id)->firstOrFail();

        $obj->update([
            'location_id' => $location->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'avatar' => $request->avatar,
            'username' => $request->username,
            'password' => $request->password,
            'rating' => $request->rating,
            'verified' => $request->verified,
            'total_jobs' => $request->total_jobs,
            'total_earnings' => $request->total_earnings,
        ]);

        return to_route('admin.freelancer.index')
            ->with('success', __('Freelancer Edited Successfully'));
    }


    public function destroy($id)
    {
        $obj = Freelancer::findOrFail($id);
        $obj->delete();

        return to_route('admin.freelancer.index')
            ->with([
                'success' => 'Freelancer deleted',
            ]);
    }
}
