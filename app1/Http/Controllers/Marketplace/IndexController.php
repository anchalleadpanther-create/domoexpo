<?php

namespace App\Http\Controllers\Marketplace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cms\HomeSlider;
use App\Models\Extensions\Blog;
use App\Models\Ecommerce\Category;
use App\Models\Ecommerce\Brand;
use App\Models\Supplier\Supplier;

class IndexController extends Controller
{
  public function index()
  {
      
    if (request()->has('seller_email')) {

        $email = request()->seller_email;

        // 1. Logout from any guard if someone is logged in
        $guards = ['web', 'vendor', 'buyer']; // add/remove guards as per your project
        foreach ($guards as $guard) {
            if (auth()->guard($guard)->check()) {
                auth()->guard($guard)->logout();
            }
        }

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        // 2. Login seller using email
        $seller = Supplier::where('biz_email', $email)->first();

        if ($seller) {
            auth()->guard('vendor')->login($seller);
        }

    }
    // $latestBlogs = Blog::orderbyDesc('id')->where('status', '=', 1)->limit(15)->get();
    
    // dd(auth()->guard('vendor')->user());
    
    $mainHeaderTabs = HomeSlider::where('position','Main Header Tabs')->orderByDesc('sort')->limit('4')->get();
    $leftSideMainSliders = HomeSlider::where('position','Left Side Main Sliders')->orderByDesc('sort')->get();
    $rightSideMainBanners = HomeSlider::where('position','Right Side Main Banners')->orderByDesc('sort')->limit('2')->get();
    $bannerAfterPremiumSuppliers = HomeSlider::where('position','Banner After Premium Suppliers')->orderByDesc('sort')->first();
    $featuredCategories = Category::where('featured',1)->where('status',1)->orderByDesc('sort')->get();
    $featuredBrands = Brand::where('featured',1)->where('status',1)->get();
    $premiumSuppliers = Supplier::orderByDesc('id')->get();
    $currency = getCurrentCurrency();
    return view(
        'marketplace.index',
        compact(
            'currency',
            'mainHeaderTabs',
            'leftSideMainSliders',
            'rightSideMainBanners',
            'premiumSuppliers',
            'bannerAfterPremiumSuppliers',
            'featuredCategories',
            'featuredBrands',
            
            )
        );
  }
}
