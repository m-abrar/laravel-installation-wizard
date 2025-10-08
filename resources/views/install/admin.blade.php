@extends('install.layout')

@section('title', 'Create Admin Account')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h2 class="h5 mb-4">Create Admin Account</h2>

        @if ($errors->any())
            <div class="alert alert-danger mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('install.createAdmin') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Admin Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Admin Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">🚩 Create Admin</button>
            </div>
        </form>
    </div>
</div>
@endsection
