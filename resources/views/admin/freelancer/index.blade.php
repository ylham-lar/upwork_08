@extends('admin.layouts.app')

@section('content')
<div class="container-xxl">
    @foreach ($freelancers as $freelancer)
    <div>
        <div>{{$freelancer->id}}</div>
        <div>{{$freelancer->uuid}}</div>
        <div>{{$freelancer->location_id}}</div>
        <div>{{$freelancer->first_name}}</div>
        <div>{{$freelancer->last_name}}</div>
        <div>{{$freelancer->avatar}}</div>
        <div>{{$freelancer->username}}</div>
        <div>{{$freelancer->password}}</div>
        <div>{{$freelancer->rating}}</div>
        <div>{{$freelancer->verified}}</div>
        <div>{{$freelancer->total_jobs}}</div>
        <div>{{$freelancer->total_earnings}}</div>
        <div>previous_freelancers</div>
    </div>
    @endforeach
</div>
@endsection