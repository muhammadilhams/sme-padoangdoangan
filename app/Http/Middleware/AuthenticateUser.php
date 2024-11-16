<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateUser
{
    // public function handle(Request $request, Closure $next)
    // {
    //     if (!Auth::check()) {
    //         return redirect('/login'); // Redirect to the login page if the user is not authenticated
    //     }

    //     return redirect()->route('products.index');
    // }
}
