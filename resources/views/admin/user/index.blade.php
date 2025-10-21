@extends('admin.layouts.app')

@section('content')
<div class="container-xxl">
    @foreach ($users as $user)
    <div>
        <div>{{$user->id}}</div>
        <div>{{$user->name}}</div>
        <div>{{$user->username}}</div>
        <div>{{$user->password}}</div>
    </div>
    @endforeach
</div>
@endsection