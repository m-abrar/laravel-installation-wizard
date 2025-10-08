<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIfInstalled
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     return $next($request);
    // }

    public function handle($request, Closure $next)
    {
        // Exclude installer routes
        if ($request->is('install*')) {
            return $next($request);
        }

        if (!file_exists(storage_path('installed'))) {
            return redirect()->route('install.welcome');
        }

        return $next($request);
    }


}
