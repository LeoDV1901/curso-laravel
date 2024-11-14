<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckAccessToProductos
{
    /**
     * Maneja una solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
        if (Str::is(['productos', 'users', 'ventas','index','index_cruds'], $request->path()) && !auth()->check()) {
            return redirect('/');
        }
        
        return $next($request);
    }
}
