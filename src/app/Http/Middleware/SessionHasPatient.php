<?php

namespace App\Http\Middleware;

use Closure;

class SessionHasPatient
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
        try {
            if(session('userType')[0] == 'Patient') {
                return $next($request);
            }
            return abort(404);
        } catch (\Exception $e) {
            header("Location: ./patientSignIn");
            exit();
        }
    }
}
