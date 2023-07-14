<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckearRol
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) // No está logueado.
            return redirect('login');

        $user = Auth::user();

        if($user->hasAnyRole($roles)) {
            return $next($request);
        }

        abort(403, "Acción no autorizada");
    }
}
