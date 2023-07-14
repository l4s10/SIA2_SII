<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class CheckAnyRole
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check())
            return redirect('login');

        $user = Auth::user();

        $roles = Role::all()->pluck('name');

        if($user->hasAnyRole($roles->toArray())) {
            return $next($request);
        }

        abort(403, "Acción no autorizada");
    }
}

