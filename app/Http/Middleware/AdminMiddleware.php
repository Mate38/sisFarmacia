<?php

/**
 * Autor: Mateus Cardoso
 * 
 * E-mail: matecardoso38@gmail.com
 */

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class AdminMiddleware
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
        if(Auth::user()->nivel != 1){
            return redirect('/home');
        }
        return $next($request);
    }
}
