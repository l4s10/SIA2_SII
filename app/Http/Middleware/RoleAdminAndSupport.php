<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleAdminAndSupport
{
    /**
     * Handle an incoming request.
     *  ESTE MIDDLEWARE SIRVE PARA CHECKEAR EL ROL DE ADMINISTRADOR Y SERVICIOS
     *  ES DECIR, SI TIENES EL ROL DE ADMINISTRADOR O SERVICIOS PODRAS TENER ACCESO A X PAGINA.
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        //Obtenemos al usuario que quiere acceder
        $user = Auth::user();
        //Verificamos sus roles. si cumple, pasa a la siguiente pagina. En caso contrario se redirige a un acceso no autorizado.
        if ($user->hasRole('ADMINISTRADOR') || $user->hasRole('INFORMATICA')) {
            return $next($request);
        } else {
            abort(403, 'Acceso no autorizado');
        }
    }
}
