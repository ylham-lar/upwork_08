<?php

namespace App\Http\Controllers\Web\admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'freelancer' => ['nullable', 'integer', 'min:1'],
            'profile' => ['nullable', 'integer', 'min:1'],
        ]);
        $filter_freelancer = $request->has('freelancer') ? $request->freelancer : null;
        $filter_profile = $request->has('profile') ? $request->profile : null;

        $profiles = Profile::when(isset($filter_freelancer), fn ($query) => $query->where('freelancer_id', $filter_freelancer))
            ->when(isset($filter_profile), fn ($query) => $query->where('id', $filter_profile))
            ->orderBy('id')
            ->get();

        return view('admin.profile.index')->with([
            'profiles' => $profiles,
        ]);
    }
}
