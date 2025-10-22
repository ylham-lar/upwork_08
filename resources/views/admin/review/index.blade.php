@extends('admin.layouts.app')
@section('content')
<div class="h2 pt-3 mb-3">
    Reviews
</div>
<div class="table-responsive text-dark">
    <table class="table table-striped table-hover table-bordered table-sm">
        <thead class="small">
            <tr>
                <th>Id</th>
                <th>Freelancer Id</th>
                <th>Client Id</th>
                <th>From</th>
                <th>Rating</th>
                <th>Comment</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $review)
            <tr>
                <td>{{$review->id}}</td>
                <td>{{$review->freelancer_id}}</td>
                <td>{{$review->client_id}}</td>
                <td>{{$review->from}}</td>
                <td><i class="bi bi-star-fill text-warning pe-1"></i>{{$review->rating}}</td>
                <td>{{$review->comment}}</td>
                <td><i class="bi bi-clock pe-1"></i>{{$review->created_at}}</td>
                <td><i class="bi bi-clock pe-1"></i>{{$review->updated_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection