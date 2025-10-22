@extends('admin.layouts.app')
@section('content')
<div class="h2 p-3 mb-3">
    Locations
</div>
<div class="table-responsive text-dark">
    <table class="table table-striped table-hover table-bordered table-sm">
        <thead class="small">
            <tr>
                <th>Id</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($locations as $location)
            <tr>
                <td>{{ $location->id }}</td>
                <td><i class="bi bi-geo-alt pe-1"></i>{{$location->name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection