<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle($request, Closure $next)
    {
        if (session('key') == '1') {

            return $next($request);
        }
        return redirect('/Front');
    }
}
