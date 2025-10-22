@extends('admin.layouts.app')
@section('content')
<div class="h2 pt-3 mb-3">
    Auth Attempts
</div>
<div class="table-responsive text-dark">
    <table class="table table-striped table-hover table-bordered table-sm">
        <thead class="small">
            <tr>
                <th>Id</th>
                <th>Ip Addres Id</th>
                <th>User Agent Id</th>
                <th>Username</th>
                <th>Event</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($authAttempts as $authAttempt)
            <tr class="p-3">
                <td>{{ $authAttempt->id }}</td>
                <td>{{$authAttempt->ip_address_id}}</td>
                <td>{{$authAttempt->user_agent_id}}</td>
                <td>{{$authAttempt->username}}</td>
                <td>{{$authAttempt->event}}</td>
                <td><i class="bi bi-clock pe-1"></i>{{$authAttempt->created_at }}</td>
                <td><i class="bi bi-clock pe-1"></i>{{$authAttempt->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection