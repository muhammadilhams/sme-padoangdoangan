<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Jika pengguna tidak terautentikasi atau peran bukan admin, redirect ke halaman login
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect('login')->withErrors(['error' => 'Anda tidak memiliki akses sebagai admin.']);
        }

        return $next($request);
    }
}


