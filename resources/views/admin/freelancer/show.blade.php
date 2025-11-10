@extends('admin.layouts.app')

@section('content')
<div class="container-xxl py-4">

    <div class="card shadow-lg border-0 rounded-4 mb-4">
        <div class="card-body py-4 px-5">
            <div class="row align-items-start">

                <div class="col-md-7">
                    <h3 class="fw-bold text-dark mb-2">
                        <i class="bi bi-person-workspace text-primary me-2"></i>
                        {{ $obj->first_name }} {{ $obj->last_name }}
                    </h3>
                    <div class="text-secondary mb-3 small">
                        <i class="bi bi-geo-alt-fill text-danger me-1"></i>
                        {{ $obj->location?->name ?? 'World' }}
                        <span class="mx-2">|</span>
                        <i class="bi bi-phone-fill text-success me-1"></i>
                        +993{{ $obj->username }}
                    </div>

                    <h6 class="fw-semibold text-dark mb-2">
                        <i class="bi bi-person-badge text-primary me-1"></i> Profiles
                    </h6>
                    @if($obj->profiles->isNotEmpty())
                    <ul class="list-unstyled mb-0">
                        @foreach($obj->profiles as $profile)
                        <li class="mb-1">
                            <i class="bi bi-hash text-secondary me-1"></i>
                            <a href="{{ route('admin.profile.show', $profile->id) }}" class="btn btn-sm text-primary fw-bold">
                                Profile #{{ $profile->id }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    @else
                    <div class="text-muted mb-0 small">
                        <i class="bi bi-exclamation-circle text-warning me-1"></i>No profiles found
                    </div>
                    @endif
                </div>

                <div class="col-md-5 text-md-end mt-3 mt-md-0 d-flex flex-column justify-content-start align-items-md-end align-items-start gap-3">
                    <div class="d-flex gap-3 justify-content-md-end justify-content-start flex-wrap">
                        <div class="text-center">
                            <h4 class="fw-bold mb-0 text-info">
                                <i class="bi bi-briefcase me-1"></i>{{ $obj->total_jobs }}
                            </h4>
                            <div class="text-secondary">Total Jobs</div>
                        </div>

                        <div class="text-center">
                            <h4 class="fw-bold mb-0 text-success">
                                @if($obj->total_earnings >= 1000000)
                                ${{ round($obj->total_earnings / 1000000, 1) }}M+
                                @elseif($obj->total_earnings >= 1000)
                                ${{ round($obj->total_earnings / 1000, 1) }}K+
                                @else
                                ${{ $obj->total_earnings }}
                                @endif
                            </h4>
                            <div class="text-secondary">Earnings</div>
                        </div>

                        <div class="text-center">
                            <h4 class="fw-bold mb-0 text-warning">
                                <i class="bi bi-star-fill me-1"></i>{{ $obj->rating ?? '0.0' }}
                            </h4>
                            <div class="text-secondary">Rating</div>
                        </div>
                    </div>

                    <div class="h6">
                        <a href="{{ route('admin.profile.create', ['freelancer_id' => $obj->id]) }}" class="btn btn-success btn-lg shadow-sm rounded-3 mt-2">
                            <i class="bi bi-person-plus-fill me-1 h6"></i> <span class="h6"> New Profile</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="row g-4 mb-4">

        <div class="col-md-6">
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-body p-4 d-flex flex-column">
                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-chat-dots text-primary me-2"></i> My Reviews
                    </h5>

                    @if($obj->myReviews->isEmpty())
                    <div class="text-center text-muted py-3 flex-grow-1 d-flex align-items-center justify-content-center">
                        <div class="small"><i class="bi bi-exclamation-circle text-warning me-1"></i>No reviews yet</div>
                    </div>
                    @else
                    <ul class="list-group list-group-flush flex-grow-1">
                        @foreach($obj->myReviews->take(2) as $review)
                        <li class="list-group-item d-flex justify-content-between align-items-start py-2 px-2">
                            <div class="d-flex flex-column">
                                <div class="small fw-semibold" title="{{ $review->comment }}">
                                    {{ \Illuminate\Support\Str::limit($review->comment, 160) }}
                                </div>
                            </div>
                            <span class="badge bg-primary rounded-pill fs-7 align-self-start">{{ $review->rating }}/5</span>
                        </li>
                        @endforeach
                    </ul>

                    @if($obj->myReviews->count() > 2)
                    <button class="btn btn-link btn-sm p-0 mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#allMyReviews" aria-expanded="false">
                        Show All Reviews
                    </button>
                    <div class="collapse mt-2" id="allMyReviews">
                        <ul class="list-group list-group-flush">
                            @foreach($obj->myReviews->skip(2) as $review)
                            <li class="list-group-item d-flex justify-content-between align-items-start py-2 px-2">
                                <div class="d-flex flex-column">
                                    <div class="small fw-semibold" title="{{ $review->comment }}">
                                        {{ \Illuminate\Support\Str::limit($review->comment, 120) }}
                                    </div>
                                </div>
                                <span class="badge bg-primary rounded-pill fs-7 align-self-start">{{ $review->rating }}/5</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-body p-4 d-flex flex-column">
                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-chat-quote text-success me-2"></i> Client Reviews
                    </h5>

                    @if($obj->clientReviews->isEmpty())
                    <div class="text-center text-muted py-3 flex-grow-1 d-flex align-items-center justify-content-center">
                        <div class="small"><i class="bi bi-exclamation-circle text-warning me-1"></i>No reviews yet</div>
                    </div>
                    @else
                    <ul class="list-group list-group-flush flex-grow-1">
                        @foreach($obj->clientReviews->take(2) as $review)
                        <li class="list-group-item d-flex justify-content-between align-items-start py-2 px-2">
                            <div class="d-flex flex-column">
                                <div class="small fw-semibold" title="{{ $review->comment }}">
                                    {{ \Illuminate\Support\Str::limit($review->comment, 160) }}
                                </div>
                            </div>
                            <span class="badge bg-success rounded-pill fs-7 align-self-start">{{ $review->rating }}/5</span>
                        </li>
                        @endforeach
                    </ul>

                    @if($obj->clientReviews->count() > 2)
                    <button class="btn btn-link btn-sm p-0 mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#allClientReviews" aria-expanded="false">
                        Show All Reviews
                    </button>
                    <div class="collapse mt-2" id="allClientReviews">
                        <ul class="list-group list-group-flush">
                            @foreach($obj->clientReviews->skip(2) as $review)
                            <li class="list-group-item d-flex justify-content-between align-items-start py-2 px-2">
                                <div class="d-flex flex-column">
                                    <div class="small fw-semibold" title="{{ $review->comment }}">
                                        {{ \Illuminate\Support\Str::limit($review->comment, 120) }}
                                    </div>
                                </div>
                                <span class="badge bg-success rounded-pill fs-7 align-self-start">{{ $review->rating }}/5</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-briefcase-fill text-primary me-2"></i> Freelancer Works
                    </h5>
                    @if($obj->works->isEmpty())
                    <div class="text-center text-muted py-3">
                        <i class="bi bi-exclamation-circle text-warning me-2"></i> No works found
                    </div>
                    @else
                    @foreach($obj->works->take(2) as $work)
                    <div class="p-3 mb-3 border rounded-4 bg-light">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <div>
                                <h6 class="fw-bold mb-1">
                                    <i class="bi bi-person-fill text-primary me-1"></i>
                                    Client:
                                    @if($work->client_id)
                                    <a href="{{ route('admin.client.show', $work->client_id) }}" class="btn btn-sm text-primary fw-bold">
                                        {{ $work->client?->first_name || $work->client?->last_name
                                                    ? $work->client->first_name.' '.$work->client->last_name
                                                    : 'Unknown' }}
                                    </a>
                                    @else
                                    <span class="text-muted">Client</span>
                                    @endif
                                </h6>
                                <div class="text-secondary">
                                    <i class="bi bi-clock-history me-1"></i> {{ $work->project_length() }}
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap gap-2 mt-3">
                            <span class="badge bg-{{ $work->experience_level_color() }}-subtle text-{{ $work->experience_level_color() }}">
                                {{ $work->experience_level() }}
                            </span>
                            <span class="badge bg-{{ $work->job_type_color() }}-subtle text-{{ $work->job_type_color() }}">
                                {{ $work->job_type() }}
                            </span>
                            <span class="badge bg-{{ $work->project_type_color() }}-subtle text-{{ $work->project_type_color() }}">
                                {{ $work->project_type() }}
                            </span>
                        </div>
                    </div>
                    @endforeach

                    @if($obj->works->count() > 2)
                    <button class="btn btn-link btn-sm p-0 mt-1" type="button" data-bs-toggle="collapse" data-bs-target="#allWorks" aria-expanded="false">
                        Show All Works
                    </button>
                    <div class="collapse mt-3" id="allWorks">
                        @foreach($obj->works->skip(2) as $work)
                        <div class="p-3 mb-3 border rounded-4 bg-light">
                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                <div>
                                    <h6 class="fw-bold mb-1">
                                        <i class="bi bi-person-fill text-primary me-1"></i>
                                        Client:
                                        @if($work->client_id)
                                        <a href="{{ route('admin.client.show', $work->client_id) }}" class="btn btn-sm text-primary fw-bold">
                                            {{ $work->client?->first_name || $work->client?->last_name
                                                            ? $work->client->first_name.' '.$work->client->last_name
                                                            : 'Unknown' }}
                                        </a>
                                        @else
                                        <span class="text-muted">Client</span>
                                        @endif
                                    </h6>
                                    <div class="text-secondary">
                                        <i class="bi bi-clock-history me-1"></i> {{ $work->project_length() }}
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap gap-2 mt-3">
                                <span class="badge bg-{{ $work->experience_level_color() }}-subtle text-{{ $work->experience_level_color() }}">
                                    {{ $work->experience_level() }}
                                </span>
                                <span class="badge bg-{{ $work->job_type_color() }}-subtle text-{{ $work->job_type_color() }}">
                                    {{ $work->job_type() }}
                                </span>
                                <span class="badge bg-{{ $work->project_type_color() }}-subtle text-{{ $work->project_type_color() }}">
                                    {{ $work->project_type() }}
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
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-shield-lock-fill text-primary me-2"></i> Verification
                    </h5>
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
                        <div class="mb-1">
                            <i class="bi bi-clock-history text-primary me-1"></i> Created: {{ $obj->created_at->format('H:i:s d.m.Y') }}
                        </div>
                        <div class="mb-0">
                            <i class="bi bi-clock text-primary me-1"></i> Updated: {{ $obj->updated_at->format('H:i:s d.m.Y') }}
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('admin.freelancer.index') }}" class="btn btn-outline-secondary px-2 py-1">
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