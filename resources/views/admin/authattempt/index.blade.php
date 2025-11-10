@extends('admin.layouts.app')
@section('content')
<div class="h2 p-3 mb-3">Auth Attempts</div>

<div class="table-responsive text-dark text-center">
    <table class="table table-bordered table-striped table-hover align-middle shadow-sm small">
        <thead class="table-light text-center align-middle">
            <tr>
                <th>ID</th>
                <th><i class="bi bi-wifi text-primary me-1"></i>IP Address</th>
                <th><i class="bi bi-browser-chrome text-primary me-1"></i>User Agent</th>
                <th><i class="bi bi-person-fill text-primary me-1"></i>Username</th>
                <th><i class="bi bi-activity text-primary me-1"></i>Event</th>
                <th><i class="bi bi-clock-history text-secondary me-1"></i>Created At</th>
                <th><i class="bi bi-clock-history text-secondary me-1"></i>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($authAttempts as $authAttempt)
            <tr>
                <td class="text-center fw-medium text-muted">{{ $authAttempt->id }}</td>

                <td>
                    @if($authAttempt->ipAddress)
                    <i class="bi bi-link-45deg me-1"></i>{{ $authAttempt->ipAddress->getIp() }}
                    <div class="small text-secondary">{{ $authAttempt->ipAddress->ip_address }}</div>
                    @else
                    <span class="text-muted">—</span>
                    @endif
                </td>

                <td>
                    @if($authAttempt->userAgent)
                    {{ $authAttempt->userAgent->getUa() }}
                    <div class="small text-secondary">{{ $authAttempt->userAgent->user_agent }}</div>
                    @else
                    <span class="text-muted">—</span>
                    @endif
                </td>

                <td class="fw-semibold">{{ $authAttempt->username }}</td>

                <td>
                    <span class="badge bg-info-subtle text-info px-3 py-2 text-uppercase">
                        {{ $authAttempt->event }}
                    </span>
                </td>

                <td class="text-nowrap text-secondary">
                    <i class="bi bi-clock me-1"></i>{{ $authAttempt->created_at->format('H:i d.m.Y') }}
                </td>

                <td class="text-nowrap text-secondary">
                    <i class="bi bi-clock-history me-1"></i>{{ optional($authAttempt->updated_at)->format('H:i d.m.Y') ?? '—' }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center text-muted py-4">
                    <i class="bi bi-exclamation-circle text-warning me-2"></i>No data found
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection