<?php

namespace App\Http\Controllers\Web\admin;

use App\Http\Controllers\Controller;
use App\Models\Freelancer;
use Illuminate\Http\Request;

class FreelancerController extends Controller
{
    public function index()
    {
        $freelancers = Freelancer::orderBy('id')
            ->get();

        return view('admin.freelancer.index')->with([
            'freelancers' => $freelancers,
        ]);
    }
}
