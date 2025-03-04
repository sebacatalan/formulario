<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check() || Auth::user()->rol !== $role) {
            abort(403, 'Acceso denegado'); // Error 403 si no tiene permisos
        }

        return $next($request);
    }
}
