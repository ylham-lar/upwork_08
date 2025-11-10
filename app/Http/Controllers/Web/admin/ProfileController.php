<?php

namespace App\Http\Controllers\Web\admin;

use App\Models\Profile;
use App\Models\Freelancer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'freelancer_id' => ['nullable', 'integer', 'min:1'],
            'profile_id' => ['nullable', 'integer', 'min:1'],
        ]);
        $filter_freelancer = $request->has('freelancer_id') ? $request->freelancer_id : null;
        $filter_profile = $request->has('profile_id') ? $request->profile_id : null;

        $objs = Profile::when(isset($filter_freelancer), fn($query) => $query->where('freelancer_id', $filter_freelancer))
            ->when(isset($filter_profile), fn($query) => $query->where('id', $filter_profile))
            ->orderBy('id')
            ->get();

        return view('admin.profile.index')->with([
            'objs' => $objs,
        ]);
    }

    public function show($id)
    {
        $obj = Profile::where('id', $id)
            ->with('freelancer')
            ->firstOrFail();

        return view('admin.profile.show')->with([
            'obj' => $obj,
        ]);
    }

    public function create(Request $request)
    {
        $freelancers = Freelancer::all();
        $selectedFreelancer = null;

        if ($request->has('freelancer_id')) {
            $selectedFreelancer = Freelancer::find($request->freelancer_id);
        }

        return view('admin.profile.create', [
            'freelancers' => $freelancers,
            'selectedFreelancer' => $selectedFreelancer,
        ]);
    }


    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'freelancer_id' => ['nullable', 'string', 'min:0'],
            'title' => ['required', 'string', 'min:0'],
            'body' => ['required', 'string', 'min:0'],
        ]);
        if ($validated->fails()) {
            return redirect()->back()
                ->withErrors($validated)
                ->withInput();
        }

        $freelancer = Freelancer::findOrFail($request->freelancer_id);

        $objs = Profile::create([
            'uuid' => (string)Str::uuid(),
            'freelancer_id' => $freelancer->id,
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return to_route('admin.profile.index')
            ->with([
                'objs' => $objs,
                'success' => 'Profile added',
            ]);
    }

    public function edit(string $id)
    {
        $freelancer = Freelancer::get();
        $obj = Profile::where('id', $id)->firstOrFail();

        return view('admin.profile.edit')
            ->with([
                'freelancer' => $freelancer,
                'obj' => $obj
            ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'freelancer_id' => ['nullable', 'string', 'min:0'],
            'title' => ['required', 'string', 'min:0'],
            'body' => ['required', 'string', 'min:0'],
        ]);

        $freelancer = Freelancer::findOrFail($request->freelancer_id);
        $obj = Profile::where('id', $id)->firstOrFail();

        $obj->update([
            'uuid' => (string)Str::uuid(),
            'freelancer_id' => $freelancer->id,
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return to_route('admin.profile.index')
            ->with('success', __('Profile Edited Successfully'));
    }

    public function destroy($id)
    {
        $obj = Profile::findOrFail($id);
        $obj->delete();

        return to_route('admin.profile.index')
            ->with([
                'success' => 'Profile deleted',
            ]);
    }
}
