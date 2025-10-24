@extends('admin.layouts.app')
@section('content')
<div class="h2 p-3 mb-3">
    Works
</div>
<div class="table-responsive text-dark text-center">
    <table class="table table-striped table-hover table-bordered table-sm">
        <thead class="small">
            <tr>
                <th>
                    Id
                </th>
                <th>
                    Clients
                </th>
                <th>
                    Freelancers
                </th>
                <th>
                    Profiles
                </th>
                <th>
                    Price
                </th>
                <th>
                    Experience Level
                </th>
                <th>
                    Job Type
                </th>
                <th>
                    Project Type
                </th>
                <th>
                    Project Length
                </th>
                <th>
                    Hours Per Week
                </th>
                <th>
                    Work Skills
                </th>
                <th>
                    Proposals
                </th>
                <th>
                    Last Viewed
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
            @foreach($works as $work)
            <tr>
                <td>
                    {{$work->id}}</td>
                <td>
                    {{$work->client->first_name }} {{$work->client->last_name}}
                </td>
                <td>
                    {{$work->freelancer?->first_name}} {{$work->freelancer?->last_name}}
                </td>
                <td>
                    <a href="{{ route('v1.admin.profile.index', ['profile_id' => $work->profile_id]) }}" target="_blank">{{$work->profile?->id}}</a>
                </td>
                <td>
                    <i class="bi bi-currency-dollar"></i>{{$work->price}}
                </td>
                <td>
                    <span class="badge bg-{{ $work->experience_level_color()}}-subtle text-{{ $work->experience_level_color() }}"> {{$work->experience_level()}} </span>
                </td>
                <td>
                    <span class="badge bg-{{ $work->job_type_color()}}-subtle text-{{ $work->job_type_color() }}"> {{$work->job_type()}} </span>
                </td>
                <td>
                    <span class="badge bg-{{ $work->project_type_color()}}-subtle text-{{ $work->project_type_color() }}"> {{$work->project_type()}} </span>
                </td>
                <td>
                    <span class="badge bg-{{ $work->project_length_color()}}-subtle text-{{ $work->project_length_color() }}">{{$work->project_length()}}</span>
                </td>
                <td>
                    <span class="badge bg-{{ $work->hours_per_week_color()}}-subtle text-{{ $work->hours_per_week_color() }}">{{$work->hours_per_week()}} </span>
                </td>
                <td>
                    <a href="{{ route('v1.admin.skill.index', ['work' => $work->id]) }}" class="text-decoration-none" target="_blank"> </i>{{ $work->work_skills_count }}</a>
                </td>
                <td>
                    <a href="{{ route('v1.admin.proposal.index', ['work' => $work->id]) }}" class="text-decoration-none" target="_blank"> </i>{{ $work->proposals_count }}</a>
                </td>
                <td>
                    <i class="bi bi-clock pe-1"></i>{{$work->last_viewed->format('H:i:s d.m.Y')}}
                </td>
                <td>
                    <i class="bi bi-clock pe-1"></i>{{$work->created_at->format('H:i:s d.m.Y')}}
                </td>
                <td>
                    <i class="bi bi-clock pe-1"></i>{{$work->updated_at->format('H:i:s d.m.Y')}}
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection