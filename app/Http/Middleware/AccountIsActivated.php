<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AccountIsActivated
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
        $user = Auth::user();

        if (!$user -> status) {
            return response() -> json([
                "message" => trans("api.Activate account")
            ], 403);
        }

        return $next($request);
    }
}
