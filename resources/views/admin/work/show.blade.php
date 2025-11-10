@extends('admin.layouts.app')

@section('content')
<div class="container-xxl py-4">

    <div class="card border-0 shadow-lg rounded-4 mb-4">
        <div class="card-body py-4 px-5 d-flex flex-wrap justify-content-between align-items-center">
            <div>
                <div class="fw-bold mb-2 text-dark fs-3">
                    <i class="bi bi-briefcase-fill text-primary me-2"></i>
                    {{ $obj->title ?? 'Untitled Work' }}
                </div>
                <div class="text-secondary mb-1">
                    <i class="bi bi-person-fill text-success me-1"></i>
                    <strong>Client:</strong>
                    <a href="{{ route('admin.client.show', $obj->client_id) }}" class="btn btn-sm text-primary">
                        {{ $obj->client->first_name }} {{ $obj->client->last_name }}
                    </a>
                </div>
                @if($obj->freelancer_id)
                <div class="text-secondary mb-1">
                    <i class="bi bi-person-badge-fill text-info me-1"></i>
                    <strong>Freelancer:</strong>
                    <a href="{{ route('admin.freelancer.show', $obj->freelancer_id) }}" class="btn btn-sm text-primary">
                        {{ $obj->freelancer?->first_name }} {{ $obj->freelancer?->last_name }}
                    </a>
                </div>
                @endif
                @if($obj->profile_id)
                <div class="text-secondary mb-0">
                    <i class="bi bi-person-square text-primary me-1"></i>
                    <strong>Freelancer Profile ID:</strong>
                    <a href="{{ route('admin.profile.show', $obj->profile_id) }}" class="btn btn-sm text-primary">
                        {{ $obj->profile?->id }}
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-4 mb-3">
                <div class="card-body px-4 py-3">
                    <div class="fw-bold mb-2 text-dark fs-5">
                        <i class="bi bi-body-text text-primary me-2"></i> Description
                    </div>
                    <div class="text-secondary lh-sm fs-6" style="line-height: 1.4;">
                        {!! nl2br(e($obj->body ?? 'No description available.')) !!}
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body px-4 py-4">
                    <div class="fw-bold mb-4 text-dark fs-5">
                        <i class="bi bi-envelope-paper text-primary me-2"></i> Proposals
                    </div>

                    @if($obj->proposals->isEmpty())
                    <div class="text-center text-muted py-4">
                        <i class="bi bi-exclamation-circle text-warning me-2 fs-5"></i>No proposals found.
                    </div>
                    @else
                    @foreach($obj->proposals->take(2) as $proposal)
                    <div class="border rounded-4 p-4 mb-3 bg-light-subtle">
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                            <div>
                                <div class="fw-semibold text-secondary mb-1">
                                    <i class="bi bi-person-fill text-secondary me-1"></i>Freelancer:
                                    <a href="{{ route('admin.freelancer.show', $proposal->freelancer_id) }}" class="text-decoration-none text-primary">
                                        {{ $proposal->freelancer?->first_name }} {{ $proposal->freelancer?->last_name }}
                                    </a>
                                </div>
                                <div class="text-secondary mb-1">
                                    <i class="bi bi-person-square text-primary me-1"></i> Profile ID:
                                    <a href="{{ route('admin.profile.show', $proposal->profile_id) }}" class="text-decoration-none text-primary">
                                        {{ $proposal->profile?->id ?? 'N/A' }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="text-muted lh-lg mb-3">
                            <i class="bi bi-chat-left-quote text-primary me-2"></i>
                            {{ Str::limit($proposal->cover_letter, 120) }}
                        </div>
                        <div class="small text-secondary d-flex flex-wrap gap-4">
                            <span>
                                <i class="bi bi-clock-history me-1 text-primary"></i>Created:
                                {{ $proposal->created_at->format('H:i:s d.m.Y') }}
                            </span>
                        </div>
                    </div>
                    @endforeach

                    @if($obj->proposals->count() > 2)
                    <button class="btn btn-link btn-sm p-0 mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#allProposals" aria-expanded="false">
                        Show All Proposals
                    </button>
                    <div class="collapse mt-3" id="allProposals">
                        @foreach($obj->proposals->skip(2) as $proposal)
                        <div class="border rounded-4 p-4 mb-3 bg-light-subtle">
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <div>
                                    <div class="fw-semibold text-secondary mb-1">
                                        <i class="bi bi-person-fill text-secondary me-1"></i>Freelancer:
                                        <a href="{{ route('admin.freelancer.show', $proposal->freelancer_id) }}" class="text-decoration-none text-primary">
                                            {{ $proposal->freelancer?->first_name }} {{ $proposal->freelancer?->last_name }}
                                        </a>
                                    </div>
                                    <div class="text-secondary mb-1">
                                        <i class="bi bi-person-square text-primary me-1"></i> Profile ID:
                                        <a href="{{ route('admin.profile.show', $proposal->profile_id) }}" class="text-decoration-none text-primary">
                                            {{ $proposal->profile?->id ?? 'N/A' }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="text-muted lh-lg mb-3">
                                <i class="bi bi-chat-left-quote text-primary me-2"></i>
                                {{ Str::limit($proposal->cover_letter, 120) }}
                            </div>
                            <div class="small text-secondary d-flex flex-wrap gap-4">
                                <span>
                                    <i class="bi bi-clock-history me-1 text-primary"></i>Created:
                                    {{ $proposal->created_at->format('H:i:s d.m.Y') }}
                                </span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body px-4 py-4">
                    <div class="fw-bold mb-3 text-dark fs-5">
                        <i class="bi bi-info-circle-fill text-primary me-2"></i> Work Details
                    </div>

                    <ul class="list-unstyled mb-4">
                        <li class="mb-3">
                            <div class="text-secondary mb-1">Experience Level:</div>
                            <span class="badge bg-{{ $obj->experience_level_color() }}-subtle text-{{ $obj->experience_level_color() }} px-3 py-2">
                                {{ $obj->experience_level() }}
                            </span>
                        </li>
                        <li class="mb-3">
                            <div class="text-secondary mb-1">Job Type:</div>
                            <span class="badge bg-{{ $obj->job_type_color() }}-subtle text-{{ $obj->job_type_color() }} px-3 py-2">
                                {{ $obj->job_type() }}
                            </span>
                        </li>
                        <li class="mb-3">
                            <div class="text-secondary mb-1">Project Type:</div>
                            <span class="badge bg-{{ $obj->project_type_color() }}-subtle text-{{ $obj->project_type_color() }} px-3 py-2">
                                {{ $obj->project_type() }}
                            </span>
                        </li>
                        <li class="mb-3">
                            <div class="text-secondary mb-1">Project Length:</div>
                            <span class="text-dark">{{ $obj->project_length() }}</span>
                        </li>
                    </ul>

                    <hr>

                    <div class="fw-bold mb-2 text-dark">
                        <i class="bi bi-shield-lock-fill text-primary me-2"></i> Verification
                    </div>
                    <div class="mb-3 fs-6">
                        Verified:
                        @if($obj->verified)
                        <span class="text-success fw-bold"><i class="bi bi-check-circle-fill me-1"></i>Yes</span>
                        @else
                        <span class="text-danger fw-bold"><i class="bi bi-x-circle-fill me-1"></i>No</span>
                        @endif
                    </div>

                    <hr>

                    <div class="text-muted small">
                        <div class="mb-1"><i class="bi bi-clock-history text-primary me-1"></i> Created: {{ $obj->created_at->format('H:i:s d.m.Y') }}</div>
                        <div class="mb-1"><i class="bi bi-clock text-primary me-1"></i> Updated: {{ $obj->updated_at->format('H:i:s d.m.Y') }}</div>
                        <div class="mb-0"><i class="bi bi-eye text-primary me-1"></i> Last Viewed: {{ $obj->last_viewed->format('H:i:s d.m.Y') }}</div>
                        <div class="mt-3">
                            <a href="{{ route('admin.work.index') }}" class="btn btn-outline-secondary px-3 py-1">
                                <i class="bi bi-arrow-left-circle me-1"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection