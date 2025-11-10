@extends('admin.layouts.app')
@section('content')
<div class="container-sm py-4">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">

            <div class="h4 mb-4">
                <a href="{{ route('admin.freelancer.index') }}" class="text-decoration-none text-success">
                    <i class="bi bi-person-workspace me-1"></i> Freelancer
                </a><span> / Edit</span>
            </div>

            @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm rounded-3">
                <div>{{ session('success') }}</div>
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

            <form action="{{ route('admin.freelancer.update', $obj->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded-4 shadow-sm">
                @csrf
                @method('PUT')

                <div class="row g-3 mb-3">
                    <div class="col">
                        <div class="fw-semibold mb-1">First Name *</div>
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name', $obj->first_name) }}" required>
                        @error('first_name') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>

                    <div class="col">
                        <div class="fw-semibold mb-1">Last Name *</div>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name', $obj->last_name) }}" required>
                        @error('last_name') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col">
                        <div class="fw-semibold mb-1">Username *</div>
                        <input type="number" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username', $obj->username) }}" required>
                        @error('username') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>

                    <div class="col">
                        <div class="fw-semibold mb-1">Password *</div>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter new password">
                        @error('password') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <div class="fw-semibold mb-1">Location *</div>
                    <select class="form-select @error('location_id') is-invalid @enderror" id="location_id" name="location_id" required>
                        <option value="">Select location</option>
                        @foreach($locations as $location)
                        <option value="{{ $location->id }}" {{ old('location_id', $obj->location_id) == $location->id ? 'selected' : '' }}>
                            {{ $location->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('location_id') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>

                <div class="row g-3 mb-4">
                    <div class="col">
                        <div class="fw-semibold mb-1">Rating</div>
                        <input type="number" min="0" max="5" step="0.1" class="form-control @error('rating') is-invalid @enderror" id="rating" name="rating" value="{{ old('rating', $obj->rating) }}">
                        @error('rating') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>

                    <div class="col">
                        <div class="fw-semibold mb-1">Verified</div>
                        <select class="form-select @error('verified') is-invalid @enderror" id="verified" name="verified">
                            @foreach(\App\Models\Freelancer::verifiedFreelancer() as $key => $label)
                            <option value="{{ $key }}" {{ old('verified', $obj->verified) == $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('verified') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>

                    <div class="col">
                        <div class="fw-semibold mb-1">Total Jobs</div>
                        <input type="number" min="0" class="form-control @error('total_jobs') is-invalid @enderror" id="total_jobs" name="total_jobs" value="{{ old('total_jobs', $obj->total_jobs) }}">
                        @error('total_jobs') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>

                    <div class="col">
                        <div class="fw-semibold mb-1">Total Earnings</div>
                        <input type="number" min="0" class="form-control @error('total_earnings') is-invalid @enderror" id="total_earnings" name="total_earnings" value="{{ old('total_earnings', $obj->total_earnings) }}">
                        @error('total_earnings') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <div class="fw-semibold mb-1">Avatar</div>
                    <div class="input-group">
                        <label class="input-group-text btn btn-outline-secondary" for="avatar">
                            <i class="bi bi-upload me-1"></i> Choose File
                        </label>
                        <input type="file" class="form-control d-none @error('avatar') is-invalid @enderror" id="avatar" name="avatar" accept=".jpg,.jpeg,.png" onchange="document.getElementById('file-name').textContent = this.files[0]?.name || 'No file chosen'">
                        <div id="file-name" class="form-control bg-light">{{ $obj->avatar ? basename($obj->avatar) : 'No file chosen' }}</div>
                    </div>

                    @if($obj->avatar)
                    <div class="mt-3">
                        <img src="{{ asset('storage/' . $obj->avatar) }}" alt="Current Avatar" class="rounded-circle shadow-sm border" width="80" height="80">
                    </div>
                    @endif

                    @error('avatar') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('admin.freelancer.index') }}" class="btn btn-outline-secondary px-4 py-2">
                        <i class="bi bi-arrow-left-circle me-1"></i> Back
                    </a>
                    <button type="submit" class="btn btn-success px-4 py-2">
                        <i class="bi bi-pencil me-1"></i> Update Freelancer
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection