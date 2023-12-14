<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestrictAccessMiddleware
{
    public function handle(Request $request, Closure $next, ...$allowedRoles)
    {
        $user = Auth::user();

        if ($user && in_array($user->user_roles->name, $allowedRoles)) {
            return $next($request);
        }

        $data['code'] = 403;
        $data['message'] = "Sepertinya, anda tidak memiliki akses ke halaman ini.";
        return response()->view('errors.forbidden', $data, 403);
        
       
    }
}
