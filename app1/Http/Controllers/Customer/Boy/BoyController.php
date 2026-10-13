<?php

namespace App\Http\Controllers\Customer\Boy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cms\HomeSlider;
use App\Models\Cms\ShopByAge;

use App\Models\Extensions\Blog;
use App\Models\Ecommerce\Product;

class BoyController extends Controller
{
    public function boys(Request $request){
         $mainBanner = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Boy Page Main Banner']])
            ->first();

        $girlPageFirstSlider  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Boy page first slider']])
           ->limit(8)
            ->get();
            
         

        $shopByAge = ShopByAge::where([
                        ['status', '=', 1],
                        ['position', '=', 'For Boy'],
                    ])->orderBy('sort')->get();

        $shopByCategoriesOne  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Boy Page Shop By Categories Slider One']])
           ->limit(8)
            ->get();
            
        $shopByCategoriesTwo  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Boy Page Shop By Categories Slider Two']])
           ->limit(8)
            ->get();


        $shopByBrandsSliders = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Boy Page Shop By Brands Sliders']])
            ->limit(8)
            ->get();

        $winterClosetSliders = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Boy Page Winter Closet Sliders']])
            ->limit(8)
            ->get();

        $footWearsBanner = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Boy Page Foot Wear Banner']])
            ->first();
        

        $accessoriesSliders =  HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Boy Page Accessories Sliders']])
            ->limit(8)
            ->get();

      $bestSeller  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Boy Page Best Seller']])
            ->limit(10)
            ->get();

        return view('customer.boy.boy',compact(
            'mainBanner','girlPageFirstSlider','shopByBrandsSliders','winterClosetSliders','footWearsBanner','accessoriesSliders',
            'shopByCategoriesOne',
            'shopByCategoriesTwo',
            'bestSeller',
            'shopByAge'));
    }
}

