<?php

namespace App\Http\Controllers\Customer\Personalised;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cms\HomeSlider;
use App\Models\Extensions\Blog;
use App\Models\Ecommerce\Product;
use App\Models\Cms\HomePageTestimonial;

class PersonalisedController extends Controller
{
    public function personalised(Request $request){
        $mainBanner = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Personalised Page Main Banner']])
            ->first();

            

        $shopByOccassionOne  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Personalised Page Shop By Occassion Slider One']])
           ->limit(5)
            ->get() ?? [];

        $shopByOccassionTwo  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Personalised Page Shop By Occassion Slider Two']])
           ->limit(5)
            ->get() ?? [];

         $shopByCategoriesOne  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Personalised Page Shop By Categories Slider One']])
           ->limit(5)
            ->get() ?? [];

        $shopByCategoriesTwo  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Personalised Page Shop By Categories Slider Two']])
           ->limit(5)
            ->get() ?? [];


        

        $bestSellerSlidersOne  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Personalised Page Best Seller Sliders One']])
           ->limit(20)
            ->get() ?? [];

        $bestSellerSlidersTwo  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Personalised Page Best Seller Sliders Two']])
           ->limit(20)
            ->get() ?? [];

        $bestSellerBanner  = HomeSlider::orderBy('sort')
           ->where([['status', '=', 1], ['position', '=', 'Personalised Page Best Seller Banner']])
            ->first();

        $featuredBrandsSliders  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Personalised Page Featured Brand Sliders']])
           ->limit(20)
            ->get() ?? [];

            
         
$getAllTestimonials = HomePageTestimonial::orderBy('sort')->where('status', '=', 1)->get();
        return view('customer.personalised.personalised',compact('mainBanner',
        'shopByOccassionOne',
        'shopByOccassionTwo',
        'shopByCategoriesOne',
        'shopByCategoriesTwo',
        'bestSellerBanner',
        'bestSellerSlidersOne',
        'bestSellerSlidersTwo',
        'featuredBrandsSliders',
    'getAllTestimonials'));
    }
}
