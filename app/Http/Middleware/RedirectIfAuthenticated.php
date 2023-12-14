<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = auth()->user();

                if ($user->user_role_id == 1) {
                    return redirect('/dashboard/seller')->with('message', 'Anda berhasil login!');
                }
                // Alternatively, you can use this: Admin
                if ($user->user_role_id == 3) {
                    return redirect('/dashboard/superadmin')->with('message', 'Anda berhasil login!');
                }
                return redirect('/dashboard');
            }
        }

        return $next($request);
    }
}
