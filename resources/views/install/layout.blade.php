<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Installer')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
    :root {
        /* 🎨 Color Palette */
        --color-bg-dark: #1a1a2e;         /* Main dark background (Body) */
        --color-bg-card: #252541;         /* Slightly lighter card background */
        --color-bg-header: #3f3f61;       /* Card Header/Step Icon Background (Default) */
        --color-text-light: #e0e0e0;      /* Default light text */
        --color-text-white: #ffffff;      /* Pure white text */
        --color-text-muted: #999999;      /* Muted text for pending steps */

        /* 🌲 Emerald Forest Palette (Current Choice) */
        --color-accent: #4CAF50;
        --color-primary: #1E8449;
        --color-primary-hover: #145A32;
        
        /* Wizard Colors */
        --color-step-border: #5a5a7a;     /* Border/Line color for pending steps */
        --color-step-complete: var(--color-accent);
        
        /* 📐 Layout and Dimensions */
        --spacing-card-radius: 12px;
        --shadow-premium: 0 10px 30px rgba(0, 0, 0, 0.5), 0 0 0 1px rgba(255, 255, 255, 0.05);

        /* 🖋️ Typography */
        --font-stack-modern: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        --font-weight-button: 600;
        --font-size-header: 1.25rem;
    }

    /* ------------------------------------------------ */
    /* Global Styles                   */
    /* ------------------------------------------------ */

    body {
        background-color: var(--color-bg-dark);
        color: var(--color-text-light);
        font-family: var(--font-stack-modern);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .container.py-5 {
        padding-top: 3rem !important;
        padding-bottom: 3rem !important;
    }

    .text-primary-accent {
        color: var(--color-accent) !important;
    }

    /* ------------------------------------------------ */
    /* Card & Button Styles                     */
    /* ------------------------------------------------ */

    .card.premium-card {
        background: var(--color-bg-card);
        border: none;
        border-radius: var(--spacing-card-radius);
        box-shadow: var(--shadow-premium);
    }

    .btn-primary {
        background-color: var(--color-primary);
        border-color: var(--color-primary);
        transition: all 0.3s ease;
        font-weight: var(--font-weight-button);
    }

    .btn-primary:hover {
        background-color: var(--color-primary-hover);
        border-color: var(--color-primary-hover);
        transform: translateY(-1px);
    }

    /* ------------------------------------------------ */
    /* Form & Logs                                      */
    /* ------------------------------------------------ */

    /* Placeholder Fix */
    .form-control.bg-dark::placeholder {
        color: var(--color-text-light);
        opacity: 0.4;
    }
    .form-control.bg-dark:-ms-input-placeholder, 
    .form-control.bg-dark::-ms-input-placeholder {
        color: var(--color-text-light);
        opacity: 0.4;
    }

    /* Console Log Look */
    .log-output-container pre {
        background-color: #1e1e1e;
        border: 1px solid #333;
        padding: 15px;
        font-size: 14px;
        color: #00ff00; /* Green console text */
        overflow: auto;
        white-space: pre-wrap;
        line-height: 1.5;
        border-radius: 8px;
        max-height: 350px;
        font-family: 'Consolas', 'Monaco', 'Courier New', monospace;
    }

    /* ------------------------------------------------ */
    /* Wizard Steps (New Section)                      */
    /* ------------------------------------------------ */

    .step-progress-bar {
        gap: 0;
    }
    .step {
        margin: 0 15px;
        color: var(--color-text-muted);
        transition: color 0.3s;
        flex-shrink: 0;
    }
    .step-icon-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: var(--color-bg-header); /* Default icon background */
        color: var(--color-text-muted);
        border: 2px solid var(--color-step-border);
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    /* Completed Step */
    .step-completed {
        color: var(--color-step-complete);
    }
    .step-completed .step-icon-circle {
        background-color: var(--color-step-complete);
        border-color: var(--color-step-complete);
        color: var(--color-text-white);
    }
    .step-completed .step-label {
        font-weight: 500;
        color: var(--color-text-white);
    }

    /* Current Step */
    .step-current {
        color: var(--color-accent); /* Takes color from the selected palette */
    }
    .step-current .step-icon-circle {
        background-color: var(--color-accent);
        border-color: var(--color-accent);
        color: var(--color-text-white);
        box-shadow: 0 0 15px rgba(106, 130, 251, 0.5); /* Glowing effect */
        transform: scale(1.1);
    }
    .step-current .step-label {
        font-weight: 700;
        color: var(--color-text-white);
    }

    /* Step Connector Line */
    .step-line {
        width: 60px;
        height: 4px;
        background-color: var(--color-step-border);
        margin: 0 -15px;
        transition: background-color 0.3s;
    }
    .line-completed {
        background-color: var(--color-step-complete);
    }
    .line-current {
        /* Uses a mix of complete color and pending color for the current step line */
        background: linear-gradient(to right, var(--color-step-complete) 50%, var(--color-step-border) 50%);
        background-size: 200% 100%;
        background-position: left;
    }

    /* Responsive adjustments */
    @media (max-width: 992px) {
        .step-line {
            width: 30px;
            margin: 0 -5px;
        }
        .step {
            margin: 0 5px;
        }
    }
    @media (max-width: 768px) {
        .step-progress-bar {
            flex-direction: column;
            align-items: flex-start !important;
        }
        .step {
            margin: 10px 0;
            flex-direction: row !important;
            align-items: center !important;
            text-align: left;
        }
        .step-line {
            display: none;
        }
        .step-label {
            margin-left: 15px !important;
            margin-top: 0 !important;
        }
    }
    </style>

</head>
<body>

    <div class="container py-5">
        <div class="row justify-content-center">
             <div class="col-lg-10 col-md-11">
                <div class="card premium-card">
                    <div class="card-body p-5">
                        <header class="text-center mb-5">
                            <h1 class="text-primary-accent display-6 fw-bold">System Installer</h1>
                        </header>
                         @include('install.wizard')
                         <hr class="border-secondary-subtle my-5">
                         <div class="content-area">
                            @yield('content')
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>