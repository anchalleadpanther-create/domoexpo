<?php

namespace App\Http\Controllers\Customer;

use Session;
use Illuminate\View\View;
use App\Models\Buyer\Buyer;

use App\Models\Cms\HomeSlider;
use App\Models\Extensions\Blog;
use App\Models\Ecommerce\Product;
use App\Http\Controllers\Controller;
use App\Models\Cms\HomePageTestimonial;

class HoliController extends Controller
{

    public function holi(): View {

        
        $holiFirstBanner = HomeSlider::orderBy('sort')->where([['status', '=', 1], ['position', '=', 'Holi First Banner']])->first();
        $holiSecondBanners = HomeSlider::orderBy('sort')->where([['status', '=', 1], ['position', '=', 'Holi Second Banners']])
                            ->limit(20)
                            ->get();

        $colorsOfHoliFirstBanners = HomeSlider::orderBy('sort')->where([['status', '=', 1], ['position', '=', 'Colors Of Holi First Banners']])
                            ->limit(20)
                            ->get();
        $colorsOfHoliFirstBanner = HomeSlider::orderBy('sort')->where([['status', '=', 1], ['position', '=', 'Colors Of Holi Second Banner']])->first();
        $holiBrandsInFocusFirstBanners = HomeSlider::orderBy('sort')->where([['status', '=', 1], ['position', '=', 'Holi Brands in Focus First Banners']])
                            ->limit(20)
                            ->get();
        $holiBrandsInFocusSecondBanner = HomeSlider::orderBy('sort')->where([['status', '=', 1], ['position', '=', 'Holi Brands in Focus Second Banner']])->first();
        $holiBestSellersFirstBanners = HomeSlider::orderBy('sort')->where([['status', '=', 1], ['position', '=', 'Holi Best Sellers First Banners']])
                            ->limit(20)
                            ->get();
        $holiBestSellersFirstBanner = HomeSlider::orderBy('sort')->where([['status', '=', 1], ['position', '=', 'Holi Best Sellers First Banner']])->first();




        return view('customer.holi',
            compact('holiFirstBanner',
            'holiSecondBanners',
            'colorsOfHoliFirstBanners',
            'colorsOfHoliFirstBanner',
            'holiBrandsInFocusFirstBanners',
            'holiBrandsInFocusSecondBanner',
            'holiBestSellersFirstBanners',
            'holiBestSellersFirstBanner'));
    }
}