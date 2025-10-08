@extends('install.layout')

@section('title', 'Create Admin Account')

@section('content')
<div class="p-4">
    <h2 class="h3 mb-5 text-white text-center">
        <i class="bi bi-person-plus-fill me-2 text-primary-accent"></i> Create Admin Account
    </h2>

    @if ($errors->any())
        <div class="alert alert-danger shadow-sm mb-4" style="background-color: #ff4d4d20; border-color: #ff4d4d; color: #ff4d4d; border-radius: 8px;">
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li><i class="bi bi-x-circle-fill me-1"></i> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('install.createAdmin') }}">
        @csrf

        <div class="mb-4">
            <label for="name" class="form-label text-light">Admin Name</label>
            <input type="text" name="name" id="name" placeholder="John Smith" class="form-control form-control-lg bg-dark text-white border-secondary" required>
        </div>

        <div class="mb-4">
            <label for="email" class="form-label text-light">Admin Email</label>
            <input type="email" name="email" id="email" placeholder="you@example.com" class="form-control form-control-lg bg-dark text-white border-secondary" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <label for="password" class="form-label text-light">Password</label>
                <input type="password" name="password" id="password" class="form-control form-control-lg bg-dark text-white border-secondary" required>
            </div>

            <div class="col-md-6 mb-4">
                <label for="password_confirmation" class="form-label text-light">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-lg bg-dark text-white border-secondary" required>
            </div>
        </div>
        
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary btn-lg px-5 shadow-lg">
                <i class="bi bi-arrow-right-circle-fill me-2"></i> Finalize Installation
            </button>
        </div>
    </form>
</div>
@endsection