@extends('install.layout')

@section('title', 'System Requirements')

@section('content')
<div class="p-4">
    <h2 class="h3 mb-4 text-white text-center">System Requirements Check</h2>

    <ul class="list-group list-group-flush mb-5">
        @foreach ($requirements as $label => $passed)
            <li class="list-group-item d-flex justify-content-between align-items-center py-3" style="background-color: #2e2e4e; border-bottom: 1px solid rgba(255, 255, 255, 0.1);">
                <span class="text-white fw-medium">{{ $label }}</span>
                <span class="{{ $passed ? 'text-success' : 'text-danger' }} fw-bold">
                    @if ($passed)
                        <i class="bi bi-check-circle-fill me-2"></i> Passed
                    @else
                        <i class="bi bi-x-octagon-fill me-2"></i> Failed
                    @endif
                </span>
            </li>
        @endforeach
    </ul>

    <div class="text-center">
        @if ($allPassed)
            <a href="{{ route('install.database') }}" class="btn btn-primary btn-lg px-5 shadow-lg">
                <i class="bi bi-arrow-right-circle-fill me-2"></i> Next Step
            </a>
        @else
            <div class="alert alert-danger" role="alert" style="background-color: #ff4d4d20; border-color: #ff4d4d; color: #ff4d4d;">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> Please fix the required system issues before continuing.
            </div>
        @endif
    </div>
</div>
@endsection