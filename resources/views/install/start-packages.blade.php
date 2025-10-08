@extends('install.layout')

@section('title', 'Start Package Installation')

@section('content')
<div class="card shadow-sm">
    <div class="card-body text-center">
        
    



        
        <h2 class="h4 mb-3">Prepare for Packages Installation</h2>

        <p class="text-muted mb-4">
            The installation process may take a few minutes to complete.<br>
            Please do not close this window and remain patient during the process.
        </p>

        <div class="mx-auto" style="max-width: 600px;">
        <div class="alert alert-warning small mb-4" role="alert">
            ⏳ Composer dependencies will be installed. This may take a little time depending on your server.
        </div>
        <a href="{{ route('install.packages') }}" class="btn btn-primary">
            💻 Start Installation
        </a>
        </div>







    </div>
</div>
@endsection
