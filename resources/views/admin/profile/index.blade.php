@extends('admin.layouts.app')
@section('content')
<div class="h2 pt-3 mb-3">
    Profiles
</div>
<div class="table-responsive text-dark">
    <table class="table table-striped table-hover table-bordered table-sm">
        <thead class="small">
            <tr>
                <th>Id</th>
                <th>Freelancer</th>
                <th>Title</th>
                <th>Body Letter</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($profiles as $profile)
            <tr class="p-3">
                <td>{{$profile->id }}</td>
                <td>{{$profile->freelancer_id}}</td>
                <td>{{$profile->title}}</td>
                <td>{{$profile->body}}</td>
                <td><i class="bi bi-clock pe-1"></i>{{$profile->created_at}}</td>
                <td><i class="bi bi-clock pe-1"></i>{{$profile->updated_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection