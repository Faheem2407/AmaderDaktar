<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Not logged in
        if (!Auth::check()) {
            return redirect()->route('admin.login');
        }

        // Logged in but not admin
        if (Auth::user()->role !== 'admin') {
            Auth::logout();
            return redirect()->route('admin.login')
                ->withErrors(['email' => 'Access denied. Admins only.']);
        }

        // Logged in & admin
        return $next($request);
    }
}
