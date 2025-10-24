@extends('admin.layouts.app')
@section('content')
<div class="h2 p-3 mb-3">
    Reviews
</div>
<div class="table-responsive text-dark text-center">
    <table class="table table-striped table-hover table-bordered table-sm">
        <thead class="small">
            <tr>
                <th>
                    Id
                </th>
                <th>
                    Freelancer
                </th>
                <th>
                    Client
                </th>
                <th>
                    From
                </th>
                <th>
                    Rating
                </th>
                <th>
                    Comment
                </th>
                <th>
                    Created At
                </th>
                <th>
                    Updated At
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $review)
            <tr>
                <td>
                    {{$review->id}}
                </td>
                <td>
                    {{$review->freelancer?->first_name}} {{$review->freelancer?->last_name}}
                </td>
                <td>
                    {{$review->client->first_name }} {{$review->client->last_name }}
                </td>
                <td>
                    {{$review->from}}</td>
                <td>
                    <i class="bi bi-star-fill text-warning pe-1"></i>{{$review->rating}}
                </td>
                <td>
                    {{ Str::limit($review->comment, 90) }}
                </td>
                <td>
                    <i class="bi bi-clock pe-1"></i>{{$review->created_at->format('H:i:s d.m.Y')}}
                </td>
                <td>
                    <i class="bi bi-clock pe-1"></i>{{$review->updated_at->format('H:i:s d.m.Y')}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection