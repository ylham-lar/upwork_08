@extends('admin.layouts.app')

@section('content')
<div class="h2 p-3 mb-3">
    Reviews
</div>

<div class="table-responsive text-dark text-center">
    <table class="table table-bordered table-striped table-hover align-middle shadow-sm small">
        <thead class="table-light text-center align-middle">
            <tr>
                <th>ID</th>
                <th><i class="bi bi-person-fill text-primary me-1"></i>Freelancer</th>
                <th><i class="bi bi-person-badge-fill text-primary me-1"></i>Client</th>
                <th><i class="bi bi-envelope text-primary me-1"></i>From</th>
                <th><i class="bi bi-star-fill text-warning me-1"></i>Rating</th>
                <th><i class="bi bi-chat-text text-primary me-1"></i>Comment</th>
                <th><i class="bi bi-clock-fill text-primary me-1"></i>Created At</th>
                <th><i class="bi bi-clock-history text-primary me-1"></i>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reviews as $review)
            <tr>
                <td class="text-center fw-medium text-muted">{{ $review->id }}</td>

                <td>
                    <i class="bi bi-person-fill me-1 text-secondary"></i>
                    <a href="{{ route('admin.freelancer.show', $review->freelancer_id) }}" class="text-decoration-none" target="_blank">
                        {{ $review->freelancer?->first_name ?? 'Unknown' }} {{ $review->freelancer?->last_name ?? '' }}
                    </a>
                </td>

                <td>
                    <i class="bi bi-person-badge-fill me-1 text-secondary"></i>
                    <a href="{{ route('admin.client.show', $review->client_id) }}" class="text-decoration-none" target="_blank">
                        {{ $review->client?->first_name ?? 'Unknown' }} {{ $review->client?->last_name ?? '' }}
                    </a>
                </td>

                <td class="text-center">
                    <i class="bi bi-envelope me-1 text-secondary"></i>{{ $review->from ?? '—' }}
                </td>

                <td class="text-center">
                    <i class="bi bi-star-fill text-warning me-1"></i>{{ $review->rating ?? '0.0' }}
                </td>

                <td>
                    <i class="bi bi-chat-text me-1 text-secondary"></i>{{ Str::limit($review->comment, 90, '...') }}
                </td>

                <td class="text-center text-secondary">
                    <i class="bi bi-clock me-1"></i>{{ $review->created_at->format('H:i:s d.m.Y') }}
                </td>

                <td class="text-center text-secondary">
                    <i class="bi bi-clock me-1"></i>{{ $review->updated_at->format('H:i:s d.m.Y') }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center text-muted py-4">
                    <i class="bi bi-exclamation-circle text-warning me-2"></i>No reviews found
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
