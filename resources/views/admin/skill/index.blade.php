@extends('admin.layouts.app')

@section('content')
<div class="container-xxl">
    @foreach ($skills as $skill)
    <div>
        <div>{{$skill->id}}</div>
        <div>{{$skill->name}}</div>
    </div>
    @endforeach
</div>
@endsection