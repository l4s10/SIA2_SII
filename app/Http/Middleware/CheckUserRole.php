<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    public function handle($request, Closure $next)
    {
        // Verificar si el usuario está autenticado
        if (Auth::check()) {
            // Obtener el usuario autenticado
            $user = Auth::user();

            // Verificar si el usuario tiene alguno de los roles 'ADMINISTRADOR', 'JURIDICO' o 'INFORMATICA'
            $isAdmin = $user->hasRole(['ADMINISTRADOR', 'JURIDICO', 'INFORMATICA']);
        } else {
            // Si el usuario no está autenticado, asumimos que no tiene los roles necesarios
            $isAdmin = false;
        }

        // Compartir la información del rol con todas las vistas
        view()->share('isAdmin', $isAdmin);

        return $next($request);
    }
}
