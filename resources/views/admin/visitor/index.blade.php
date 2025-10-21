@extends('admin.layouts.app')

@section('content')
<div class="container-xxl">
    @foreach ($visitors as $visitor)
    <div>
        <div>{{$visitor->id}}</div>
        <div>{{$visitor->ip_address_id}}</div>
        <div>{{$visitor->user_agent_id}}</div>
        <div>{{$visitor->hits}}</div>
        <div>{{$visitor->suspect_hits}}</div>
        <div>{{$visitor->robot}}</div>
        <div>{{$visitor->api}}</div>
        <div>{{$visitor->disable}}</div>
    </div>
    @endforeach
</div>
@endsection