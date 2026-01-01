<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\AdminPrivilege;

class AdminAccessMiddleware
{
    public function handle(Request $request,Closure $next, $permission): Response
    {
        $admin = auth()->user();
        
        if (!$admin || $admin->role !== 'admin') {
            abort(403, 'Unauthorized access.');
        }

        // Super admin has all permissions
        if ($admin->is_super_admin) {
            return $next($request);
        }

        $privilege = AdminPrivilege::where('admin_id', $admin->id)->first();
        
        if (!$privilege || !in_array($permission, $privilege->permissions)) {
            abort(403, 'You do not have permission to access this resource.');
        }

        return $next($request);
    }
}