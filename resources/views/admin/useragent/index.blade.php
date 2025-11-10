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
                <td class="text-center fw-medium text-muted">{{ $useragent->id }}</td>
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
                    <span class="badge px-3 py-2 {{ $useragent->robot ? 'bg-warning-subtle text-warning' : 'bg-success-subtle text-success' }}">
                        {{ $useragent->robot ? 'Yes' : 'No' }}
                    </span>
                </td>
                <td>
                    <span class="badge px-3 py-2 {{ $useragent->disable ? 'bg-danger-subtle text-danger' : 'bg-success-subtle text-success' }}">
                        {{ $useragent->disable ? 'Disabled' : 'Active' }}
                    </span>
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