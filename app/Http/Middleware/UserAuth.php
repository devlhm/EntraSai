<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // return $next($request);

        $routeName = $request->route()->getName();
        $loggedIn = Auth::check();

        // dd($loggedIn, $routeName);

        if ($loggedIn && $routeName == "login") {
            return redirect('/home', 307);
        } else if (!$loggedIn && $routeName != "login") {
            return redirect('/', 307);
        }

        return $next($request);
    }
}
