@extends('admin.layouts.app')
@section('content')
<div class="h2 p-3 mb-3">
    Proposals
</div>
<div class="table-responsive text-dark text-center">
    <table class="table table-striped table-hover table-bordered table-sm">
        <thead class="small">
            <tr>
                <th>Id</th>
                <th>Work Id</th>
                <th>Profile Id</th>
                <th>Freelancer</th>
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
                <td><a href="{{ route('v1.admin.work.index', ['work_id' => $proposal->work_id]) }}" target="_blank">{{$proposal->work->id}}</a></td>
                <td><a href="{{ route('v1.admin.profile.index', ['profile_id' => $proposal->profile_id]) }}" target="_blank">{{$proposal->profile?->id}}</a></td>
                <td>{{$proposal->freelancer?->first_name}} {{$proposal->freelancer?->last_name}}</td>
                <td>{{ Str::limit($proposal->cover_letter, 90) }}</td>
                <td> <span class="badge bg-{{ $proposal->statuscolor() }}-subtle text-{{ $proposal->statuscolor() }}-emphasis">{{$proposal->status()}}</span></td>
                <td><i class="bi bi-clock pe-1"></i>{{$proposal->created_at->format('H:i:s d.m.Y')}}</td>
                <td><i class="bi bi-clock pe-1"></i>{{$proposal->updated_at->format('H:i:s d.m.Y')}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection