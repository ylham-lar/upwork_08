<?php

namespace App\Http\Controllers\Web\admin;

use App\Models\Work;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class WorkController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'client_id' => ['nullable', 'integer', 'min:1'],
            'freelancer_id' => ['nullable', 'integer', 'min:1'],
            'profile_id' => ['nullable', 'integer', 'min:1'],
            'work_id' => ['nullable', 'integer', 'min:1'],
        ]);

        $filter_client = $request->has('client_id') ? $request->client_id : null;
        $filter_freelancer = $request->has('freelancer_id') ? $request->freelancer_id : null;
        $filter_profile = $request->has('profile_id') ? $request->profile_id : null;
        $filter_work = $request->has('work_id') ? $request->work_id : null;

        $works = Work::when(isset($filter_client), fn ($query) => $query->where('client_id', $filter_client))
            ->when(isset($filter_freelancer), fn ($query) => $query->where('freelancer_id', $filter_freelancer))
            ->when(isset($filter_profile), fn ($query) => $query->where('profile_id', $filter_profile))
            ->when(isset($filter_work), fn ($query) => $query->where('id', $filter_work))
            ->withCount('proposals', 'workSkills')
            ->orderBy('id')
            ->get();

        return view('admin.work.index')->with([
            'works' => $works,
        ]);
    }
    public function show(Request $request)
    {
        $request->validate([
            'client_id' => ['nullable', 'integer', 'min:1'],
            'freelancer_id' => ['nullable', 'integer', 'min:1'],
            'profile_id' => ['nullable', 'integer', 'min:1'],
            'work_id' => ['nullable', 'integer', 'min:1'],
        ]);

        $filter_client = $request->has('client_id') ? $request->client_id : null;
        $filter_freelancer = $request->has('freelancer_id') ? $request->freelancer_id : null;
        $filter_profile = $request->has('profile_id') ? $request->profile_id : null;
        $filter_work = $request->has('work_id') ? $request->work_id : null;

        $works = Work::when(isset($filter_client), fn ($query) => $query->where('client_id', $filter_client))
            ->when(isset($filter_freelancer), fn ($query) => $query->where('freelancer_id', $filter_freelancer))
            ->when(isset($filter_profile), fn ($query) => $query->where('profile_id', $filter_profile))
            ->when(isset($filter_work), fn ($query) => $query->where('id', $filter_work))
            ->withCount('proposals', 'workSkills')
            ->orderBy('id')
            ->get();

        return view('admin.work.show')->with([
            'works' => $works,
        ]);
    }
}
