@extends('admin.layouts.app')
@section('content')
<div class="h2 p-3 mb-3">
    Auth Attempts
</div>
<div class="table-responsive text-dark text-center">
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
                <td><a href="{{ route('v1.admin.ipaddress', ['ip_address' => $authattempt->ip_address_id]) }}" target="_blank">{{$work->ip_address->id}}"></a></td>
                <td>{{$authAttempt->user_agent_id}}{{ route('v1.admin.useragent', ['useragent' => $authattempt->useragent_id]) }}" target="_blank">{{$work->useragent->id}}</a></td>
                <td>{{$authAttempt->username}}</td>
                <td>{{$authAttempt->event}}</td>
                <td><i class="bi bi-clock pe-1"></i>{{$authAttempt->created_at->format('H:i:s d.m.Y') }}</td>
                <td><i class="bi bi-clock pe-1"></i>{{$authAttempt->updated_at->format('H:i:s d.m.Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection