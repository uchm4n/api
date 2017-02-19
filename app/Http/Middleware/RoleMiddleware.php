<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, \Closure $next, $role, $permission)
    {

        if (!auth()->check()) {
            abort(403,'User is not authenticated');
        }

        if (!auth()->user()->hasRole($role)) {
            abort(403,'User has no role '.$role);
        }

        if(!auth()->user()->can($permission)){
            about(403,'user has no permission '.$permission);
        }

        return $next($request);

    }
}
