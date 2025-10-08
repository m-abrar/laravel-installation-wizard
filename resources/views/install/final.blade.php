@extends('install.layout')

@section('title', 'Installation Complete')

@section('content')
<div class="p-5 text-center">
    <i class="bi bi-check-circle-fill display-1 text-success mb-4" style="font-size: 5rem;"></i>
    <h2 class="display-4 fw-bold mb-3 text-white">Installation Complete!</h2>
    <p class="lead mb-5 text-secondary-subtle text-white-50">
        Your application is now fully installed, configured, and ready to launch.
    </p>
    
    <div class="d-grid gap-3 col-md-8 mx-auto">
        <a href="{{ url('/') }}" class="btn btn-primary btn-lg shadow-lg">
            <i class="bi bi-house-fill me-2"></i> Go to Public Website
        </a>
        
        @if (Route::has('admin.dashboard'))
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-warning btn-lg shadow-sm" style="color: #ffc107; border-color: #ffc107;">
                <i class="bi bi-speedometer2 me-2"></i> Go to Admin Dashboard
            </a>
        @endif
    </div>
</div>
@endsection