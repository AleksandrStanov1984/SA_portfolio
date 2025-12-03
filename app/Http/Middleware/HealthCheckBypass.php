<?php

namespace App\Http\Middleware;

use Closure;

class HealthCheckBypass
{
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
