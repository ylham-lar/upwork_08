@extends('admin.layouts.app')

@section('content')
<div class="row align-items-center mb-3">
    <div class="col-auto h2 p-3 ms-3 pb-3">
        Profiles
    </div>
    <div class="col text-end me-3">
        <a href="{{ route('admin.profile.create') }}" class="btn btn-primary">
            <i class="bi bi-person-plus-fill"></i>
        </a>
    </div>
</div>

<div class="table-responsive text-dark text-center">
    <table class="table table-bordered table-striped table-hover align-middle shadow-sm small">
        <thead class="table-light text-center align-middle">
            <tr>
                <th>ID</th>
                <th><i class="bi bi-person-fill text-primary me-1"></i> Freelancer</th>
                <th><i class="bi bi-card-text text-primary me-1"></i> Title</th>
                <th><i class="bi bi-file-text text-primary me-1"></i> Body</th>
                <th><i class="bi bi-gear me-1"></i> Settings</th>
            </tr>
        </thead>
        <tbody>
            @forelse($objs as $obj)
            <tr>
                <td class="text-center fw-medium text-muted">
                    <a href="{{ route('admin.profile.show', $obj->id) }}" class="text-decoration-none" target="_blank">
                        {{ $obj->id }}
                    </a>
                </td>

                <td>
                    <i class="bi bi-person-fill me-1 text-secondary"></i>
                    <a href="{{ $obj->freelancer
                            ? route('admin.freelancer.show', $obj->freelancer_id)
                            : route('admin.profile.index') }}" target="_blank" class="text-decoration-none">
                        {{ $obj->freelancer?->first_name ?? 'Unknown' }} {{ $obj->freelancer?->last_name ?? '' }}
                    </a>
                </td>

                <td>
                    <i class="bi bi-card-text me-1 text-secondary"></i>{{ $obj->title }}
                </td>

                <td>
                    <i class="bi bi-file-text me-1 text-secondary"></i>{{ Str::limit($obj->body, 80) }}
                </td>

                <td class="text-center">
                    <a href="{{ route('admin.profile.edit', $obj->id) }}" class="btn btn-sm btn-outline-dark btn-warning">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $obj->id }}">
                        <i class="bi-trash-fill"></i>
                    </button>

                    <div class="modal fade" id="deleteModal-{{ $obj->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $obj->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="modal-title fs-5" id="deleteModalLabel-{{ $obj->id }}">Delete</div>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this profile <strong>{{ $obj->id }}</strong>?
                                </div>
                                <div class="modal-footer">
                                    <form method="POST" action="{{ route('admin.profile.destroy', $obj->id) }}">
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
                <td colspan="5" class="text-center text-muted py-4">
                    <i class="bi bi-exclamation-circle text-warning me-2"></i>No profiles found
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection