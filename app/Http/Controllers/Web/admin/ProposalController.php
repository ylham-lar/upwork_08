<?php

namespace App\Http\Controllers\Web\admin;

use App\Models\Proposal;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProposalController extends Controller
{
    public function index()
    {
        $proposals = Proposal::orderBy('id')
            ->get();

        return view('admin.proposal.index')->with([
            'proposals' => $proposals,
        ]);
    }
}
