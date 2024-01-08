<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class FrontendAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next) : Response
    {

        if(empty(Auth::user())) {

            return redirect()->route('frontend#login');
        }

        if(!empty(Auth::user())) {

            if (Auth::user()->teacher_id != null || Auth::user()->student_id != null)
            {
                abort(403);
            }
        }

        return $next($request);
    }
}
