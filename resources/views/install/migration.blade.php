@extends('install.layout')

@section('title', 'Database Migration')

@section('content')

<div class="container">
    <h2 class="h4 mb-3">Migration Status</h2>

    @if($error)
        <div class="alert alert-danger">
            <strong>Error:</strong> {{ $message }}
        </div>
    @else
        <div class="alert alert-success">
            <strong>Success:</strong> {{ $message }}
        </div>
    @endif

    <div class="mt-4">
        <h5>Details:</h5>
        {!! $details !!}
    </div>

    @if (!$error)
        <div class="text-center mt-4">
            <a href="{{ route('install.admin') }}" class="btn btn-primary">
                🎉 Create Admin Account
            </a>
        </div>
    @endif
</div>

<style>
    pre {
        background-color: #f4f4f4;
        border: 1px solid #ccc;
        padding: 15px;
        font-size: 14px;
        color: #333;
        overflow-x: auto;
        white-space: pre-wrap;
        line-height: 1.5;
        border-radius: 4px;
        max-height: 300px;
    }
</style>

@endsection
