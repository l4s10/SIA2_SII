<?php

// app/Http/Middleware/CheckUserPermission.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserPermission
{
    public function handle(Request $request, Closure $next, ...$permissions)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $userPermissions = Auth::user()->getAllPermissions();

        foreach ($permissions as $permission) {
            if ($userPermissions->contains('name', $permission)) {
                return $next($request);
            }
        }

        return redirect('/unauthorized');
    }
}

