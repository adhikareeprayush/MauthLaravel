<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class SuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (!Auth::check()){
            return redirect('login');
        }

        $userRole = Auth::user()->role;

        if($userRole==1)
        {
            return $next($request);
        }
        else if($userRole== 2)
        {
            return redirect('admin');
        }
        else if($userRole== 3)
        {
            return redirect('dashboard');
        }
        else
        {
            return redirect('login');
        }
    }
}
