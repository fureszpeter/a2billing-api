<?php
namespace A2billingApi\Http\Middleware;

use Closure;

class HttpsMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!$request->secure() && env('APP_ENV') === 'prod') {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}
