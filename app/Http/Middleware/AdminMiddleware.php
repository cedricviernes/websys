<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Example: check if user is admin (adjust as needed)
        if (auth()->check() && auth()->user()->is_admin) {
            return $next($request);
        }
        return redirect()->route('products.index')->with('success', 'Welcome, ' . auth()->user()->name . '!');
    }
}
