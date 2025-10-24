@extends('admin.layouts.app')
@section('content')
<div class="h2 p-3 mb-3">
    Profiles
</div>
<div class="table-responsive text-dark text-center">
    <table class="table table-bordered table-striped table-hover align-middle shadow-sm small">
        <thead class="table-light text-center align-middle">
            <tr>
                <th>ID</th>
                <th><i class="bi bi-person-fill text-primary me-1"></i>Freelancer</th>
                <th><i class="bi bi-card-text text-primary me-1"></i>Title</th>
                <th><i class="bi bi-file-text text-primary me-1"></i>Body Letter</th>
                <th><i class="bi bi-clock-fill text-primary me-1"></i>Created At</th>
                <th><i class="bi bi-clock-history text-primary me-1"></i>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($profiles as $profile)
            <tr>
                <td class="text-center fw-medium text-muted">
                    {{ $profile->id }}
                </td>
                <td>
                    <i class="bi bi-person-fill me-1 text-secondary"></i>
                    {{ $profile->freelancer?->first_name }} {{ $profile->freelancer?->last_name }}
                </td>
                <td>
                    <i class="bi bi-card-text me-1 text-secondary"></i>{{ $profile->title }}
                </td>
                <td>
                    <i class="bi bi-file-text me-1 text-secondary"></i>{{ Str::limit($profile->body, 80) }}
                </td>
                <td class="text-center">
                    <i class="bi bi-clock me-1 text-secondary"></i>{{ $profile->created_at->format('H:i:s d.m.Y') }}
                </td>
                <td class="text-center">
                    <i class="bi bi-clock me-1 text-secondary"></i>{{ $profile->updated_at->format('H:i:s d.m.Y') }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center text-muted py-4">
                    <i class="bi bi-exclamation-circle text-warning me-2"></i>No profiles found
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection