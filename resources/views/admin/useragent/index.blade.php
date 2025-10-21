@extends('admin.layouts.app')

@section('content')
<div class="container-xxl">
    @foreach ($useragents as $useragent)
    <div>
        <div>{{$useragent->id}}</div>
        <div>{{$useragent->user_agent}}</div>
        <div>{{$useragent->device}}</div>
        <div>{{$useragent->platform}}</div>
        <div>{{$useragent->browser}}</div>
        <div>{{$useragent->robot}}</div>
        <div>{{$useragent->disable}}</div>
    </div>
    @endforeach
</div>
@endsection 