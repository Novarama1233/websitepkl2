<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Cek login dengan guard admin
        if (!auth('admin')->check()) {
            abort(403, 'Anda bukan admin.');
        }

        return $next($request);
    }
}
