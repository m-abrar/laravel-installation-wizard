@extends('install.layout')

@section('title', 'System Requirements')

@section('content')
<div class="card shadow-sm">
    <div class="card-body text-center">
        <h2 class="h5 mb-4">System Requirements</h2>

        <ul class="list-group mb-4">
            @foreach ($requirements as $label => $passed)
                <li class="list-group-item d-flex justify-content-between">
                    <span>{{ $label }}</span>
                    <span class="{{ $passed ? 'text-success' : 'text-danger' }}">
                        {{ $passed ? '✔ Passed' : '✘ Failed' }}
                    </span>
                </li>
            @endforeach
        </ul>

        @if ($allPassed)
        <div class="text-center">
            <a href="{{ route('install.database') }}" class="btn btn-primary">💡 Next Step</a>
        </div>
        @else
            <p class="text-danger">Please fix the above issues before continuing.</p>
        @endif
    </div>
</div>
@endsection
