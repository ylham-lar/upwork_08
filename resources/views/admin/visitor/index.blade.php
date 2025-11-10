@extends('admin.layouts.app')

@section('content')
<div class="h2 p-3 mb-3">
    Visitors
</div>

<div class="table-responsive text-dark text-center">
    <table class="table table-bordered table-striped table-hover align-middle shadow-sm small">
        <thead class="table-light text-center align-middle">
            <tr>
                <th>ID</th>
                <th><i class="bi bi-wifi text-primary me-1"></i>IP Address</th>
                <th><i class="bi bi-terminal text-primary me-1"></i>User Agent</th>
                <th><i class="bi bi-activity text-primary me-1"></i>Hits</th>
                <th><i class="bi bi-bug text-warning me-1"></i>Suspect Hits</th>
                <th><i class="bi bi-robot text-primary me-1"></i>Robot</th>
                <th><i class="bi bi-code-slash text-primary me-1"></i>API</th>
                <th><i class="bi bi-slash-circle text-danger me-1"></i>Disabled</th>
                <th><i class="bi bi-clock-history text-secondary me-1"></i>Created At</th>
                <th><i class="bi bi-clock text-secondary me-1"></i>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($visitors as $visitor)
            <tr>
                <td class="text-center fw-medium text-muted">{{ $visitor->id }}</td>

                <td>
                    @if($visitor->ip_address)
                    <a href="{{ route('admin.ipaddress.index', ['ip_address_id' => $visitor->ip_address_id]) }}" target="_blank" class="text-decoration-none text-primary fw-semibold">
                        <i class="bi bi-link-45deg me-1"></i>{{ $visitor->ip_address->ip_address }}
                    </a>
                    @else
                    <span class="text-muted">—</span>
                    @endif
                </td>

                <td class="text-break">
                    <i class="bi bi-terminal me-1 text-secondary"></i>{{ $visitor->useragent?->user_agent ?? 'Unknown' }}
                </td>

                <td>
                    <span class="badge bg-success-subtle text-success px-3 py-2">{{ $visitor->hits }}</span>
                </td>
                <td>
                    <span class="badge bg-warning-subtle text-warning px-3 py-2">{{ $visitor->suspect_hits }}</span>
                </td>

                <td>
                    <span class="badge px-3 py-2 {{ $visitor->robot ? 'bg-warning-subtle text-warning' : 'bg-success-subtle text-success' }}">
                        {{ $visitor->robot ? 'Yes' : 'No' }}
                    </span>
                </td>

                <td>
                    <span class="badge px-3 py-2 {{ $visitor->api ? 'bg-info-subtle text-info' : 'bg-secondary-subtle text-secondary' }}">
                        {{ $visitor->api ? 'Api' : 'Web' }}
                    </span>
                </td>

                <td>
                    <span class="badge px-3 py-2 {{ $visitor->disable ? 'bg-danger-subtle text-danger' : 'bg-success-subtle text-success' }}">
                        {{ $visitor->disable ? 'Disabled' : 'Active' }}
                    </span>
                </td>

                <td class="text-nowrap text-secondary">
                    <i class="bi bi-clock me-1"></i>{{ $visitor->created_at->format('H:i d.m.Y') }}
                </td>
                <td class="text-nowrap text-secondary">
                    <i class="bi bi-clock-history me-1"></i>{{ $visitor->updated_at->format('H:i d.m.Y') }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="10" class="text-center text-muted py-4">
                    <i class="bi bi-exclamation-circle text-warning me-2"></i>No visitors found
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
