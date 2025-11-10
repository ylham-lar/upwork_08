@extends('admin.layouts.app')

@section('content')
<div class="h2 p-3 mb-3">
    Proposals
</div>

<div class="table-responsive text-dark text-center">
    <table class="table table-bordered table-striped table-hover align-middle shadow-sm small">
        <thead class="table-light text-center align-middle">
            <tr>
                <th>ID</th>
                <th><i class="bi bi-briefcase-fill text-primary me-1"></i>Work ID</th>
                <th><i class="bi bi-card-text text-primary me-1"></i>Profile ID</th>
                <th><i class="bi bi-person-fill text-primary me-1"></i>Freelancer</th>
                <th><i class="bi bi-file-text text-primary me-1"></i>Cover Letter</th>
                <th><i class="bi bi-info-circle text-primary me-1"></i>Status</th>
                <th><i class="bi bi-clock-fill text-primary me-1"></i>Created At</th>
                <th><i class="bi bi-clock-history text-primary me-1"></i>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($proposals as $proposal)
            <tr>
                <td class="text-center fw-medium text-muted">{{ $proposal->id }}</td>

                <td class="text-center">
                    <a href="{{ route('admin.work.show', $proposal->work_id) }}" class="text-decoration-none" target="_blank">
                        {{ $proposal->work->id ?? '—' }}
                    </a>
                </td>

                <td class="text-center">
                    <a href="{{ route('admin.profile.show', $proposal->profile_id) }}" class="text-decoration-none" target="_blank">
                        {{ $proposal->profile?->id ?? '—' }}
                    </a>
                </td>

                <td>
                    <i class="bi bi-person-fill me-1 text-secondary"></i>
                    <a href="{{ route('admin.freelancer.show', $proposal->freelancer_id) }}" class="text-decoration-none" target="_blank">
                        {{ $proposal->freelancer?->first_name ?? 'Unknown' }} {{ $proposal->freelancer?->last_name ?? '' }}
                    </a>
                </td>

                <td>
                    <i class="bi bi-file-text me-1 text-secondary"></i>
                    {{ Str::limit($proposal->cover_letter, 90, '...') }}
                </td>

                <td class="text-center">
                    <span class="badge bg-{{ $proposal->statuscolor() }}-subtle text-{{ $proposal->statuscolor() }}-emphasis px-3 py-2">
                        {{ $proposal->status() }}
                    </span>
                </td>

                <td class="text-center text-secondary">
                    <i class="bi bi-clock me-1"></i>{{ $proposal->created_at->format('H:i:s d.m.Y') }}
                </td>

                <td class="text-center text-secondary">
                    <i class="bi bi-clock me-1"></i>{{ $proposal->updated_at->format('H:i:s d.m.Y') }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center text-muted py-4">
                    <i class="bi bi-exclamation-circle text-warning me-2"></i>No proposals found
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
