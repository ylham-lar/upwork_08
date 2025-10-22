@extends('admin.layouts.app')
@section('content')
<div class="h2 pt-3 mb-3">
    Works
</div>
<div class="table-responsive text-dark">
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
                <td>{{$work->client->first_name }} {{$work->client->last_name}}</td>
                <td>{{$work->freelancer?->first_name}} {{$work->freelancer?->last_name}}</td>
                <td>{{$work->profile?->id }}</td>
                <td><i class="bi bi-currency-dollar"></i>{{$work->price}}</td>
                <td>{{$work->experience_level()}}</td>
                <td>{{$work->job_type()}}</td>
                <td>{{$work->project_type()}}</td>
                <td>{{$work->project_length()}}</td>
                <td>{{$work->hours_per_week()}}</td>
                <td><a href="{{ route('admin.skill', ['work' => $work->id]) }}" class="text-decoration-none" target="_blank"><i class="bi-box-arrow-up-right"> </i>{{ $work->work_skills_count }}</a></td>
                <td><a href="{{ route('admin.proposal', ['work' => $work->id]) }}" class="text-decoration-none" target="_blank"><i class="bi-box-arrow-up-right"> </i>{{ $work->proposals_count }}</a></td>
                <td><i class="bi bi-clock pe-1"></i>{{$work->last_viewed}}</td>
                <td><i class="bi bi-clock pe-1"></i>{{$work->created_at}}</td>
                <td><i class="bi bi-clock pe-1"></i>{{$work->updated_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection