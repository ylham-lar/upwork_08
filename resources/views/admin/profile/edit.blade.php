@extends('admin.layouts.app')

@section('content')
<div class="container-sm py-4">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-8">

            <div class="h4 mb-4 d-flex align-items-center justify-content-between">
                <div>
                    <a href="{{ route('admin.profile.index') }}" class="text-decoration-none text-success">
                        <i class="bi bi-person-workspace me-1"></i> Profile
                    </a>
                    <span> / Edit</span>
                </div>
            </div>

            @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm rounded-3">
                {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger border-0 shadow-sm rounded-3">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">
                    <form action="{{ route('admin.profile.update', $obj->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Freelancer</label>
                            <input type="text" class="form-control bg-light text-dark" value="{{ $obj->freelancer?->first_name }} {{ $obj->freelancer?->last_name }} (ID: {{ $obj->freelancer_id }})" readonly>
                            <input type="hidden" name="freelancer_id" value="{{ $obj->freelancer_id }}">
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label fw-semibold">Title</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $obj->title) }}" required>
                            @error('title')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="body" class="form-label fw-semibold">Body</label>
                            <textarea name="body" id="body" rows="6" class="form-control @error('body') is-invalid @enderror" required>{{ old('body', $obj->body) }}</textarea>
                            @error('body')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-center d-flex justify-content-center gap-3">
                            <a href="{{ route('admin.profile.index') }}" class="btn btn-outline-secondary px-4 py-2">
                                <i class="bi bi-arrow-left-circle me-1"></i> Back
                            </a>
                            <button type="submit" class="btn btn-success w-50">
                                <i class="bi bi-check-circle-fill me-1"></i> Save Changes
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection