@extends('admin.layouts.app')

@section('content')
<div class="container-xxl">
    @foreach ($locations as $location)
    <div>
        <div>{{$location->id}}</div>
        <div>{{$location->name}}</div>
    </div>
    @endforeach
</div>
@endsection