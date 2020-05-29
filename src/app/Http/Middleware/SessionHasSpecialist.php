<?php

namespace App\Http\Middleware;

use Closure;

class SessionHasSpecialist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(session('userType')[0] == 'Specialist') {
            return $next($request);
        }
        return abort(404);
    }
}
