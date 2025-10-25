@extends('admin.layouts.app')
@section('content')
<div class="h2 p-3 mb-3">
    Clients
</div>
<div class="table-responsive text-dark text-center">
    <table class="table table-bordered table-striped table-hover align-middle shadow-sm small">
        <thead class="table-light text-center align-middle">
            <tr>
                <th>ID</th>
                <th><i class="bi bi-geo-alt-fill text-primary me-1"></i>Location</th>
                <th><i class="bi bi-person-fill text-primary me-1"></i>Name</th>
                <th><i class="bi bi-person-badge text-primary me-1"></i>Username</th>
                <th><i class="bi bi-star-fill text-warning me-1"></i>Rating</th>
                <th><i class="bi bi-phone-fill text-primary me-1"></i>Phone Verified</th>
                <th><i class="bi bi-credit-card-fill text-primary me-1"></i>Payment Verified</th>
                <th><i class="bi bi-briefcase-fill text-primary me-1"></i>Total Jobs</th>
                <th><i class="bi bi-currency-dollar text-success me-1"></i>Total Spent</th>
                <th><i class="bi bi-clock-history text-secondary me-1"></i>Created At</th>
                <th><i class="bi bi-clock text-secondary me-1"></i>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($clients as $client)
            <tr>
                <td class="text-center fw-medium text-muted">{{ $client->id }}</td>
                <td>{{ $client->location?->name ?? '🌍 World' }}</td>
                <td class="fw-semibold">{{ $client->first_name }} {{ $client->last_name }} </td>
                <td class="text-muted">{{ $client->username }}</td>
                <td>
                    <i class="bi bi-star-fill text-warning me-1"></i>{{ number_format($client->rating, 1) }}
                </td>
                <td>
                    <span class="badge bg-{{ $client->phone_number_verified_color() }}-subtle text-{{ $client->phone_number_verified_color() }} px-3 py-2 text-uppercase">
                        {{ $client->phone_number_verified() }}
                    </span>
                </td>
                <td>
                    <span class="badge bg-{{ $client->payment_method_verified_color() }}-subtle text-{{ $client->payment_method_verified_color() }} px-3 py-2 text-uppercase">
                        {{ $client->payment_method_verified() }}
                    </span>
                </td>
                <td class="text-center">
                    <i class="bi bi-briefcase me-1 text-secondary"></i>{{ $client->total_jobs }}
                </td>
                <td class="text-success fw-semibold">
                    <i class="bi bi-currency-dollar me-1"></i>{{ number_format($client->total_spent, 2) }}
                </td>
                <td class="text-nowrap text-secondary">
                    <i class="bi bi-clock me-1"></i>{{ $client->created_at->format('H:i d.m.Y') }}
                </td>
                <td class="text-nowrap text-secondary">
                    <i class="bi bi-clock-history me-1"></i>{{ $client->updated_at->format('H:i d.m.Y') }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="11" class="text-center text-muted py-4">
                    <i class="bi bi-exclamation-circle text-warning me-2"></i>Hech qanday ma’lumot topilmadi
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection