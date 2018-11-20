<?php

namespace App\Http\Middleware;

use Closure;

use App\Models\Visitor;

class RegisterVisit
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
            $ip = $request -> ip();
            Visitor::updateOrCreate(compact('ip'), compact('ip'));
        } catch (Exception $e) {

        }

        return $next($request);
    }
}
