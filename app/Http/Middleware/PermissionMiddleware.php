<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;
use Symfony\Component\HttpFoundation\Response;

class PermissionMiddleware
{
    public function handle($request, Closure $next, ...$permissions)
    {
        if (!Auth::check() || !Auth::user()->hasAnyPermission($permissions)) {
            return redirect()->route('login');
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}



