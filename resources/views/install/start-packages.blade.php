@extends('install.layout')

@section('title', 'Start Package Installation')

@section('content')
<div class="p-4 text-center">
    
    <h2 class="h3 mb-4 text-white">
        <i class="bi bi-box-seam-fill me-2 text-primary-accent"></i> Prepare for Packages Installation
    </h2>

    <p class="lead text-secondary-subtle mb-5 text-white-50">
        The application is now ready to fetch dependencies.<br>
        Please **do not close** or refresh the window once the installation begins.
    </p>

    <div class="mx-auto" style="max-width: 600px;">
        <div class="alert alert-warning small mb-5" role="alert" style="background-color: #ffc10720; border-color: #ffc107; color: #ffc107; border-radius: 8px;">
            <i class="bi bi-clock-history me-2"></i> **Heads Up:** Composer package installation may take several minutes depending on your server's speed and network connection.
        </div>
        <a href="{{ route('install.packages') }}" class="btn btn-primary btn-lg px-5 shadow-lg">
            <i class="bi bi-cpu-fill me-2"></i> Start Installation
        </a>
    </div>

</div>
@endsection