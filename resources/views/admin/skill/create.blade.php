@extends('admin.layouts.app')

@section('content')
<div class="container-sm py-4">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">

            <div class="h4 mb-4">
                <a href="{{ route('admin.skill.index') }}" class="text-decoration-none text-success">
                    <i class="bi bi-lightning-charge-fill me-1"></i> Skills
                </a><span> / Create</span>
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

            <form action="{{ route('admin.skill.store') }}" method="POST" class="bg-white p-4 rounded-4 shadow-sm">
                @csrf

                <div class="mb-4">
                    <label for="name" class="form-label fw-semibold">Skill Name *</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>

                <div class="text-center d-flex justify-content-center gap-3">
                    <a href="{{ route('admin.skill.index') }}" class="btn btn-outline-secondary px-4 py-2">
                        <i class="bi bi-arrow-left-circle me-1"></i> Back
                    </a>
                    <button type="submit" class="btn btn-success px-4 py-2">
                        <i class="bi bi-plus-circle me-1"></i> Add Skill
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection