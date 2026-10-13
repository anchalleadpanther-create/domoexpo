<?php

namespace App\Http\Controllers\Customer\Girl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cms\HomeSlider;
use App\Models\Extensions\Blog;
use App\Models\Ecommerce\Product;

class GirlController extends Controller
{
    public function girls(Request $request){
        $mainBanner = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Girl Page Main Banner']])
            ->first();
         $shopByCategoriesOne  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Girl Page Shop By Categories Slider One']])
           ->limit(10)
            ->get();

        $shopByCategoriesTwo  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Girl Page Shop By Categories Slider Two']])
           ->limit(10)
            ->get();


        $discoverBrands = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Girl Page Discover Brands']])
           ->limit(5)
            ->get();

       $bestSeller  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Girl Page Best Seller']])
           ->limit(4)
            ->get();
        

             

        return view('customer.girl.girl',compact('mainBanner','shopByCategoriesOne','shopByCategoriesTwo','discoverBrands','bestSeller'));
    }
}
