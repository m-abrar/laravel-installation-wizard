@php
    $steps = [
        'welcome' => 'Welcome',
        'requirements' => 'System Requirements',
        'database' => 'Database Configuration',
        'packages' => 'Install Packages',
        'migration' => 'Import Demo',
        'admin' => 'Create Admin',
        'final' => 'Finish'
    ];
    // Get the current step by extracting the part of the route name before the dot
    $currentStep = explode('.', request()->route()->getName())[1];
@endphp


<div class="container py-5">
    <!-- Step Indicators -->
    <div class="d-flex justify-content-center align-items-center mb-4 position-relative flex-wrap">
        @foreach (array_keys($steps) as $index => $step)
            <div class="step text-center position-relative d-flex flex-column align-items-center">
                <div class="icon-wrapper mb-2">
                    @if ($index < array_search($currentStep, array_keys($steps)))
                        <i class="bi bi-check-circle text-success fs-2 p-2"></i>
                    @elseif ($step === $currentStep)
                        <i class="bi bi-check-circle text-warning fs-2 p-2"></i>
                    @else
                        <i class="bi bi-x-circle text-muted fs-2 p-2"></i>
                    @endif
                </div>
                <div class="step-label">{{ $steps[$step] }}</div>
            </div>

            {{-- Add connector line except after the last item --}}
            @if ($index < count($steps) - 1)
                <div class="step-line"></div>
            @endif
        @endforeach
    </div>
</div>


<!-- Bootstrap Icons CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<!-- Custom Styles -->
<style>

.step-line {
    width: 40px;
    height: 2px;
    background-color: #ccc;
    margin: 0 5px;
}

@media (max-width: 768px) {
    .step-line {
        display: none; /* Hide on small screens */
    }
}


    .step {
        margin: 0 10px;
        padding: 10px;
        text-align: center;
        font-size: 16px;
    }
    .step .icon-wrapper {
        font-size: 30px; /* Default size for the main tick icon */
    }
    .step-label {
        font-size: 14px;
        margin-top: 5px;
    }
    .step.disabled {
        opacity: 0.5;
    }
    .step .bi {
        color: #d6d6d6; /* Gray for next incomplete steps */
    }
    .step .bi.text-warning {
        color: #fd7e14; /* Orange/Red for current step */
    }
    .step .bi.text-success {
        color: #28a745; /* Green for completed steps */
    }
    .step .bi.text-muted {
        color: #d6d6d6; /* Gray for next steps */
    }
    /* Custom class for larger check-circle icon */
    .fs-2 {
        font-size: 2rem;
    }
    /* Custom background for step label and icon */
    .bg-light {
        background-color:rgb(165, 165, 165);
    }
    .step-label i {
        margin-right: 8px;
    }
</style>
