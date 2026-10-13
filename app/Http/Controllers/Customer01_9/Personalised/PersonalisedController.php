<?php

namespace App\Http\Controllers\Customer\Personalised;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cms\HomeSlider;
use App\Models\Extensions\Blog;
use App\Models\Ecommerce\Product;

class PersonalisedController extends Controller
{
    public function personalised(Request $request){
        $mainBanner = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Personalised Page Main Banner']])
            ->first();

        $mainIcons = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Personalised Page Main Icons']])
            ->limit(4)
            ->get() ;

        
         $shopByCategoriesOne  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Personalised Page Shop By Categories Slider One']])
           ->limit(5)
            ->get() ?? [];

        $shopByCategoriesTwo  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Personalised Page Shop By Categories Slider Two']])
           ->limit(5)
            ->get() ?? [];


        $discoverBrands = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Personalised Page Discover Brands']])
           ->limit(5)
            ->get() ?? [];

       $bestSeller  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Personalised Page Best Seller']])
           ->limit(4)
            ->get() ?? [];
         

        return view('customer.personalised.personalised',compact('mainBanner','shopByCategoriesOne','shopByCategoriesTwo','discoverBrands','bestSeller','mainIcons'));
    }
}
