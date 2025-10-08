@extends('install.layout')

@section('title', 'Installation Complete')

@section('content')
<div class="card shadow-sm">
    <div class="card-body text-center">
        <h2 class="text-success mb-3">🎉 Installation Complete!</h2>
        <p class="lead mb-4">Your application is now ready to use.</p>
        
        <!-- Button to go to Home -->
        <a href="{{ url('/') }}" class="btn btn-primary mt-3">🏠 Go to Home</a>
        
        <!-- Check if admin dashboard route exists, then show button -->
        @if (Route::has('admin.dashboard'))
            <a href="{{ route('admin.dashboard') }}" class="btn btn-warning mt-3">📊 Go to Dashboard</a>
        @endif
    </div>
</div>
@endsection
