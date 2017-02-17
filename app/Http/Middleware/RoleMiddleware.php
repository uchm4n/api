<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class RoleMiddleware extends \Tymon\JWTAuth\Middleware\GetUserFromToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {

        //JWT Implementation

        if ($token = $this->auth->setRequest($request)->getToken()) {
            try {
                $this->auth->authenticate($token);
            } catch (\Exception $e) {
                unset($e);
            }
        }

        return $next($request);


//        if (Auth::guest()) {
//            return redirect('/');
//        }
//
//        if (! $request->user()->hasRole($role)) {
//            abort(403);
//        }
//
//        if (! $request->user()->can($permission)) {
//            abort(403);
//        }
//
//        return $next($request);
    }
}
