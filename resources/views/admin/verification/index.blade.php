@extends('admin.layouts.app')
@section('content')
<div class="h2 p-3 mb-3">
    Verifications
</div>
<div class="table-responsive text-dark ">
    <table class="table table-striped table-hover table-bordered table-sm">
        <thead class="small text-center">
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
                <td class="text-center">{{$verification->id}}</td>
                <td class="">{{$verification->username}}</td>
                <td class="text-center"><i class="bi bi-person-lock pe-1"></i>{{$verification->code}}</td>
                <td class="text-center">{{$verification->getMethod()}}</td>
                <td class="text-center"> <span class="badge bg-{{ $verification->StatusColor()}}-subtle text-{{ $verification->StatusColor() }}"> {{ $verification->Status() }} </span></td>
                <td class="text-center"><i class="bi bi-clock pe-1"></i>{{$verification->created_at->format('H:i:s d.m.Y')}}</td>
                <td class="text-center"><i class="bi bi-clock pe-1"></i>{{$verification->updated_at->format('H:i:s d.m.Y')}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection