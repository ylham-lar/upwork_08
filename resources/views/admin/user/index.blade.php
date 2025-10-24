@extends('admin.layouts.app')
@section('content')
<div class="h2 p-3 mb-3">
    Users
</div>
<div class="table-responsive text-dark text-center">
    <table class="table table-bordered table-striped table-hover align-middle shadow-sm small">
        <thead class="table-light text-center align-middle">
            <tr>
                <th>ID</th>
                <th><i class="bi bi-person-fill text-primary me-1"></i>Name</th>
                <th><i class="bi bi-person-badge-fill text-primary me-1"></i>Username</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td class="text-center fw-medium text-muted">
                    {{ $user->id }}
                </td>
                <td>
                    <i class="bi bi-person-fill me-1 text-secondary"></i>{{ $user->name }}
                </td>
                <td>
                    <i class="bi bi-person-badge-fill me-1 text-secondary"></i>{{ $user->username }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center text-muted py-4">
                    <i class="bi bi-exclamation-circle text-warning me-2"></i>No users found
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection