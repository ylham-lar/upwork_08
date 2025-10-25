@extends('admin.layouts.app')
@section('content')
<div class="h2 p-3 mb-3">
    Skills
</div>
<div class="table-responsive text-dark text-center">
    <table class="table table-bordered table-striped table-hover align-middle shadow-sm small">
        <thead class="table-light text-center align-middle">
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @forelse($skills as $skill)
            <tr>
                <td class="text-center fw-medium text-muted">
                   {{ $skill->id }}
                </td>
                <td>
                    {{ $skill->name }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="2" class="text-center text-muted py-4">
                    <i class="bi bi-exclamation-circle text-warning me-2"></i>No skills found
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection