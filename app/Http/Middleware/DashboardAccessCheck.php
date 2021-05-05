<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DashboardAccessCheck
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
        //means no session
        // no login page
        // no regsiter page
        if(!session('adminuser') && ($request->path()!=="auth/login") && ($request->path()!=="auth/register"))
        {
            return redirect('/auth/login');
        }

        // means we are logged into dashboard page and use login or register page it will redirect to same page on dashboard page
        if(session('adminuser') && ($request->path()=="auth/login") || ($request->path()=="auth/register"))
        {
            return back();
        }

        //Laravel Prevent Browser Back Button After Logout, so that he will not be able to access auth protected routes or pages after logout.
        return $next($request)->header('Cache-Control','nocache, no-store, max-age=0, must-revalidate')
        ->header('Pragma','no-cache')
        ->header('Expires','Sat, 26 Jul 1997 05:00:00 GMT');
    }
}
