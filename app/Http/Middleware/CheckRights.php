<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRights
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $groupsArray = Auth::user()->my_groups;
            if ($groupsArray && (in_array(1, $groupsArray) || in_array(6, $groupsArray))) {
                return $next($request);
            } else {
                abort(404);
            }
        } else {
            abort(404);
        }
    }
}
