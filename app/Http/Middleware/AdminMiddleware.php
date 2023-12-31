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
        // Controleer of de gebruiker een admin is
        if (auth()->check() && auth()->user()->is_admin) {
            return $next($request);
        }


        // Je kunt ook een redirect gebruiken in plaats van abort
         return redirect()->route('home')->with('error', 'Unauthorized action.');
    }
}
