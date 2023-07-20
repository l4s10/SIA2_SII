<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckearRol
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) // No está logueado se regresara al LogIn.
            return redirect('login');

        $user = Auth::user(); //Se obtiene al usuario

        //Se chequea si el usuario tiene X rol ESPECIFICO
        // Ejemplo: Si pepito tiene rol "ROL_PEPITO", dejalo entrar. (especificar en controller)
        if($user->hasAnyRole($roles)) {
            return $next($request);
        }

        abort(403, "Acción no autorizada");
    }
}
