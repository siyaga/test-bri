<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
       if (!auth('api')->check()) {
            return $this->errorResponse('Unauthorized. Token is invalid or expired.', 401);
        }

        return $next($request);
    }
}
