<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleAdminAndServices
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        // Si es un usuario con rol 'SERVICIOS' intentando hacer un 'DELETE', se le niega el acceso
        if ($user->hasRole('SERVICIOS') && $request->isMethod('delete')) {
            abort(403, 'Acceso no autorizado');
        }

        // Si el usuario tiene rol 'ADMINISTRADOR' o 'SERVICIOS' se le permite el acceso
        if ($user->hasRole('ADMINISTRADOR') || $user->hasRole('SERVICIOS')) {
            return $next($request);
        }

        // En cualquier otro caso, se le niega el acceso
        abort(403, 'Acceso no autorizado');
    }
}
