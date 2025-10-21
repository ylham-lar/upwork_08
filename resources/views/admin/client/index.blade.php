@extends('admin.layouts.app')

@section('content')
<div class="container-xxl">
    @foreach ($clients as $client)
    <div>
        <div>{{$client->id}}</div>
        <div>{{$client->uuid}}</div>
        <div>{{$client->location_id}}</div>
        <div>{{$client->first_name}}</div>
        <div>{{$client->last_name}}</div>
        <div>{{$client->avatar}}</div>
        <div>{{$client->username}}</div>
        <div>{{$client->password}}</div>
        <div>{{$client->rating}}</div>
        <div>{{$client->phone_number_verified}}</div>
        <div>{{$client->payment_method_verified}}</div>
        <div>{{$client->total_jobs}}</div>
        <div>{{$client->total_spent}}</div>
        <div>{{$client->total_spent}}</div>
        <div>previous_freelancers</div>
    </div>
    @endforeach
</div>
@endsection