<?php

namespace Laravision\Translater\Http\Middleware;

use Closure;

class TranslaterMiddleware
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
        if (!\Session::has('locale')) {
            \Session::put('locale', config('app.locale'));
        }  
        app()->setLocale(\Session::get('locale')); 
        return $next($request);
    }
}
