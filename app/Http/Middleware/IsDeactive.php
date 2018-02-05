<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class IsDeactive
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
        if (Auth::check()) {
            if (Auth::user()->isUser()) {
                if (Auth::user()->isDeactive()) {
                    Auth::logout();
                    alert()->info('Your Account is deactivated By Admin contact admin for more info')->autoclose(6000);
                    return redirect('/');
                }
            }
        }
        return $next($request);
    }
}
