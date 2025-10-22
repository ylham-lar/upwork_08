@extends('admin.layouts.app')
@section('content')
<div class="h2 p-3 mb-3">
    Proposals
</div>
<div class="table-responsive text-dark">
    <table class="table table-striped table-hover table-bordered table-sm">
        <thead class="small">
            <tr>
                <th>Id</th>
                <th>Work Id</th>
                <th>Freelancer Id</th>
                <th>Profile Id</th>
                <th>Cover Letter</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proposals as $proposal)
            <tr>
                <td>{{$proposal->id }}</td>
                <td>{{$proposal->work_id}}</td>
                <td>{{$proposal->freelancer_id}}</td>
                <td>{{$proposal->profile_id}}</td>
                <td>{{ Str::limit($proposal->cover_letter, 90) }}</td>
                <td> <span class="badge bg-{{ $proposal->statuscolor() }}-subtle text-{{ $proposal->statuscolor() }}-emphasis">{{$proposal->status()}}</span></td>
                <td><i class="bi bi-clock pe-1"></i>{{$proposal->created_at}}</td>
                <td><i class="bi bi-clock pe-1"></i>{{$proposal->updated_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection