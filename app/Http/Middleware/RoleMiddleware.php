<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle($request, Closure $next)
    {
        if (auth()->check() && !auth()->user()->hasRole('admin')) {
            return redirect()->route('posts.index')->with('error', 'You do not have access to add ,edit or delete any blog!!!');
        }
        return $next($request);
    }
}
