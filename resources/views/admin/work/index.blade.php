@extends('admin.layouts.app')

@section('content')
<div class="h2 p-3 mb-3">Works</div>

<div class="table-responsive text-dark text-center">
    <table class="table table-bordered table-striped table-hover align-middle shadow-sm small">
        <thead class="table-light text-center align-middle">
            <tr>
                <th>ID</th>
                <th><i class="bi bi-person-badge-fill text-primary me-1"></i>Clients</th>
                <th><i class="bi bi-person-fill text-primary me-1"></i>Freelancers</th>
                <th><i class="bi bi-currency-dollar text-primary me-1"></i>Price</th>
                <th><i class="bi bi-bar-chart-line text-primary me-1"></i>Experience Level</th>
                <th><i class="bi bi-briefcase-fill text-primary me-1"></i>Job Type</th>
                <th><i class="bi bi-diagram-3-fill text-primary me-1"></i>Project Type</th>
                <th><i class="bi bi-clock-history text-primary me-1"></i>Project Length</th>
                <th><i class="bi bi-hourglass-split text-primary me-1"></i>Hours Per Week</th>
                <th><i class="bi bi-tools text-primary me-1"></i>Work Skills</th>
                <th><i class="bi bi-file-earmark-text text-primary me-1"></i>Proposals</th>
                <th><i class="bi bi-gear me-1"></i>Settings</th>
            </tr>
        </thead>
        <tbody>
            @forelse($objs as $obj)
            <tr>
                <td class="text-center fw-medium text-muted">
                    <a href="{{ route('admin.work.show', $obj->id) }}" class="btn btn-sm text-primary">{{ $obj->id }}</a>
                </td>
                <td>{{ $obj->client?->first_name }} {{ $obj->client?->last_name }}</td>
                <td>
                    @if($obj->freelancer_id)
                    {{ $obj->freelancer?->first_name }} {{ $obj->freelancer?->last_name }}
                    @endif
                </td>
                <td class="text-center">
                    <i class="bi bi-currency-dollar me-1 text-secondary"></i>{{ $obj->price }}
                </td>
                <td class="text-center">
                    <span class="badge bg-{{ $obj->experience_level_color() }}-subtle text-{{ $obj->experience_level_color() }}">
                        {{ $obj->experience_level() }}
                    </span>
                </td>
                <td class="text-center">
                    <span class="badge bg-{{ $obj->job_type_color() }}-subtle text-{{ $obj->job_type_color() }}">
                        {{ $obj->job_type() }}
                    </span>
                </td>
                <td class="text-center">
                    <span class="badge bg-{{ $obj->project_type_color() }}-subtle text-{{ $obj->project_type_color() }}">
                        {{ $obj->project_type() }}
                    </span>
                </td>
                <td class="text-center">
                    <span class="badge bg-{{ $obj->project_length_color() }}-subtle text-{{ $obj->project_length_color() }}">
                        {{ $obj->project_length() }}
                    </span>
                </td>
                <td class="text-center">
                    <span class="badge bg-{{ $obj->hours_per_week_color() }}-subtle text-{{ $obj->hours_per_week_color() }}">
                        {{ $obj->hours_per_week() }}
                    </span>
                </td>
                <td class="text-center">
                    <a href="{{ route('admin.skill.index', ['work' => $obj->id]) }}" target="_blank" class="text-decoration-none">
                        {{ $obj->work_skills_count }}
                    </a>
                </td>
                <td class="text-center">
                    <a href="{{ route('admin.proposal.index', ['work' => $obj->id]) }}" target="_blank" class="text-decoration-none">
                        {{ $obj->proposals_count }}
                    </a>
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $obj->id }}">
                        <i class="bi-trash-fill"></i>
                    </button>

                    <div class="modal fade" id="deleteModal-{{ $obj->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $obj->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel-{{ $obj->id }}">Delete Work {{ $obj->id }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    Are you sure you want to delete work <strong>{{ $obj->id }}</strong>?
                                </div>
                                <div class="modal-footer">
                                    <form method="POST" action="{{ route('admin.work.destroy', $obj->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-dark btn-sm">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="12" class="text-center text-muted py-4">
                    <i class="bi bi-exclamation-circle text-warning me-2"></i>No works found
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection