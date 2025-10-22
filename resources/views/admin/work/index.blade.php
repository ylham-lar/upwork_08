@extends('admin.layouts.app')
@section('content')
<div class="h2 p-3 mb-3">
    Works
</div>
<div class="table-responsive text-dark text-center">
    <table class="table table-striped table-hover table-bordered table-sm">
        <thead class="small">
            <tr>
                <th>Id</th>
                <th>Clients</th>
                <th>Freelancers</th>
                <th>Profiles</th>
                <th>Price</th>
                <th>Experience Level</th>
                <th>Job Type</th>
                <th>Project Type</th>
                <th>Project Length</th>
                <th>Hours Per Week</th>
                <th>Work Skills</th>
                <th>Proposals</th>
                <th>Last Viewed</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($works as $work)
            <tr>
                <td>{{$work->id}}</td>
                <td> <a href="{{ route('v1.admin.client', ['client' => $work->client_id]) }}" target="_blank">{{$work->client->first_name }} {{$work->client->last_name}}</a></td>
                <td> <a href="{{ route('v1.admin.freelancer', ['freelancer' => $work->freelancer_id]) }}" target="_blank">{{$work->freelancer?->first_name}} {{$work->freelancer?->last_name}}</a></td>
                <td> <a href="{{ route('v1.admin.profile', ['profile' => $work->profile_id]) }}" target="_blank">{{$work->profile?->id}}</a></td>
                <td><i class="bi bi-currency-dollar"></i>{{$work->price}}</td>
                <td>{{$work->experience_level()}}</td>
                <td>{{$work->job_type()}}</td>
                <td>{{$work->project_type()}}</td>
                <td>{{$work->project_length()}}</td>
                <td>{{$work->hours_per_week()}}</td>
                <td><a href="{{ route('v1.admin.skill', ['work' => $work->id]) }}" class="text-decoration-none" target="_blank"> </i>{{ $work->work_skills_count }}</a></td>
                <td><a href="{{ route('v1.admin.proposal', ['work' => $work->id]) }}" class="text-decoration-none" target="_blank"> </i>{{ $work->proposals_count }}</a></td>
                <td><i class="bi bi-clock pe-1"></i>{{$work->last_viewed->format('H:i:s d.m.Y')}}</td>
                <td><i class="bi bi-clock pe-1"></i>{{$work->created_at->format('H:i:s d.m.Y')}}</td>
                <td><i class="bi bi-clock pe-1"></i>{{$work->updated_at->format('H:i:s d.m.Y')}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection