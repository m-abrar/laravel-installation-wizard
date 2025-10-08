@extends('install.layout')

@section('title', 'Install Packages')

@section('content')

    <div class="container">
        <h2 class="h4 mb-3">Package Installation Status</h2>

        @if($error)
            <div class="alert alert-danger">
                <strong>Error:</strong> {{ $message }}
            </div>
        @else
            <div class="alert alert-success">
                <strong>Success:</strong> {{ $message }}
            </div>
        @endif

        {{-- Show detailed output --}}
        <div class="mt-4">
            <h5>Details:</h5>
            {!! $details !!}
        </div>

        @if (!$error)
            <div class="text-center">
                <a href="{{ route('install.migration') }}" class="btn btn-primary mt-4">
                🌱 Import Demo (database)
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
            overflow-y: auto;
            white-space: pre-wrap;
            line-height: 1.5;
            border-radius: 4px;
            word-wrap: break-word;
            max-height: 300px;
        }

        pre code {
            font-family: 'Courier New', Courier, monospace;
        }
    </style>
@endsection
