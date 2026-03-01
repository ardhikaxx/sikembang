<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        
        if ($user->role !== $role) {
            if ($user->role === 'ibu_hamil') {
                return redirect()->route('ibu.dashboard');
            } elseif ($user->role === 'bidan') {
                return redirect()->route('bidan.dashboard');
            }
            
            return redirect()->route('login');
        }

        return $next($request);
    }
}
