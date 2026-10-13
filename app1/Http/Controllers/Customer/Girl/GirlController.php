<?php

namespace App\Http\Controllers\Customer\Girl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cms\HomeSlider;
use App\Models\Cms\ShopByAge;
use App\Models\Extensions\Blog;
use App\Models\Ecommerce\Product;

class GirlController extends Controller
{
    public function girls(Request $request){
        $mainBanner = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Girl Page Main Banner']])
            ->first();

        $girlPageFirstSlider  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Girl page first slider']])
           ->limit(8)
            ->get();
            
         

        $shopByAge = ShopByAge::where([
                        ['status', '=', 1],
                        ['position', '=', 'For Girl'],
                    ])->orderBy('sort')->get();

        $shopByCategoriesOne  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Girl Page Shop By Categories Slider One']])
           ->limit(8)
            ->get();
            
        $shopByCategoriesTwo  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Girl Page Shop By Categories Slider Two']])
           ->limit(8)
            ->get();


        $shopByBrandsSliders = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Girl Page Shop By Brands Sliders']])
            ->limit(8)
            ->get();

        $winterClosetSliders = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Girl Page Winter Closet Sliders']])
            ->limit(8)
            ->get();

        $footWearsBanner = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Girl Page Foot Wear Banner']])
            ->first();
        

        $accessoriesSliders =  HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Girl Page Accessories Sliders']])
            ->limit(8)
            ->get();

      $bestSeller  = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Girl Page Best Seller']])
            ->limit(8)
            ->get();
         

        return view('customer.girl.girl',compact(
            'mainBanner','girlPageFirstSlider','shopByBrandsSliders','winterClosetSliders','footWearsBanner','accessoriesSliders',
            'shopByCategoriesOne',
            'shopByCategoriesTwo',
            'bestSeller',
            'shopByAge'));
    }
}
