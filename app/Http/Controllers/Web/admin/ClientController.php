<?php

namespace App\Http\Controllers\Web\admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index(Request $request)
    {
        $request->validate([
            'location' => ['nullable', 'integer', 'min:1'],
        ]);
        $filter_location = $request->has('location') ? $request->location : null;

        $clients = Client::when(isset($filter_location), fn ($query) => $query->where('location_id', $filter_location))
            ->orderBy('id')
            ->get();

        return view('admin.client.index')->with([
            'clients' => $clients,
        ]);
    }
}
