<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) 
        {
            if(auth()->user()->role == 0)
                return $next($request);
            else if(auth()->user()->role == 1)
                return redirect()->route('staff.index');
            else
                return redirect()->route('user.index');
        }
        else
            return redirect()->route('login');
    }
}
