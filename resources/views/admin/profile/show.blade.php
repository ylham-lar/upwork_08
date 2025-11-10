@extends('admin.layouts.app')

@section('content')
<div class="container-xxl py-4">

    <div class="card shadow-lg border-0 rounded-4 mb-4">
        <div class="card-body py-4 px-5 d-flex flex-wrap justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold mb-2 text-dark">
                    <i class="bi bi-person-badge text-primary me-2"></i>
                    {{ $obj->freelancer?->first_name ?? 'Unknown' }}
                    {{ $obj->freelancer?->last_name ?? '' }}
                </h2>
                <p class="text-secondary mb-1 fs-6">
                    <i class="bi bi-bookmark text-success me-1"></i>
                    <strong>Profile Title:</strong> {{ $obj->title ?? 'Untitled Profile' }}
                </p>
            </div>

            <div class="d-flex flex-column align-items-end mt-3 mt-md-0">
                <div class="mb-2">
                    <a href="{{ route('admin.freelancer.show', $obj->freelancer_id) }}" class="btn btn-success btn-sm shadow-sm rounded-3">
                        <i class="bi bi-arrow-left-circle me-1"></i>
                    </a>
                    <a href="{{ route('admin.profile.edit', $obj->id) }}" class="btn btn-warning btn-sm shadow-sm rounded-3">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <button type="button" class="btn btn-danger btn-sm shadow-sm rounded-3" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $obj->id }}">
                        <i class="bi bi-trash-fill"></i>
                    </button>
                </div>
                <div class="text-muted small">
                    <p class="mb-1">
                        <i class="bi bi-clock-history me-1 text-primary"></i>
                        <strong>Created:</strong> {{ $obj->created_at->format('H:i:s d.m.Y') }}
                    </p>
                    <p class="mb-0">
                        <i class="bi bi-clock me-1 text-primary"></i>
                        <strong>Updated:</strong> {{ $obj->updated_at->format('H:i:s d.m.Y') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0 rounded-4 mb-4">
        <div class="card-body py-4 px-5">
            <h4 class="fw-bold mb-4 text-dark">
                <i class="bi bi-card-text text-primary me-2"></i>Profile Description
            </h4>
            @if($obj->body)
            <p class="text-secondary lh-lg mb-0">{!! nl2br(e($obj->body)) !!}</p>
            @else
            <p class="text-muted mb-0">
                <i class="bi bi-exclamation-circle text-warning me-2"></i>No description provided.
            </p>
            @endif
        </div>
    </div>

    @if($obj->skills?->count())
    <div class="card shadow-sm border-0 rounded-4 mb-4">
        <div class="card-body py-4 px-5">
            <h4 class="fw-bold mb-3 text-dark">
                <i class="bi bi-lightbulb-fill text-warning me-2"></i>Skills
            </h4>
            <div class="d-flex flex-wrap gap-2">
                @foreach($obj->skills as $skill)
                <span class="badge bg-secondary-subtle text-secondary-emphasis fs-6 px-3 py-2 rounded-pill">
                    {{ $skill->name }}
                </span>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <div class="modal fade" id="deleteModal-{{ $obj->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $obj->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow-lg">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold" id="deleteModalLabel-{{ $obj->id }}">Delete Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this profile <strong>#{{ $obj->id }}</strong>?
                </div>
                <div class="modal-footer border-0">
                    <form method="POST" action="{{ route('admin.profile.destroy', $obj->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection