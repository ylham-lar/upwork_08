@extends('admin.layouts.app')
@section('content')
<div class="h2 p-3 mb-3">
    Freelancers
</div>
<div class="table-responsive text-dark text-center">
    <table class="table table-bordered table-striped table-hover align-middle shadow-sm small">
        <thead class="table-light text-center align-middle">
            <tr>
                <th>ID</th>
                <th><i class="bi bi-geo-alt-fill text-primary me-1"></i>Location</th>
                <th><i class="bi bi-person-badge-fill text-primary me-1"></i>Name</th>
                <th><i class="bi bi-person-circle text-primary me-1"></i>Username</th>
                <th><i class="bi bi-star-fill text-warning me-1"></i>Rating</th>
                <th><i class="bi bi-patch-check-fill text-success me-1"></i>Verified</th>
                <th><i class="bi bi-briefcase-fill text-primary me-1"></i>Total Jobs</th>
                <th><i class="bi bi-cash-stack text-success me-1"></i>Total Earnings</th>
                <th><i class="bi bi-clock-history text-secondary me-1"></i>Created At</th>
                <th><i class="bi bi-clock text-secondary me-1"></i>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($freelancers as $freelancer)
            <tr>
                <td class="text-center fw-medium text-muted">
                    {{ $freelancer->id }}
                </td>
                <td>
                    {{ $freelancer->location ? $freelancer->location->name : 'World' }}
                </td>
                <td class="fw-semibold">
                    {{ $freelancer->first_name }} {{ $freelancer->last_name }}
                </td>
                <td>
                    {{ $freelancer->username }}
                </td>
                <td>
                    <i class="bi bi-star-fill text-warning me-1"></i>{{ $freelancer->rating }}
                </td>
                <td>
                    <span class="badge bg-{{ $freelancer->verified_color() }}-subtle text-{{ $freelancer->verified_color() }} px-3 py-2 text-uppercase">
                        {{ $freelancer->verified() }}
                    </span>
                </td>
                <td>
                    <i class="bi bi-briefcase me-1 text-primary"></i>{{ $freelancer->total_jobs }}
                </td>
                <td>
                    <i class="bi bi-currency-dollar me-1 text-success"></i>{{ $freelancer->total_earnings }}
                </td>
                <td class="text-nowrap text-secondary">
                    <i class="bi bi-clock me-1"></i>{{ $freelancer->created_at->format('H:i d.m.Y') }}
                </td>
                <td class="text-nowrap text-secondary">
                    <i class="bi bi-clock-history me-1"></i>{{ $freelancer->updated_at->format('H:i d.m.Y') }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="10" class="text-center text-muted py-4">
                    <i class="bi bi-exclamation-circle text-warning me-2"></i>No freelancers found
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection