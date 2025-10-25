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
            'location_id' => ['nullable', 'integer', 'min:1'],
            'client_id' => ['nullable', 'integer', 'min:1'],
        ]);
        $filter_location = $request->has('location_id') ? $request->location_id : null;
        $filter_client = $request->has('client_id') ? $request->client_id : null;

        $clients = Client::when(isset($filter_location), fn ($query) => $query->where('location_id', $filter_location))
            ->when(isset($filter_client), fn ($query) => $query->where('id', $filter_client))
            ->orderBy('id')
            ->get();

        return view('admin.client.index')->with([
            'clients' => $clients,
        ]);
    }

    public function show($id)
    {

        $clients = Client::find($id);

        return view('admin.client.show')->with([
            'clients' => $clients,
        ]);
    }
}
