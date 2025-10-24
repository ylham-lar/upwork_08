@extends('admin.layouts.app')
@section('content')
<div class="h2 p-3 mb-3">
    Freelancers
</div>
<div class="table-responsive text-dark text-center">
    <table class="table table-striped table-hover table-bordered table-sm">
        <thead class="small">
            <tr>
                <th>
                    Id
                </th>
                <th>
                    Location
                </th>
                <th>
                    Name
                </th>
                <th>
                    Username
                </th>
                <th>
                    Rating
                </th>
                <th>
                    Verified
                </th>
                <th>
                    Total Jobs
                </th>
                <th>
                    Total Earnings
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
            @foreach($freelancers as $freelancer)
            <tr>
                <td>
                    {{ $freelancer->id }}</td>
                <td>
                    {{$freelancer->location? $freelancer->location->name : 'World'}}
                </td>
                <td>
                    {{$freelancer->first_name}} {{$freelancer->last_name}}
                </td>
                <td>
                    <i class="bi bi-telephone pe-1"></i>{{$freelancer->username}}
                </td>
                <td>
                    <i class="bi bi-star-fill text-warning pe-1"></i>{{$freelancer->rating}}
                </td>
                <td>
                    <span class="badge bg-{{ $freelancer->verified_color()}}-subtle text-{{ $freelancer->verified_color() }}">{{$freelancer->verified()}}</span>
                </td>
                <td>
                    <i class="bi bi-briefcase pe-1"></i>{{$freelancer->total_jobs}}
                </td>
                <td>
                    <i class="bi bi-currency-dollar pe-1"></i>{{$freelancer->total_earnings}}
                </td>
                <td>
                    <i class="bi bi-clock pe-1"></i>{{$freelancer->created_at->format('H:i:s d.m.Y') }}
                </td>
                <td>
                    <i class="bi bi-clock pe-1"></i>{{$freelancer->updated_at->format('H:i:s d.m.Y') }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection