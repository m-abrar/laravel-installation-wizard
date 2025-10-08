@extends('install.layout')

@section('title', 'Database Configuration')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h2 class="h5 mb-4 text-center">Database Configuration</h2>

        @if ($errors->any())
            <div class="alert alert-danger mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('install.saveDatabase') }}">
            @csrf

            <div class="mb-3">
                <label for="app_url" class="form-label">APP URL</label>
                <input type="text" name="app_url" class="form-control" value="{{ url('/') }}" required>
            </div>

            <div class="mb-3">
                <label for="db_host" class="form-label">DB Host</label>
                <input type="text" name="db_host" class="form-control" value="127.0.0.1" required>
            </div>

            <div class="mb-3">
                <label for="db_port" class="form-label">DB Port</label>
                <input type="text" name="db_port" class="form-control" value="3306" required>
            </div>

            <div class="mb-3">
                <label for="db_name" class="form-label">DB Name</label>
                <input type="text" name="db_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="db_user" class="form-label">DB Username</label>
                <input type="text" name="db_user" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="db_password" class="form-label">DB Password</label>
                <input type="password" name="db_password" class="form-control">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">💾 Save & Continue</button>
            </div>
        </form>
    </div>
</div>
@endsection
