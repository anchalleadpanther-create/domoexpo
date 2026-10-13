<?php

namespace App\Http\Controllers\Customer\Boy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cms\HomeSlider;
use App\Models\Extensions\Blog;
use App\Models\Ecommerce\Product;

class BoyController extends Controller
{
    public function boys(Request $request){
        $mainBanner = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Boy Page Main Banner']])
            ->first();
         $shopByCategoriesOne  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Boy Page Shop By Categories Slider One']])
           ->limit(10)
            ->get();

        $shopByCategoriesTwo  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Boy Page Shop By Categories Slider Two']])
           ->limit(10)
            ->get();


        $discoverBrands = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Boy Page Discover Brands']])
           ->limit(5)
            ->get();

       $bestSeller  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Boy Page Best Seller']])
           ->limit(4)
            ->get();
         

        return view('customer.boy.boy',compact('mainBanner','shopByCategoriesOne','shopByCategoriesTwo','discoverBrands','bestSeller'));
    }
}

