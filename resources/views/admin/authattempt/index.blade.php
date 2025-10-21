@extends('admin.layouts.app')

@section('content')
<div class="container-xxl">
    @foreach ($authAttempts as $authAttempt)
    <div>
        <div>{{$authAttempt->id}}</div>
        <div>{{$authAttempt->ip_address_id}}</div>
        <div>{{$authAttempt->user_agent_id}}</div>
        <div>{{$authAttempt->username}}</div>
        <div>{{$authAttempt->event}}</div>
        <div>{{$authAttempt->created_at}}</div>
    </div>
    @endforeach
</div>
@endsection