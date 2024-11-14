<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirigirCorreoMiddleware
{
    /**
     * 
     *>
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user(); 
            if ($user->email === 'messi@10') {
                return redirect()->route('index_cruds');
            } else {
                return redirect()->route('index');
            }
        }
        return redirect()->route('login');
    }
}
