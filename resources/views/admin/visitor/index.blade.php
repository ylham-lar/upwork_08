@extends('admin.layouts.app')
@section('content')
<div class="h2 p-3 mb-3">
    Visitors
</div>
<div class="table-responsive text-dark">
    <table class="table table-striped table-hover table-bordered table-sm">
        <thead class="small">
            <tr>
                <th>Id</th>
                <th>Ip Addres Id</th>
                <th>User Agent Id</th>
                <th>Hits</th>
                <th>Suspect Hits</th>
                <th>Robot</th>
                <th>Api</th>
                <th>disable</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($visitors as $visitor)
            <tr class="p-3">
                <td rowspan="1">{{ $visitor->id }}</td>
                <td>{{$visitor->ip_address_id}}</td>
                <td>{{$visitor->user_agent_id}}</td>
                <td>{{$visitor->hits}}</td>
                <td>{{$visitor->suspect_hits}}</td>
                <td>{{$visitor->robot}}</td>
                <td>{{$visitor->api}}</td>
                <td>{{$visitor->disable}}</td>
                <td><i class="bi bi-clock pe-1"></i>{{$visitor->created_at }}</td>
                <td><i class="bi bi-clock pe-1"></i>{{$visitor->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection