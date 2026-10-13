<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckBuyerAccessStatus
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
    
        $user = Auth::guard('buyer')->user();
         if ($user && $user->status != 1 ) {
            return redirect()->route('buyer.dashboard')->with('success','You have been temporarily disabled by the admin. Please contact the admin.');
        }elseif($user && !$user->isMembershipActive &  $user->account_type != 'Buyer'){
            return redirect()->route('buyer.dashboard')->with('success','You have to pay platform fee to access all platform.');
        }

        return $next($request);
    }
}
