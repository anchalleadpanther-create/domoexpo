<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequireLoginExceptPublic
{
    /**
     * Publicly accessible URIs (no login required)
     */
    protected $except = [
        '/',  // home page  
        'mail-testing',  
        'buyer/login',            // login form
        'buyer/login/*',
        'buyer/register',         // registration page
        'buyer/register/*',
        'pages/*',
        'admin/*',
        'login',
        'checkout',
        'jcc/*'
        
    ];

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // If the request path matches any "public" URI — allow it
        foreach ($this->except as $excluded) {
            if ($request->is($excluded)) {
                return $next($request);
            }
        }

        // If the user is logged in — allow
        // dd($this->checkAllGuards());
        if ($this->checkAllGuards()) {
            
            return $next($request);
        }

        // Otherwise redirect guest users to the home page
        return redirect('/')->with('success','Please log in to access other pages.');
    }
    
    protected function checkAllGuards(): bool
    {
        // dd(array_keys(config('auth.guards')));
        foreach (array_keys(config('auth.guards')) as $guard) {
        //   dump($guard, Auth::guard($guard)->check());
            if (Auth::guard($guard)->check()) {
                // Optionally, set the default guard for later use
                // Auth::shouldUse($guard);
                return true;
            }
        }
        return false;
    }
}
