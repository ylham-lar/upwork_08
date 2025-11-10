@extends('admin.layouts.app')

@section('content')
<div class="h2 p-3 mb-3">
    Verifications
</div>

<div class="table-responsive text-dark">
    <table class="table table-bordered table-striped table-hover align-middle shadow-sm small">
        <thead class="table-light text-center align-middle">
            <tr>
                <th>ID</th>
                <th><i class="bi bi-person-fill text-primary me-1"></i>Username</th>
                <th><i class="bi bi-shield-lock-fill text-primary me-1"></i>Method</th>
                <th><i class="bi bi-info-circle-fill text-primary me-1"></i>Status</th>
                <th><i class="bi bi-clock-fill text-primary me-1"></i>Created At</th>
                <th><i class="bi bi-clock-history text-primary me-1"></i>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($verifications as $verification)
            <tr>
                <td class="text-center fw-medium text-muted">{{ $verification->id }}</td>
                <td>
                    <i class="bi bi-person-fill me-1 text-secondary"></i>{{ $verification->username }}
                </td>
                <td class="text-center">
                    <i class="bi-{{ $verification->getMethodIcon() }} me-1 text-secondary"></i>{{ $verification->getMethod() }}
                </td>
                <td class="text-center">
                    <span class="badge px-3 py-2 bg-{{ $verification->StatusColor() }}-subtle text-{{ $verification->StatusColor() }}">
                        {{ $verification->Status() }}
                    </span>
                </td>
                <td class="text-center">
                    <i class="bi bi-clock me-1 text-secondary"></i>{{ $verification->created_at->format('H:i:s d.m.Y') }}
                </td>
                <td class="text-center">
                    <i class="bi bi-clock me-1 text-secondary"></i>{{ $verification->updated_at->format('H:i:s d.m.Y') }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center text-muted py-4">
                    <i class="bi bi-exclamation-circle text-warning me-2"></i>No verifications found
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection