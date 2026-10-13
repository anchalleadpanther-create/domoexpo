<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Extensions\Currency;


class CheckCurrencyAndSetIfNoneExists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     if (session()->missing('currency')) {
    //         // dd(session()->get('currency'));
    //         if (getCurrentLocation()->location->countryName === 'India') {
    //             $getIndianCurrencyId = Currency::where('currency', '=', 'INR')->value('id');
    //         } else {
    //             $getIndianCurrencyId = Currency::where('currency', '=', 'USD')->value('id');
    //         }

    //         session(['currency' => $getIndianCurrencyId]);
    //         // dd(session()->get('currency'));
    //     }
    //     return $next($request);
    // }

    public function handle(Request $request, Closure $next)
    {
        // dd(3);
        $getCUrrentLocation = getCurrentLocation();
        // if (session()->missing('currency')) {
        // if (is_bool($getCUrrentLocation->location)) {
        //     $getIndianCurrencyId = Currency::where('currency', '=', 'INR')->value('id');
        // } else {
        //     if ($getCUrrentLocation->location->countryName === 'India')
        //     $getIndianCurrencyId = Currency::where('currency', '=', 'INR')->value('id');
        //     else
        //     $getIndianCurrencyId = Currency::where('currency', '=', 'EUR')->value('id');
        // }

        // session(['currency' => $getIndianCurrencyId]);
        // }
        
        $getIndianCurrencyId = Currency::where('currency', '=', 'EUR')->value('id');
        // dd($getIndianCurrencyId);
        session(['currency' => $getIndianCurrencyId]);
        // dd($getIndianCurrencyId);
        return $next($request);
    }
}
