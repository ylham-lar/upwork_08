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
            'client' => ['nullable', 'integer', 'min:1'],
        ]);
        $filter_location = $request->has('location') ? $request->location : null;
        $filter_client = $request->has('client') ? $request->client : null;

        $clients = Client::when(isset($filter_location), fn ($query) => $query->where('location_id', $filter_location))
            ->when(isset($filter_client), fn ($query) => $query->where('id', $filter_client))
            ->orderBy('id')
            ->get();

        return view('admin.client.index')->with([
            'clients' => $clients,
        ]);
    }
}
