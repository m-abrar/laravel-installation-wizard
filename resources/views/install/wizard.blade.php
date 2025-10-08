@php
    $steps = [
        'welcome' => 'Welcome',
        'requirements' => 'System Requirements',
        'database' => 'Database',
        'packages' => 'Packages',
        'migration' => 'Import Demo',
        'admin' => 'Admin',
        'final' => 'Finish'
    ];
    // Get the current step by extracting the part of the route name before the dot
    $route_parts = explode('.', request()->route()->getName());
    $currentStep = count($route_parts) > 1 ? $route_parts[1] : 'welcome';
    $stepKeys = array_keys($steps);
    $currentStepIndex = array_search($currentStep, $stepKeys);
@endphp


<div class="d-flex justify-content-center align-items-center mb-5 flex-wrap step-progress-bar">
    @foreach ($stepKeys as $index => $step)
        @php
            $isCompleted = $index < $currentStepIndex;
            $isCurrent = $step === $currentStep;
            $statusClass = $isCompleted ? 'step-completed' : ($isCurrent ? 'step-current' : 'step-pending');
        @endphp

        <div class="step text-center position-relative d-flex flex-column align-items-center {{ $statusClass }}">
            <div class="icon-wrapper mb-2">
                <div class="step-icon-circle d-flex align-items-center justify-content-center">
                    @if ($isCompleted)
                        <i class="bi bi-check-lg"></i>
                    @elseif ($isCurrent)
                        <i class="bi bi-gear-fill"></i>
                    @else
                        <span class="fw-bold">{{ $index + 1 }}</span>
                    @endif
                </div>
            </div>
            <div class="step-label mt-2">{{ $steps[$step] }}</div>
        </div>

        {{-- Add connector line except after the last item --}}
        @if ($index < count($steps) - 1)
            <div class="step-line {{ $isCompleted ? 'line-completed' : ($isCurrent ? 'line-current' : 'line-pending') }}"></div>
        @endif
    @endforeach
</div>
