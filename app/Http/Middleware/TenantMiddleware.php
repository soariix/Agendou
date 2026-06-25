<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TenantMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if (!$user || !$user->tenant_id) {
            return response()->json(['error' => 'Tenant não identificado'], 403);
        }

        $request->merge(['tenant_id' => $user->tenant_id]);

        return $next($request);
    }
}
