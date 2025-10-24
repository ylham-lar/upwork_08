@extends('admin.layouts.app')
@section('content')
<div class="h2 p-3 mb-3">
    Locations
</div>
<div class="table-responsive text-dark text-center">
    <table class="table table-bordered table-striped table-hover align-middle shadow-sm small">
        <thead class="table-light text-center align-middle">
            <tr>
                <th>ID</th>
                <th><i class="bi bi-geo-alt text-primary me-1"></i>Name</th>
            </tr>
        </thead>
        <tbody>
            @forelse($locations as $location)
            <tr>
                <td class="text-center fw-medium text-muted">
                    {{ $location->id }}
                </td>
                <td>
                    <i class="bi bi-geo-alt me-1 text-secondary"></i>{{ $location->name }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="2" class="text-center text-muted py-4">
                    <i class="bi bi-exclamation-circle text-warning me-2"></i>No locations found
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection