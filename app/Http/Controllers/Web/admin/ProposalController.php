<?php

namespace App\Http\Controllers\Web\admin;

use App\Http\Controllers\Controller;
use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function index()
    {
        $proposals = Proposal::orderBy('id', 'desc')
            ->get();

        return view('admin.proposal.index')->with([
            'proposals' => $proposals,
        ]);
    }
}
