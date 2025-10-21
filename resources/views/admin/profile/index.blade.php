@extends('admin.layouts.app')

@section('content')
<div class="container-xxl">
    @foreach ($profiles as $profile)
    <div>
        <div>{{$profile->id}}</div>
        <div>{{$profile->uuid}}</div>
        <div>{{$profile->freelancer_id}}</div>
        <div>{{$profile->title}}</div>
        <div>{{$profile->body}}</div>
        <div>{{$profile->avatar}}</div>
    </div>
    @endforeach
</div>
@endsection