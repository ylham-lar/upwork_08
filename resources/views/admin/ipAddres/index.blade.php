@extends('admin.layouts.app')

@section('content')
<div class="h2 p-3 mb-3">
    Ip Addresses
</div>

<div class="table-responsive text-dark text-center">
    <table class="table table-bordered table-striped table-hover align-middle shadow-sm small">
        <thead class="table-light text-center align-middle">
            <tr>
                <th>ID</th>
                <th><i class="bi bi-wifi text-primary me-1"></i>IP Address</th>
                <th><i class="bi bi-flag text-primary me-1"></i>Country Code</th>
                <th><i class="bi bi-globe2 text-primary me-1"></i>Country Name</th>
                <th><i class="bi bi-geo-alt-fill text-primary me-1"></i>City Name</th>
                <th><i class="bi bi-clock-history text-secondary me-1"></i>Created At</th>
                <th><i class="bi bi-clock text-secondary me-1"></i>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ip_Addresses as $ip_Address)
            <tr>
                <td class="text-center text-muted fw-medium">{{ $ip_Address->id }}</td>
                <td class="fw-semibold">
                    <i class="bi bi-wifi me-1 text-primary"></i>{{ $ip_Address->ip_address }}
                </td>
                <td>
                    <span class="badge bg-info-subtle text-info px-3 py-2 text-uppercase">
                        {{ $ip_Address->country_code ?? 'N/A' }}
                    </span>
                </td>
                <td>
                    <i class="bi bi-globe-americas me-1 text-secondary"></i>{{ $ip_Address->country_name ?? 'Unknown' }}
                </td>
                <td>
                    <i class="bi bi-geo-alt me-1 text-secondary"></i>{{ $ip_Address->city_name ?? 'Unknown' }}
                </td>
                <td class="text-nowrap text-secondary">
                    <i class="bi bi-clock me-1"></i>{{ $ip_Address->created_at?->format('H:i d.m.Y') ?? '—' }}
                </td>
                <td class="text-nowrap text-secondary">
                    <i class="bi bi-clock-history me-1"></i>{{ $ip_Address->updated_at?->format('H:i d.m.Y') ?? '—' }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center text-muted py-4">
                    <i class="bi bi-exclamation-circle text-warning me-2"></i>No IP addresses found
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection