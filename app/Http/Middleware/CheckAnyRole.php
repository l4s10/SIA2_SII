<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class CheckAnyRole
{
    public function handle($request, Closure $next)
    {
        //Si el usuario no esta autentificado regresa al login
        if (!Auth::check())
            return redirect('login');

        $user = Auth::user(); //Obtenemos al user

        $roles = Role::all()->pluck('name'); //Obtenemos todos los roles

        //Si el usuario tiene CUALQUIER ROL, sea cual sea, se le concede el acceso (es como un acceso comun para todos)
        //Cuenta como una capa mas de proteccion ademas del ingreso de sesion
        if($user->hasAnyRole($roles->toArray())) {
            return $next($request);
        }

        abort(403, "Acción no autorizada");
    }
}

