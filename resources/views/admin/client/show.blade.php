@extends('admin.layouts.app')

@section('content')
<div class="container-xxl py-4">

    <div class="card shadow-lg border-0 rounded-4 mb-4">
        <div class="card-body py-4 px-5">
            <div class="row align-items-center">
                <div class="col-md-6 mb-3 mb-md-0">
                    <div class="fw-bold text-dark h3 mb-2">
                        <i class="bi bi-person-badge-fill text-primary me-2"></i>
                        {{ $objs->first_name }} {{ $objs->last_name }}
                    </div>
                    <div class="text-secondary small">
                        <i class="bi bi-geo-alt-fill text-danger me-1"></i>{{ $objs->location?->name ?? 'World' }}
                        <span class="mx-2">|</span>
                        <i class="bi bi-phone-fill text-success me-1"></i>{{ $objs->username }}
                    </div>
                </div>

                <div class="col-md-6 d-flex flex-wrap justify-content-md-end justify-content-center gap-4">
                    <div class="text-center">
                        <div class="fw-bold mb-0 text-info h4">
                            <i class="bi bi-briefcase me-1"></i>{{ $objs->total_jobs ?? 0 }}
                        </div>
                        <div class="text-secondary small">Total Jobs</div>
                    </div>

                    <div class="text-center">
                        <div class="fw-bold mb-0 text-success h4">${{ number_format($objs->total_spent ?? 0) }}</div>
                        <div class="text-secondary small">Total Spent</div>
                    </div>

                    <div class="text-center">
                        <div class="fw-bold mb-0 text-warning h4">
                            <i class="bi bi-star-fill me-1"></i>{{ $objs->rating ?? '0.0' }}
                        </div>
                        <div class="text-secondary small">Rating</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">

        <div class="col-md-6">
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-body p-4 d-flex flex-column">
                    <div class="fw-bold mb-3 h5">
                        <i class="bi bi-chat-dots text-primary me-2"></i> My Reviews
                    </div>

                    @if($objs->myReviews->isEmpty())
                    <div class="text-center text-muted py-3 flex-grow-1 d-flex align-items-center justify-content-center">
                        <div class="small"><i class="bi bi-exclamation-circle text-warning me-1"></i>No reviews yet</div>
                    </div>
                    @else
                    <div class="flex-grow-1">
                        @foreach($objs->myReviews->take(2) as $review)
                        <div class="d-flex justify-content-between align-items-start py-2 px-2 border-bottom">
                            <div class="small fw-semibold" title="{{ $review->comment }}">
                                {{ Str::limit($review->comment, 160) }}
                            </div>
                            <div class="badge bg-primary rounded-pill fs-7 align-self-start">{{ $review->rating }}/5</div>
                        </div>
                        @endforeach
                    </div>

                    @if($objs->myReviews->count() > 2)
                    <div class="mt-2">
                        <button class="btn btn-link btn-sm p-0" type="button" data-bs-toggle="collapse" data-bs-target="#allMyReviews" aria-expanded="false">
                            Show All Reviews
                        </button>
                        <div class="collapse mt-2" id="allMyReviews">
                            @foreach($objs->myReviews->skip(2) as $review)
                            <div class="d-flex justify-content-between align-items-start py-2 px-2 border-bottom">
                                <div class="small fw-semibold" title="{{ $review->comment }}">
                                    {{ Str::limit($review->comment, 120) }}
                                </div>
                                <div class="badge bg-primary rounded-pill fs-7 align-self-start">{{ $review->rating }}/5</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-body p-4 d-flex flex-column">
                    <div class="fw-bold mb-3 h5">
                        <i class="bi bi-chat-quote text-success me-2"></i> Client Reviews
                    </div>

                    @if($objs->freelancerReviews->isEmpty())
                    <div class="text-center text-muted py-3 flex-grow-1 d-flex align-items-center justify-content-center">
                        <div class="small"><i class="bi bi-exclamation-circle text-warning me-1"></i>No reviews yet</div>
                    </div>
                    @else
                    <div class="flex-grow-1">
                        @foreach($objs->freelancerReviews->take(2) as $review)
                        <div class="d-flex justify-content-between align-items-start py-2 px-2 border-bottom">
                            <div class="small fw-semibold" title="{{ $review->comment }}">
                                {{ Str::limit($review->comment, 160) }}
                            </div>
                            <div class="badge bg-success rounded-pill fs-7 align-self-start">{{ $review->rating }}/5</div>
                        </div>
                        @endforeach
                    </div>

                    @if($objs->freelancerReviews->count() > 2)
                    <div class="mt-2">
                        <button class="btn btn-link btn-sm p-0" type="button" data-bs-toggle="collapse" data-bs-target="#allClientReviews" aria-expanded="false">
                            Show All Reviews
                        </button>
                        <div class="collapse mt-2" id="allClientReviews">
                            @foreach($objs->freelancerReviews->skip(2) as $review)
                            <div class="d-flex justify-content-between align-items-start py-2 px-2 border-bottom">
                                <div class="small fw-semibold" title="{{ $review->comment }}">
                                    {{ Str::limit($review->comment, 120) }}
                                </div>
                                <div class="badge bg-success rounded-pill fs-7 align-self-start">{{ $review->rating }}/5</div>
                            </div>
                            @endforeach
                        </div>
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
                    <div class="fw-bold mb-3 h5">
                        <i class="bi bi-briefcase-fill text-primary me-2"></i> Client Works
                    </div>

                    @if($objs->works->isEmpty())
                    <div class="text-center text-muted mb-0">No works found.</div>
                    @else
                    <div class="row g-3">
                        @foreach($objs->works->take(2) as $work)
                        <div class="col-12">
                            <div class="card border-0 shadow-sm rounded-4 h-100 bg-light p-3">
                                <div class="fw-bold text-start">
                                    Freelancer:
                                    @if($work->freelancer_id)
                                    <a href="{{ route('admin.freelancer.show', $work->freelancer_id) }}" class="btn btn-sm text-primary fw-bold">
                                        {{ $work->freelancer?->first_name || $work->freelancer?->last_name
                                                        ? $work->freelancer->first_name.' '.$work->freelancer->last_name
                                                        : 'Unknown' }}
                                    </a>
                                    @else
                                    <span class="text-primary">Unknown</span>
                                    @endif
                                </div>
                                <div class="fw-bold mb-1">{{ $work->title ?? 'Untitled Project' }}</div>
                                <div class="text-muted small mb-2">
                                    <i class="bi bi-clock-history me-1"></i>{{ $work->project_length() }}
                                </div>
                                <div class="d-flex flex-wrap gap-2">
                                    <div class="badge bg-{{ $work->experience_level_color() }}-subtle text-{{ $work->experience_level_color() }}">
                                        {{ $work->experience_level() }}
                                    </div>
                                    <div class="badge bg-{{ $work->job_type_color() }}-subtle text-{{ $work->job_type_color() }}">
                                        {{ $work->job_type() }}
                                    </div>
                                    <div class="badge bg-{{ $work->project_type_color() }}-subtle text-{{ $work->project_type_color() }}">
                                        {{ $work->project_type() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    @if($objs->works->count() > 2)
                    <div class="mt-3">
                        <button class="btn btn-link btn-sm p-0" type="button" data-bs-toggle="collapse" data-bs-target="#allWorks" aria-expanded="false">
                            Show All Works
                        </button>
                        <div class="collapse mt-3" id="allWorks">
                            <div class="row g-3">
                                @foreach($objs->works->skip(2) as $work)
                                <div class="col-12">
                                    <div class="card border-0 shadow-sm rounded-4 h-100 bg-light p-3">
                                        <div class="fw-bold text-start">
                                            Freelancer:
                                            @if($work->freelancer_id)
                                            <a href="{{ route('admin.freelancer.show', $work->freelancer_id) }}" class="btn btn-sm text-primary fw-bold">
                                                {{ $work->freelancer?->first_name || $work->freelancer?->last_name
                                                                    ? $work->freelancer->first_name.' '.$work->freelancer->last_name
                                                                    : 'Unknown' }}
                                            </a>
                                            @else
                                            <span class="text-primary">Unknown</span>
                                            @endif
                                        </div>
                                        <div class="fw-bold mb-1">{{ $work->title ?? 'Untitled Project' }}</div>
                                        <div class="text-muted small mb-2">
                                            <i class="bi bi-clock-history me-1"></i>{{ $work->project_length() }}
                                        </div>
                                        <div class="d-flex flex-wrap gap-2">
                                            <div class="badge bg-{{ $work->experience_level_color() }}-subtle text-{{ $work->experience_level_color() }}">
                                                {{ $work->experience_level() }}
                                            </div>
                                            <div class="badge bg-{{ $work->job_type_color() }}-subtle text-{{ $work->job_type_color() }}">
                                                {{ $work->job_type() }}
                                            </div>
                                            <div class="badge bg-{{ $work->project_type_color() }}-subtle text-{{ $work->project_type_color() }}">
                                                {{ $work->project_type() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-body p-4">
                    <div class="fw-bold mb-3 h5">
                        <i class="bi bi-shield-lock-fill text-primary me-2"></i> Verification
                    </div>

                    <div class="mb-2 small">
                        Phone Verified:
                        <span class="{{ $objs->phone_number_verified ? 'text-success' : 'text-danger' }} fw-bold">
                            <i class="bi {{ $objs->phone_number_verified ? 'bi-check-circle-fill' : 'bi-x-circle-fill' }}"></i>
                        </span>
                    </div>

                    <div class="mb-3 small">
                        Payment Verified:
                        <span class="{{ $objs->payment_method_verified ? 'text-success' : 'text-danger' }} fw-bold">
                            <i class="bi {{ $objs->payment_method_verified ? 'bi-check-circle-fill' : 'bi-x-circle-fill' }}"></i>
                        </span>
                    </div>

                    <hr>

                    <div class="text-muted small">
                        <div class="mb-1">
                            <i class="bi bi-clock-history text-primary me-1"></i> Created: {{ $objs->created_at->format('H:i:s d.m.Y') }}
                        </div>
                        <div class="mb-2">
                            <i class="bi bi-clock text-primary me-1"></i> Updated: {{ $objs->updated_at->format('H:i:s d.m.Y') }}
                        </div>
                        <a href="{{ route('admin.client.index') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-arrow-left-circle me-1"></i> Back
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection