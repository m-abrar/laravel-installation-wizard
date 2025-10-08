@extends('install.layout')

@section('title', 'Welcome')

@section('content')
<div class="text-center p-4">
    <div class="d-flex justify-content-center mb-4">
        <i class="bi bi-rocket-takeoff-fill display-3 text-primary-accent"></i>
    </div>
    <h2 class="display-5 fw-bold mb-4 text-white">Welcome to the Setup Wizard</h2>
    <p class="lead mb-5 text-secondary-subtle text-white-50">
        This interactive wizard will guide you through the initial setup process for your new application.
        It's quick, easy, and secure.
    </p>
    <a href="{{ route('install.requirements') }}" class="btn btn-primary btn-lg px-5 shadow-lg">
        <i class="bi bi-play-circle-fill me-2"></i> Start Installation
    </a>
</div>
@endsection