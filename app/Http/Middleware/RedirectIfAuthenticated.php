<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // if the user is not a guest they should not see the login page instead they should be redirected lets say to
        // to their dashboard
        switch($guard){
            case 'student':
            if(Auth::guard($guard)->check()){
                return redirect()->route('student_dashboard');
            }
            break;

            default:
            if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }
            break;
        }
       

        return $next($request);
    }
}
