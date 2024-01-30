<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($this->isAdmin($request)){
            return $next($request);
        }
        abort(403);
    }
    /**
     * Handle an incoming request.
     *
     * Check user Admin
     */
    private function isAdmin($request): bool
    {

        $user = $request->user();

        return $user-> admin;
    }
}
