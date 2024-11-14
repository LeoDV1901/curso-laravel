<?php
namespace App\Http\Middleware;

use Closure;

class CheckAge
{
    public function handle($request, Closure $next)
    {
        if ($request->age < 18) {
            return response('Unauthorized.', 401);
        }

        return $next($request);
    }
}
