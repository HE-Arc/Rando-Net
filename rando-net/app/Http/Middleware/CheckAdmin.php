<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
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
        if (Auth::user() != null) {
            if (Auth::user()->isAdmin) {
                return $next($request);
            }
            return redirect()
                ->route("hikes.index")
                ->with("fail", "You are not Admin");
        }
        return redirect()
            ->route("login")
            ->with("fail", "You are not connected");
    }
}
