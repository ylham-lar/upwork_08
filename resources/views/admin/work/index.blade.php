@extends('admin.layouts.app')

@section('content')
<div class="container-xxl">
    @foreach ($works as $work)
    <div>
        <div>{{$work->id}}</div>
        <div>{{$work->uuid}}</div>
        <div>{{$work->client_id}}</div>
        <div>{{$work->freelancer_id}}</div>
        <div>{{$work->profile_id}}</div>
        <div>{{$work->title}}</div>
        <div>{{$work->body}}</div>
        <div>{{$work->experience_level}}</div>
        <div>{{$work->job_type}}</div>
        <div>{{$work->price}}</div>
        <div>{{$work->number_of_proposals}}</div>
        <div>{{$work->project_type}}</div>
        <div>{{$work->project_length}}</div>
        <div>{{$work->hours_per_week}}</div>
        <div>{{$work->last_viewed}}</div>
    </div>
    @endforeach
</div>
@endsection