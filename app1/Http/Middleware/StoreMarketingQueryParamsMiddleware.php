<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Analytic;
use Illuminate\Http\Request;
use Jenssegers\Agent\Facades\Agent;
use Jaybizzle\CrawlerDetect\CrawlerDetect;

class StoreMarketingQueryParamsMiddleware
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
    $currentLocation = getCurrentLocation();
    $CrawlerDetect = new CrawlerDetect;

    if (str_contains(url()->current(), 'admin') || str_contains(url()->current(), 'get-cart-products') || str_contains(url()->current(), '_debugbar') || str_contains(url()->current(), 'telescope') || str_contains(url()->current(), 'public') || str_contains(url()->current(), 'uploads') || str_contains(url()->current(), 'allUsers') || str_contains(url()->current(), 'filter') || str_contains(url()->current(), 'ajax') || str_contains(url()->current(), 'variant') || str_contains(url()->current(), 'allUsers') || str_contains(url()->current(), '_ignition') || request()->ajax() || $CrawlerDetect->isCrawler())
      return $next($request);

    $refURL = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;

    $device = '';

    if (Agent::isDesktop())
      $device = 'Desktop';
    elseif (Agent::isMobile())
      $device = 'Mobile';
    elseif (Agent::isTablet())
      $device = 'Tablet';

    $utmQueryParams = [
      'utm_source',
      'utm_medium',
      'utm_campaign',
      'utm_term',
      'utm_content',
    ];
    $utms = [];
    foreach ($utmQueryParams as $utmQueryParam) {
      if (request()->has($utmQueryParam)) {
        session([$utmQueryParam => request()->input($utmQueryParam)]);
        $utms[$utmQueryParam] = request()->input($utmQueryParam);
      }
    }

    Analytic::create($utms + ['ip_address' => request()->ip(), 'url' => url()->current(), 'ref_url' => $refURL, 'browser' => Agent::browser(), 'device' => $device, 'country_name' => isset($currentLocation->location->countryName) ? $currentLocation->location->countryName : null, 'country_code' => isset($currentLocation->location->countryCode) ? $currentLocation->location->countryCode : null, 'region_code' => isset($currentLocation->location->regionCode) ? $currentLocation->location->regionCode : null, 'region_name' => isset($currentLocation->location->regionName) ? $currentLocation->location->regionName : null, 'city_name' => isset($currentLocation->location->cityName) ? $currentLocation->location->cityName : null, 'latitude' => isset($currentLocation->location->latitude) ? $currentLocation->location->latitude : null, 'longitude' => isset($currentLocation->location->longitude) ? $currentLocation->location->longitude : null]);

    return $next($request);
  }
}
