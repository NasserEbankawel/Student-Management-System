<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Bouncer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $name = $request->query('request');
        if($name = 'ama')
        {
            //abort(400) ;
            //$response = $next($request) ;
            return response('You are less than 18') ;
        }
        return $next($request);
    }
    




}
