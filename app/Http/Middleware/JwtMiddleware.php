<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JwtMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        try {
            auth('api')->authenticate();
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'No autenticado.',
            ], 401);
        }

        return $next($request);
    }
}