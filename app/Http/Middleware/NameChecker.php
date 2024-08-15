<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NameChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $name = $request->query('name');
        
        if ($name && stripos($name, 'A') !== 0) {
            // If the name does not start with 'A', return a custom response
            return response('The name does not start with A', 200);
        }
        return $next($request);
    }
}
