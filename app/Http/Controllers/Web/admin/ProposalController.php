<?php

namespace App\Http\Controllers\Web\admin;

use App\Models\Proposal;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProposalController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'work' => ['nullable', 'integer', 'min:1'],
            'freelancer' => ['nullable', 'integer', 'min:1'],
            'profile' => ['nullable', 'integer', 'min:1'],
            'proposal' => ['nullable', 'integer', 'min:1'],
        ]);
        $filter_work = $request->has('work') ? $request->work : null;
        $filter_freelancer = $request->has('freelancer') ? $request->freelancer : null;
        $filter_profile = $request->has('profile') ? $request->profile : null;
        $filter_proposal = $request->has('proposal') ? $request->proposal : null;

        $proposals = Proposal::when(isset($filter_work), fn ($query) => $query->where('work_id', $filter_work))
            ->when(isset($filter_freelancer), fn ($query) => $query->where('freelancer_id', $filter_freelancer))
            ->when(isset($filter_profile), fn ($query) => $query->where('profile_id', $filter_profile))
            ->when(isset($filter_proposal), fn ($query) => $query->where('id', $filter_proposal))
            ->orderBy('id')
            ->get();

        return view('admin.proposal.index')->with([
            'proposals' => $proposals,
        ]);
    }
}
