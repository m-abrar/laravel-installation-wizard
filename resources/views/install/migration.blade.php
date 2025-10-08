@extends('install.layout')

@section('title', 'Database Migration')

@section('content')

<div class="p-4">
    <h2 class="h3 mb-4 text-white text-center">
        <i class="bi bi-layers-fill me-2 text-primary-accent"></i> Migration & Demo Import Status
    </h2>

    @if($error)
        <div class="alert alert-danger shadow-sm mb-4" style="background-color: #ff4d4d20; border-color: #ff4d4d; color: #ff4d4d; border-radius: 8px;">
            <i class="bi bi-exclamation-octagon-fill me-2"></i> <strong>Migration Failed:</strong> {{ $message }}
        </div>
    @else
        <div class="alert alert-success shadow-sm mb-4" style="background-color: #4CAF5020; border-color: #4CAF50; color: #4CAF50; border-radius: 8px;">
            <i class="bi bi-check-circle-fill me-2"></i> <strong>Success:</strong> {{ $message }}
        </div>
    @endif

    <h5 class="mt-4 text-white-50">Migration Log:</h5>
    <div class="log-output-container">
        {!! $details !!}
    </div>

    @if (!$error)
        <div class="text-center mt-5">
            <a href="{{ route('install.admin') }}" class="btn btn-primary btn-lg px-5 shadow-lg">
                <i class="bi bi-person-fill-gear me-2"></i> Create Admin Account
            </a>
        </div>
    @endif
</div>

@endsection