<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRelFunWithServicesPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user->hasRole('ADMINISTRADOR')) {
            return $next($request);
        } elseif ($user->hasRole('SERVICIOS')) {
            if ($request->route()->getActionMethod() === 'destroy') {
                abort(403, 'Acceso no autorizado');
            }
            return $next($request);
        } else {
            if ($request->route()->getActionMethod() !== 'index' &&
                $request->route()->getActionMethod() !== 'create' &&
                $request->route()->getActionMethod() !== 'store' &&
                $request->route()->getActionMethod() !== 'show'&&
                $request->route()->getActionMethod() !== 'indexRendir' &&
                $request->route()->getActionMethod() !== 'indexAutorizar' &&
                $request->route()->getActionMethod() !== 'rendicion' &&
                $request->route()->getActionMethod() !== 'update') {
                    //!! ACCESO SOLO PARA ESTAS RUTAS, EN CASO CONTRARIO REDIRIGIR A 403.
                    abort(403, 'Acceso no autorizado');
                }
            return $next($request);
        }
    }
}
