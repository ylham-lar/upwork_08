@extends('admin.layouts.app')
@section('content')
<div class="h2 pt-3 mb-3">
    Verifications
</div>
<div class="table-responsive text-dark">
    <table class="table table-striped table-hover table-bordered table-sm">
        <thead class="small">
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Code</th>
                <th>Method</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($verifications as $verification)
            <tr class="p-3">
                <td>{{$verification->id}}</td>
                <td>{{$verification->username}}</td>
                <td>{{$verification->code}}</td>
                <td>{{$verification->getMethod()}}</td>
                <td> <span class="badge bg-{{ $verification->StatusColor()}}-subtle text-{{ $verification->StatusColor() }}"> {{ $verification->Status() }} </span></td>
                <td><i class="bi bi-clock pe-1"></i>{{$verification->created_at}}</td>
                <td><i class="bi bi-clock pe-1"></i>{{$verification->updated_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection