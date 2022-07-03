<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, String $roles)
    {
        $roles = explode('|', $roles);
        if (!Auth::check())
            return redirect('/login');

        $user = Auth::user();

        if (in_array($user->role,$roles))
            return $next($request);

        return redirect('/dashboard');
    }
}
