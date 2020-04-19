<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class Fercilitator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'web')
    {
        if (Auth::guard($guard)->check() && !auth()->user()->getType()=='Fercillitator') {
            return redirect()->route('login');
        }
            return $next($request);
        }
    }
    