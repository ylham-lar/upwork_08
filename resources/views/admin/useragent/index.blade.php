@extends('admin.layouts.app')
@section('content')
<div class="h2 p-3 mb-3">
    User Agents
</div>
<div class="table-responsive text-dark text-center">
    <table class="table table-bordered table-striped table-hover align-middle shadow-sm small">
        <thead class="table-light text-center align-middle">
            <tr>
                <th>ID</th>
                <th><i class="bi bi-terminal text-primary me-1"></i>User Agent</th>
                <th><i class="bi bi-phone-fill text-primary me-1"></i>Device</th>
                <th><i class="bi bi-cpu-fill text-primary me-1"></i>Platform</th>
                <th><i class="bi bi-browser-chrome text-primary me-1"></i>Browser</th>
                <th><i class="bi bi-robot text-primary me-1"></i>Robot</th>
                <th><i class="bi bi-slash-circle text-danger me-1"></i>Disabled</th>
            </tr>
        </thead>
        <tbody>
            @forelse($useragents as $useragent)
            <tr>
                <td class="text-center fw-medium text-muted">
                    {{ $useragent->id }}
                </td>
                <td class="text-break">
                    <i class="bi bi-terminal me-1 text-secondary"></i>{{ $useragent->user_agent }}
                </td>
                <td>
                    <i class="bi bi-phone me-1 text-secondary"></i>{{ $useragent->device ?? 'Unknown' }}
                </td>
                <td>
                    <i class="bi bi-cpu me-1 text-secondary"></i>{{ $useragent->platform ?? 'Unknown' }}
                </td>
                <td>
                    <i class="bi bi-browser-chrome me-1 text-secondary"></i>{{ $useragent->browser ?? 'Unknown' }}
                </td>
                <td>
                    @if($useragent->robot)
                    <span class="badge bg-warning-subtle text-warning px-3 py-2">Yes</span>
                    @else
                    <span class="badge bg-success-subtle text-success px-3 py-2">No</span>
                    @endif
                </td>
                <td>
                    @if($useragent->disable)
                    <span class="badge bg-danger-subtle text-danger px-3 py-2">Disabled</span>
                    @else
                    <span class="badge bg-success-subtle text-success px-3 py-2">Active</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center text-muted py-4">
                    <i class="bi bi-exclamation-circle text-warning me-2"></i>No user agents found
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection