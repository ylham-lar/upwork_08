@extends('admin.layouts.app')

@section('content')
<div class="container-xxl">
    @foreach ($reviews as $review)
    <div>
        <div>{{$review->id}}</div>
        <div>{{$review->uuid}}</div>
        <div>{{$review->freelancer_id}}</div>
        <div>{{$review->client_id}}</div>
        <div>{{$review->from}}</div>
        <div>{{$review->rating}}</div>
        <div>{{$review->comment}}</div>
    </div>
    @endforeach
</div>
@endsection