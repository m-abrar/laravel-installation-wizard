@extends('install.layout')

@section('title', 'Database Configuration')

@section('content')
<div class="p-4">
    <h2 class="h3 mb-5 text-white text-center">
        <i class="bi bi-database-fill-gear me-2 text-primary-accent"></i> Database Configuration
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

    <form method="POST" action="{{ route('install.saveDatabase') }}">
        @csrf

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="app_url" class="form-label text-light">Application URL</label>
                <input type="url" name="app_url" class="form-control form-control-lg bg-dark text-white border-secondary" value="{{ url('/') }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="db_host" class="form-label text-light">DB Host</label>
                <input type="text" name="db_host" class="form-control form-control-lg bg-dark text-white border-secondary" value="127.0.0.1" required>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="db_port" class="form-label text-light">DB Port</label>
                <input type="text" name="db_port" class="form-control form-control-lg bg-dark text-white border-secondary" value="3306" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="db_name" class="form-label text-light">DB Name</label>
                <input type="text" name="db_name" class="form-control form-control-lg bg-dark text-white border-secondary" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="db_user" class="form-label text-light">DB Username</label>
                <input type="text" name="db_user" class="form-control form-control-lg bg-dark text-white border-secondary" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="db_password" class="form-label text-light">DB Password</label>
                <input type="password" name="db_password" class="form-control form-control-lg bg-dark text-white border-secondary">
            </div>
        </div>
        
        <div class="text-center mt-5">
            <button type="submit" class="btn btn-primary btn-lg px-5 shadow-lg">
                <i class="bi bi-save-fill me-2"></i> Save & Test Connection
            </button>
        </div>
    </form>
</div>
@endsection