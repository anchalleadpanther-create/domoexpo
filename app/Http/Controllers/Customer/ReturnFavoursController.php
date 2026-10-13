<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cms\HomeSlider;
use App\Models\Extensions\Blog;
use App\Models\Ecommerce\Product;

class ReturnFavoursController extends Controller
{
    public function returnFavours(Request $request){
        $mainBanner = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Return Favours Page Main Banner']])
            ->first();




        $circleImagesSliders  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Return Favours Page circle images']])
           ->limit(8)
            ->get() ?? [];

        $thirdSectionFirstBanner  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Return Favours Page third section first banner']])
           ->first();
        
         $thirdSectionSecondBanner  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Return Favours Page third section second banner']])
           ->first();

        $bestSellerSliders  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Return Favours Page Best Seller Sliders']])
           ->limit(20)
            ->get() ?? [];

        $characterStoreSliderOne =  HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Return Favours Page Character Store Sliders One']])
           ->limit(20)
            ->get() ?? [];

            

        $characterStoreSliderTwo  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Return Favours Page Character Store Sliders Two']])
           ->limit(20)
            ->get() ?? [];

        $hotDealsSliders  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Return Favours Page Hot Deals Sliders']])
           ->limit(20)
            ->get() ?? [];

        $theValueStoreSliders  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Return Favours Page The Value Store Sliders']])
           ->limit(20)
            ->get() ?? [];

        $theValueStoreBanner  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Return Favours Page The Value Store banner']])
           ->first();

        $readyToShipSlidersOne  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Return Favours Page Ready To Ship Sliders One']])
           ->limit(20)
            ->get() ?? [];

            

        $readyToShipSlidersTwo  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Return Favours Page Ready To Ship Sliders Two']])
            ->limit(20)
            ->get() ?? [];

        $readyToShipBanner  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Return Favours Page Ready To Ship banner']])
           ->first();
        

        $inquiryFromSideImages  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Return Favours Page Inquiry From Side Images']])
            ->limit(6)
            ->get() ?? [];
        
        return view('customer.return-favours',compact(
            'mainBanner',
            'circleImagesSliders',
            'thirdSectionFirstBanner',
            'thirdSectionSecondBanner',
            'bestSellerSliders',
            'characterStoreSliderOne',
            'characterStoreSliderTwo',
            'hotDealsSliders',
            'theValueStoreSliders',
            'theValueStoreBanner',
            'readyToShipSlidersOne',
            'readyToShipSlidersTwo',
            'readyToShipBanner',
            'inquiryFromSideImages',
        ));
    }
}
