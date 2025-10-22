<?php

namespace App\Http\Controllers\Web\admin;

use App\Http\Controllers\Controller;
use App\Models\AuthAttempt;
use Illuminate\Http\Request;

class AuthAttemptController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'ip_address' => ['nullable', 'integer', 'min:1'],
            'user_agent' => ['nullable', 'integer', 'min:1'],
            'auth_attempt' => ['nullable', 'integer', 'min:1'],
        ]);
        $filter_ip_address = $request->has('ip_address') ? $request->ip_address : null;
        $filter_user_agent = $request->has('user_agent') ? $request->user_agent : null;
        $filter_auth_attempt = $request->has('auth_attempt') ? $request->auth_attempt : null;

        $authAttempts = AuthAttempt::when(isset($filter_ip_address), fn ($query) => $query->where('ip_address_id', $filter_ip_address))
            ->when(isset($filter_user_agent), fn ($query) => $query->where('user_agent_id', $filter_user_agent))
            ->when(isset($filter_auth_attempt), fn ($query) => $query->where('auth_attempt_id', $filter_auth_attempt))
            ->orderBy('id')
            ->get();

        return view('admin.authattempt.index')->with([
            'authAttempts' => $authAttempts,
        ]);
    }
}
