@extends('install.layout')

@section('title', 'Welcome')

@section('content')
<div class="card shadow-sm">
    <div class="card-body text-center">
        <h1 class="h4 mb-3">Welcome to Installer</h1>
        <p class="mb-4">This wizard will guide you through the installation process.</p>
        <a href="{{ route('install.requirements') }}" class="btn btn-primary">🚀 Start Installation</a>
    </div>
</div>
@endsection
