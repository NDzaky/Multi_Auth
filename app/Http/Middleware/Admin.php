<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user && ($user->role == 'admin' || $user->role == 'superadmin')) {
            return $next($request);
        }

        return redirect('dashboard')->with('error', 'Unauthorized access.');
    }
}
