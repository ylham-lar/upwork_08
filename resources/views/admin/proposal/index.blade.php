@extends('admin.layouts.app')

@section('content')
<div class="container-xxl">
    @foreach ($proposals as $proposal)
    <div>
        <div>{{$proposal->id}}</div>
        <div>{{$proposal->uuid}}</div>
        <div>{{$proposal->work_id}}</div>
        <div>{{$proposal->freelancer_id}}</div>
        <div>{{$proposal->profile_id}}</div>
        <div>{{$proposal->cover_letter}}</div>
        <div>{{$proposal->status}}</div>
    </div>
    @endforeach
</div>
@endsection