<?php

namespace App\Http\Controllers\Web\admin;

use App\Http\Controllers\Controller;
use App\Models\Verification;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function index()
    {
        $verifications = Verification::orderBy('id')
            ->get();

        return view('admin.verification.index')->with([
            'verifications' => $verifications,
        ]);
    }
}
