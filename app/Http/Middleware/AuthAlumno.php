<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthAlumno
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (false == Auth::guard('alumno')->check()) {
            return redirect()->route('login.alumno');
        }

        return $next($request);
    }
}
