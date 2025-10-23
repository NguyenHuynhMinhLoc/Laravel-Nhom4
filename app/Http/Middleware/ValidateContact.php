<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateContact
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $request->validate([
            'name'    => 'required|min:3|max:40',
            'email'   => 'required|email',
            'phone'   => 'nullable|regex:/^[0-9\-\+\s]+$/',
            'message' => 'required|min:5',
        ]);  
        return $next($request);
    }
}
