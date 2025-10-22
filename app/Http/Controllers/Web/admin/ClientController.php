<?php

namespace App\Http\Controllers\Web\admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('id')
            ->get();

        return view('admin.client.index')->with([
            'clients' => $clients,
        ]);
    }
}
