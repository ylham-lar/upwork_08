<?php

namespace App\Http\Controllers\Web\admin;

use App\Models\Client;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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

        $objs = Client::when(isset($filter_location), fn ($query) => $query->where('location_id', $filter_location))
            ->when(isset($filter_client), fn ($query) => $query->where('id', $filter_client))
            ->orderBy('id')
            ->get();

        return view('admin.client.index')->with([
            'objs' => $objs,
        ]);
    }

    public function show($id)
    {
        $objs = Client::where('id', $id)
            ->with('location', 'works.freelancer', 'freelancerReviews', 'myReviews')
            ->withCount('works')
            ->firstOrFail();

        return view('admin.client.show')->with([
            'objs' => $objs,
        ]);
    }

    public function create()
    {
        $locations = Location::get();

        return view('admin.client.create')
            ->with([
                'locations' => $locations,
            ]);
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'location_id' => ['nullable', 'string', 'between:0,200'],
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048', 'dimensions:width=1000,height=1000'],
            'username' => ['required', 'string', 'max:50', 'unique:clients,username'],
            'password' => ['required', 'string', 'between:8,50'],
            'rating' => ['nullable', 'numeric', 'between:0,5'],
            'phone_number_verified' => ['nullable', 'boolean'],
            'payment_method_verified' => ['nullable', 'boolean'],
            'total_jobs' => ['nullable', 'integer', 'min:0'],
            'total_spent' => ['nullable', 'integer', 'min:0'],
            'previous_freelancers' => ['nullable', 'json'],
        ]);

        if ($validated->fails()) {
            return redirect()->back()
                ->withErrors($validated)
                ->withInput();
        }

        $objs = Client::create([
            'location_id' => $request->location_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'avatar' => $request->avatar,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'rating' => $request->rating ?? 0,
            'phone_number_verified' => $request->phone_number_verified ?? 0,
            'payment_method_verified' => $request->payment_method_verified ?? 0,
            'total_jobs' => $request->total_jobs ?? 0,
            'total_spent' => $request->total_spent ?? 0,
            'previous_freelancers' => $request->previous_freelancers,
        ]);
        return to_route('admin.client.index')
            ->with([
                'objs' => $objs,
                'success' => 'Client added',
            ]);
    }






    public function edit(string $id)
    {
        $locations = Location::get();
        $obj = Client::where('id', $id)->firstOrFail();

        return view('admin.client.edit')->with([
            'locations' => $locations,
            'obj' => $obj,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'location_id' => ['nullable', 'string', 'between:0,200'],
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048', 'dimensions:width=1000,height=1000'],
            'username' => ['required', 'string', 'max:100', 'unique:clients,username,' . $id],
            'password' => ['nullable', 'string', 'between:8,50'],
            'rating' => ['required', 'numeric', 'between:0,5'],
            'phone_number_verified' => ['required', 'boolean'],
            'payment_method_verified' => ['required', 'boolean'],
            'total_jobs' => ['required', 'integer', 'min:0'],
            'total_spent' => ['required', 'integer', 'min:0'],
        ]);

        $location = Location::findOrFail($request->location_id);
        $obj = Client::where('id', $id)->firstOrFail();

        $obj->update([
            'location_id' => $location->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'avatar' => $request->avatar,
            'username' => $request->username,
            'rating' => $request->rating,
            'phone_number_verified' => $request->phone_number_verified,
            'payment_method_verified' => $request->payment_method_verified,
            'total_jobs' => $request->total_jobs,
            'total_spent' => $request->total_spent,
        ]);

        return to_route('admin.client.index')
            ->with('success', __('Client Edited Successfully'));
    }






















    public function destroy($id)
    {
        $obj = Client::findOrFail($id);
        $obj->delete();

        return to_route('admin.client.index')
            ->with([
                'success' => 'Client deleted',
            ]);
    }
}
