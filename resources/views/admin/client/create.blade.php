@extends('admin.layouts.app')

@section('content')
<div class="container-sm py-4">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">

            <div class="mb-4 h4">
                <a href="{{ route('admin.client.index') }}" class="text-decoration-none text-success">
                    <i class="bi bi-person-circle me-1"></i> Client
                </a>
                <span>/ Create</span>
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

            <form action="{{ route('admin.client.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded-4 shadow-sm">
                @csrf

                <div class="row g-3 mb-3">
                    <div class="col">
                        <label for="first_name" class="form-label fw-semibold">First Name *</label>
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                        @error('first_name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="last_name" class="form-label fw-semibold">Last Name *</label>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                        @error('last_name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col">
                        <label for="username" class="form-label fw-semibold">Username *</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" required>
                        @error('username')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="password" class="form-label fw-semibold">Password *</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                        @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="location_id" class="form-label fw-semibold">Location *</label>
                    <select class="form-select @error('location_id') is-invalid @enderror" id="location_id" name="location_id" required>
                        <option value="">Select location</option>
                        @foreach($locations as $location)
                        <option value="{{ $location->id }}" {{ old('location_id') == $location->id ? 'selected' : '' }}>
                            {{ $location->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('location_id')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row g-3 mb-4">
                    <div class="col">
                        <label for="rating" class="form-label fw-semibold">Rating</label>
                        <input type="number" step="0.1" min="0" max="5" class="form-control @error('rating') is-invalid @enderror" id="rating" name="rating" value="{{ old('rating', 0) }}">
                        @error('rating')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="phone_number_verified" class="form-label fw-semibold">Phone Verified</label>
                        <select class="form-select @error('phone_number_verified') is-invalid @enderror" id="phone_number_verified" name="phone_number_verified">
                            <option value="0" {{ old('phone_number_verified') == 0 ? 'selected' : '' }}>No</option>
                            <option value="1" {{ old('phone_number_verified') == 1 ? 'selected' : '' }}>Yes</option>
                        </select>
                        @error('phone_number_verified')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="payment_method_verified" class="form-label fw-semibold">Payment Verified</label>
                        <select class="form-select @error('payment_method_verified') is-invalid @enderror" id="payment_method_verified" name="payment_method_verified">
                            <option value="0" {{ old('payment_method_verified') == 0 ? 'selected' : '' }}>No</option>
                            <option value="1" {{ old('payment_method_verified') == 1 ? 'selected' : '' }}>Yes</option>
                        </select>
                        @error('payment_method_verified')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="total_jobs" class="form-label fw-semibold">Total Jobs</label>
                        <input type="number" min="0" class="form-control @error('total_jobs') is-invalid @enderror" id="total_jobs" name="total_jobs" value="{{ old('total_jobs', 0) }}">
                        @error('total_jobs')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="total_spent" class="form-label fw-semibold">Total Spent</label>
                        <input type="number" min="0" class="form-control @error('total_spent') is-invalid @enderror" id="total_spent" name="total_spent" value="{{ old('total_spent', 0) }}">
                        @error('total_spent')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="avatar" class="form-label fw-semibold">Avatar</label>
                    <div class="input-group">
                        <label class="input-group-text btn btn-outline-secondary" for="avatar">
                            <i class="bi bi-upload me-1"></i> Choose File
                        </label>
                        <input type="file" class="form-control d-none @error('avatar') is-invalid @enderror" id="avatar" name="avatar" accept=".jpg,.jpeg,.png" onchange="document.getElementById('file-name').textContent = this.files[0]?.name || 'No file chosen'">
                        <div id="file-name" class="form-control bg-light">No file chosen</div>
                    </div>
                    @error('avatar')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('admin.client.index') }}" class="btn btn-outline-secondary px-4 py-2">
                        <i class="bi bi-arrow-left-circle me-1"></i> Back
                    </a>
                    <button type="submit" class="btn btn-success px-4 py-2">
                        <i class="bi bi-person-plus-fill me-1"></i> Add Client
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection