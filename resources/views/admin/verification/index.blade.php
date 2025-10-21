@extends('admin.layouts.app')

@section('content')
<div class="container-xxl">
    @foreach ($verifications as $verification)
    <div>
        <div>{{$verification->id}}</div>
        <div>{{$verification->username}}</div>
        <div>{{$verification->code}}</div>
        <div>{{$verification->method}}</div>
        <div>{{$verification->status}}</div>
    </div>
    @endforeach
</div>
@endsection