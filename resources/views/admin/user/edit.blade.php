@extends('admin.layouts.app')

@section('content')
<div class="container-sm py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

            <div class="h4 mb-4">
                <a href="{{ route('admin.user.index') }}" class="text-decoration-none text-primary">
                    <i class="bi bi-person-circle me-1"></i> Users
                </a><span> / Edit</span>
            </div>

            @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm rounded-3">{{ session('success') }}</div>
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

            <form action="{{ route('admin.user.update', $obj->id) }}" method="POST" class="bg-white p-4 rounded-4 shadow-sm">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Full Name *</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $obj->name) }}" required>
                    @error('name') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label fw-semibold">Username *</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username', $obj->username) }}" required>
                    @error('username') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter new password to change">
                    @error('password') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>

                <div class="text-center d-flex justify-content-center gap-3">
                    <a href="{{ route('admin.user.index') }}" class="btn btn-outline-secondary px-4 py-2">
                        <i class="bi bi-arrow-left-circle me-1"></i> Back
                    </a>
                    <button type="submit" class="btn btn-success px-4 py-2">
                        <i class="bi bi-pencil me-1"></i> Update User
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection