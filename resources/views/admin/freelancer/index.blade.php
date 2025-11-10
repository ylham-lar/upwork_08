@extends('admin.layouts.app')
@section('content')

<div class="row align-items-center mb-3">
    <div class="col-auto h2 ps-3">Freelancers</div>
    <div class="col text-end p-3">
        <a href="{{ route('admin.freelancer.create') }}" class="btn btn-primary">
            <i class="bi bi-person-plus-fill"></i>
        </a>
    </div>
</div>

<div class="table-responsive text-center">
    <table class="table table-bordered table-striped table-hover align-middle shadow-sm small">
        <thead class="table-light text-center">
            <tr>
                <th>ID</th>
                <th><i class="bi bi-geo-alt-fill text-primary me-1"></i>Location</th>
                <th><i class="bi bi-person-badge-fill text-primary me-1"></i>Name</th>
                <th><i class="bi bi-person-circle text-primary me-1"></i>Username</th>
                <th><i class="bi bi-star-fill text-warning me-1"></i>Rating</th>
                <th><i class="bi bi-patch-check-fill text-success me-1"></i>Verified</th>
                <th><i class="bi bi-briefcase-fill text-primary me-1"></i>Total Jobs</th>
                <th><i class="bi bi-cash-stack text-success me-1"></i>Total Earnings</th>
                <th><i class="bi bi-gear me-1"></i>Settings</th>
            </tr>
        </thead>
        <tbody>
            @forelse($objs as $obj)
            <tr>
                <td class="text-center text-muted fw-medium">{{ $obj->id }}</td>
                <td>{{ $obj->location?->name ?? 'World' }}</td>
                <td class="fw-semibold">
                    <a href="{{ route('admin.freelancer.show', $obj->id) }}" class="btn btn-sm text-primary">
                        {{ $obj->first_name }} {{ $obj->last_name }}
                    </a>
                </td>
                <td>{{ $obj->username }}</td>
                <td><i class="bi bi-star-fill text-warning me-1"></i>{{ $obj->rating }}</td>
                <td>
                    <span class="badge bg-{{ $obj->verified_color() }}-subtle text-{{ $obj->verified_color() }} px-3 py-2 text-uppercase">
                        {{ $obj->verified() }}
                    </span>
                </td>
                <td><i class="bi bi-briefcase me-1 text-primary"></i>{{ $obj->total_jobs }}</td>
                <td><i class="bi bi-currency-dollar me-1 text-success"></i>{{ $obj->total_earnings }}</td>
                <td class="text-center">
                    <a href="{{ route('admin.freelancer.edit', $obj->id) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil"></i>
                    </a>

                    <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $obj->id }}">
                        <i class="bi-trash-fill"></i>
                    </button>

                    <div class="modal fade" id="deleteModal-{{ $obj->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $obj->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 shadow-lg rounded-4">
                                <div class="modal-header bg-danger text-white border-0 rounded-top p-3">
                                    <div class="fw-bold">Confirm Deletion</div>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body p-4 text-center">
                                    <i class="bi bi-exclamation-triangle-fill text-warning fs-1 mb-3"></i>
                                    <div class="fs-6">
                                        Are you sure you want to delete the freelancer
                                        <strong>{{ $obj->first_name }} {{ $obj->last_name }}</strong>?
                                    </div>
                                </div>

                                <div class="modal-footer justify-content-center border-0 mb-3">
                                    <form method="POST" action="{{ route('admin.freelancer.destroy', $obj->id) }}" class="d-flex gap-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger px-4">
                                            <i class="bi bi-trash-fill me-1"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="text-center text-muted py-4">
                    <i class="bi bi-exclamation-circle text-warning me-2"></i>No freelancers found
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection