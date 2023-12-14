<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotFound
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (config('app.debug')) {
            return $next($request);
        }

        $response = $next($request);
        if ($response instanceof Response && $response->getStatusCode() === 500) {
            $data['code'] = $response->getStatusCode();
            $data['message'] = "Sepertinya, anda tidak memiliki akses ke halaman ini.";
            return response()->view('errors.500', $data, 500);
        }

        return $response;
    }
}
