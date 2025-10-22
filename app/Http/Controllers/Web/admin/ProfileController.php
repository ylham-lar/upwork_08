<?php

namespace App\Http\Controllers\Web\admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::orderBy('id')
            ->get();

        return view('admin.profile.index')->with([
            'profiles' => $profiles,
        ]);
    }
}
