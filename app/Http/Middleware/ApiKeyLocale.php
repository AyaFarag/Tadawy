<?php
namespace App\Http\Middleware;
use Closure;
use App\Events\RequestHasNotification;
class ApiKeyLocale
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
        if(!$request->header('x-api-key') || $request->header('x-api-key') != env('API_KEY'))
            return response()->json(['error'=>'Invalid api key'],500);
        //set local
        if($request->header('Accept-Language')){
            app()->setLocale(strtolower($request->header('Accept-Language')));
        }

        $response = $next($request);
        return $response;
    }
}