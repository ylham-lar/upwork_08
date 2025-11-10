@extends('admin.layouts.app')

@section('content')
<div class="row align-items-center mb-3">
    <div class="col-auto h2 ps-3">Locations</div>
    <div class="col text-end p-3">
        <a href="{{ route('admin.location.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i>
        </a>
    </div>
</div>

<div class="table-responsive text-dark text-center">
    <table class="table table-bordered table-striped table-hover align-middle shadow-sm small">
        <thead class="table-light text-center align-middle">
            <tr>
                <th>ID</th>
                <th><i class="bi bi-geo-alt text-primary me-1"></i>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($objs as $obj)
            <tr>
                <td class="text-center text-muted fw-medium">{{ $obj->id }}</td>
                <td>
                    <i class="bi bi-geo-alt me-1 text-secondary"></i>{{ $obj->name }}
                </td>
                <td>
                    <a href="{{ route('admin.location.edit', $obj->id) }}" class="btn btn-sm btn-outline-dark btn-warning">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $obj->id }}">
                        <i class="bi bi-trash-fill"></i>
                    </button>

                    <div class="modal fade" id="deleteModal-{{ $obj->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $obj->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 shadow-lg rounded-4">
                                <div class="modal-header bg-danger text-white border-0 rounded-top p-3">
                                    <h5 class="modal-title fw-bold" id="deleteModalLabel-{{ $obj->id }}">
                                        Confirm Deletion
                                    </h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body p-4 text-center">
                                    <i class="bi bi-exclamation-triangle-fill text-warning fs-1 mb-3"></i>
                                    <p class="mb-0 fs-6">
                                        Are you sure you want to delete <strong>{{ $obj->name }}</strong>?
                                    </p>
                                </div>

                                <div class="modal-footer justify-content-center border-0 mb-3">
                                    <form method="POST" action="{{ route('admin.location.destroy', $obj->id) }}" class="d-flex gap-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">
                                            Cancel
                                        </button>
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
                <td colspan="3" class="text-center text-muted py-4">
                    <i class="bi bi-exclamation-circle text-warning me-2"></i>No locations found
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection 