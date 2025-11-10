@extends('admin.layouts.app')

@section('content')
<div class="container-sm py-4">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">

            <div class="h4 mb-4">
                <a href="{{ route('admin.profile.index') }}" class="text-decoration-none text-success">
                    <i class="bi bi-person-badge me-1"></i> Profile
                </a>
                <span> / Create</span>
            </div>

            @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm rounded-3">
                {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger border-0 shadow-sm rounded-3">
                <ul class="mb-0 ps-3">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('admin.profile.store') }}" method="POST" class="bg-white p-4 rounded-4 shadow-sm">
                @csrf

                <div class="mb-3">
                    <label for="freelancer_id" class="form-label fw-semibold">Freelancer *</label>

                    @if(isset($selectedFreelancer))
                    <input type="text" class="form-control bg-light text-dark" value="{{ $selectedFreelancer->first_name }} {{ $selectedFreelancer->last_name }}" readonly>
                    <input type="hidden" name="freelancer_id" value="{{ $selectedFreelancer->id }}">
                    @else
                    <select class="form-select @error('freelancer_id') is-invalid @enderror" id="freelancer_id" name="freelancer_id" required>
                        <option value="">Select Freelancer</option>
                        @foreach($freelancers as $freelancer)
                        <option value="{{ $freelancer->id }}" {{ old('freelancer_id') == $freelancer->id ? 'selected' : '' }}>
                            {{ $freelancer->first_name }} {{ $freelancer->last_name }}
                        </option>
                        @endforeach
                    </select>
                    @error('freelancer_id')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                    @endif
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Title *</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                    @error('title')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="body" class="form-label fw-semibold">Body *</label>
                    <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="6" required>{{ old('body') }}</textarea>
                    @error('body')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success px-4 py-2">
                        <i class="bi bi-plus-circle me-1"></i> Add Profile
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection