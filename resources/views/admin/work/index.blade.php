@extends('admin.layouts.app')
@section('content')
<div class="h2 p-3 mb-3">
    Works
</div>
<div class="table-responsive text-dark text-center">
    <table class="table table-bordered table-striped table-hover align-middle shadow-sm small">
        <thead class="table-light text-center align-middle">
            <tr>
                <th>ID</th>
                <th><i class="bi bi-person-badge-fill text-primary me-1"></i>Clients</th>
                <th><i class="bi bi-person-fill text-primary me-1"></i>Freelancers</th>
                <th><i class="bi bi-card-text text-primary me-1"></i>Profiles</th>
                <th><i class="bi bi-currency-dollar text-primary me-1"></i>Price</th>
                <th><i class="bi bi-bar-chart-line text-primary me-1"></i>Experience Level</th>
                <th><i class="bi bi-briefcase-fill text-primary me-1"></i>Job Type</th>
                <th><i class="bi bi-diagram-3-fill text-primary me-1"></i>Project Type</th>
                <th><i class="bi bi-clock-history text-primary me-1"></i>Project Length</th>
                <th><i class="bi bi-hourglass-split text-primary me-1"></i>Hours Per Week</th>
                <th><i class="bi bi-tools text-primary me-1"></i>Work Skills</th>
                <th><i class="bi bi-file-earmark-text text-primary me-1"></i>Proposals</th>
                <th><i class="bi bi-clock-fill text-primary me-1"></i>Last Viewed</th>
                <th><i class="bi bi-calendar-plus-fill text-primary me-1"></i>Created At</th>
                <th><i class="bi bi-clock-history text-primary me-1"></i>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($works as $work)
            <tr>
                <td class="text-center fw-medium text-muted">{{ $work->id }}</td>

                <td>
                    <i class="bi bi-person-badge-fill me-1 text-secondary"></i>
                    {{ $work->client->first_name }} {{ $work->client->last_name }}
                </td>

                <td>
                    <i class="bi bi-person-fill me-1 text-secondary"></i>
                    {{ $work->freelancer?->first_name }} {{ $work->freelancer?->last_name }}
                </td>

                <td>
                    <a href="{{ route('v1.admin.profile.index', ['profile_id' => $work->profile_id]) }}" target="_blank">
                        {{ $work->profile?->id }}
                    </a>
                </td>

                <td class="text-center">
                    <i class="bi bi-currency-dollar me-1 text-secondary"></i>{{ $work->price }}
                </td>

                <td class="text-center">
                    <span class="badge bg-{{ $work->experience_level_color() }}-subtle text-{{ $work->experience_level_color() }}">
                        {{ $work->experience_level() }}
                    </span>
                </td>

                <td class="text-center">
                    <span class="badge bg-{{ $work->job_type_color() }}-subtle text-{{ $work->job_type_color() }}">
                        {{ $work->job_type() }}
                    </span>
                </td>

                <td class="text-center">
                    <span class="badge bg-{{ $work->project_type_color() }}-subtle text-{{ $work->project_type_color() }}">
                        {{ $work->project_type() }}
                    </span>
                </td>

                <td class="text-center">
                    <span class="badge bg-{{ $work->project_length_color() }}-subtle text-{{ $work->project_length_color() }}">
                        {{ $work->project_length() }}
                    </span>
                </td>

                <td class="text-center">
                    <span class="badge bg-{{ $work->hours_per_week_color() }}-subtle text-{{ $work->hours_per_week_color() }}">
                        {{ $work->hours_per_week() }}
                    </span>
                </td>

                <td class="text-center">
                    <a href="{{ route('v1.admin.skill.index', ['work' => $work->id]) }}" target="_blank">
                        {{ $work->work_skills_count }}
                    </a>
                </td>

                <td class="text-center">
                    <a href="{{ route('v1.admin.proposal.index', ['work' => $work->id]) }}" target="_blank">
                        {{ $work->proposals_count }}
                    </a>
                </td>

                <td class="text-center">
                    <i class="bi bi-clock me-1 text-secondary"></i>{{ $work->last_viewed->format('H:i:s d.m.Y') }}
                </td>

                <td class="text-center">
                    <i class="bi bi-clock me-1 text-secondary"></i>{{ $work->created_at->format('H:i:s d.m.Y') }}
                </td>

                <td class="text-center">
                    <i class="bi bi-clock me-1 text-secondary"></i>{{ $work->updated_at->format('H:i:s d.m.Y') }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="15" class="text-center text-muted py-4">
                    <i class="bi bi-exclamation-circle text-warning me-2"></i>No works found
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection