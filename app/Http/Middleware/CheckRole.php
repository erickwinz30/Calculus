<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class CheckRole
{

    public function handle(Request $request, Closure $next, ...$roles)
    {
        // $roles = array_slice(func_get_args(), 2);
        if (!Auth::check()) {
            return redirect('login');
        }
        foreach ($roles as $role) {

            if (Auth::user()->role == $role)
                
                    return $next($request);
                
        }
        return redirect('login');
    }
}
