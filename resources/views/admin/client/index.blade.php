@extends('admin.layouts.app')
@section('content')
<div class="h2 pt-3 mb-3">
    Clients
</div>
<div class="table-responsive text-dark">
    <table class="table table-striped table-hover table-bordered table-sm">
        <thead class="small">
            <tr>
                <th>Id</th>
                <th>Location Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Avatar</th>
                <th>Username</th>
                <th>Rating</th>
                <th>Phone Number Verified</th>
                <th>Payment Method Verified</th>
                <th>Total Jobs</th>
                <th>Total Spent</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{$client->location_id}}</td>
                <td>{{$client->first_name}}</td>
                <td>{{$client->last_name}}</td>
                <td>{{$client->avatar}}</td>
                <td>{{$client->username}}</td>
                <td><i class="bi bi-star-fill text-warning pe-1"></i>{{$client->rating}}</td>
                <td><span class="badge bg-{{ $client->phone_number_verified_color()}}-subtle text-{{ $client->phone_number_verified_color() }}"> {{$client->phone_number_verified()}} </span></td>
                <td><span class="badge bg-{{ $client->payment_method_verified_color()}}-subtle text-{{ $client->payment_method_verified_color() }}"> {{$client->payment_method_verified()}} </span></td>
                <td><i class="bi bi-briefcase pe-1"></i>{{$client->total_jobs}}</td>
                <td><i class="bi bi-currency-dollar pe-1"></i>{{$client->total_spent}}</td>
                <td><i class="bi bi-clock pe-1"></i>{{$client->created_at }}</td>
                <td><i class="bi bi-clock pe-1"></i>{{$client->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection