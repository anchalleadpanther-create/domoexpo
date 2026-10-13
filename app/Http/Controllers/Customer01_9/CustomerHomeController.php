<?php

namespace App\Http\Controllers\Customer;

use App\Models\Cms\HomeSlider;
use App\Models\Extensions\Blog;
use App\Models\Ecommerce\Product;
use App\Http\Controllers\Controller;

class CustomerHomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function __invoke()
    {
        $mainBanner = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Main Banner']])
            ->first();

        $sliders = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Sliders']])
            ->get();

        $categoryBanners = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Popular Categories']])
            ->limit(8)
            ->get();

        $latestFromTfeBannerOne = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'The latest from TFE'], ['sort', '=', 1]])
            ->first();
        $latestFromTfeBannerTwo = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'The latest from TFE'], ['sort', '=', 2]])
            ->first();
        $latestFromTfeBannerThree = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'The latest from TFE'], ['sort', '=', 3]])
            ->first();
        $latestFromTfeBannerFour = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'The latest from TFE'], ['sort', '=', 4]])
            ->first();

        $designerHighlightBannerOne = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Designer Highlight'], ['sort', '=', 1]])
            ->first();
        $designerHighlightBannerTwo = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Designer Highlight'], ['sort', '=', 2]])
            ->first();
        $designerHighlightBannerThree = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Designer Highlight'], ['sort', '=', 3]])
            ->first();
        $designerHighlightBannerFour = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Designer Highlight'], ['sort', '=', 4]])
            ->first();

        $jewellerySliders = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Perfect Time to Shop']]) //In Our Jewellery Cabinet
            ->get();

        $celebritySliders = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Celebrity Spotlight']])
            ->get();

        $products = Product::orderByDesc('id')
            ->where([['status', '=', 1]])
            ->groupBy('type_value_id_1')
            ->limit(8)
            ->get();

        $blogs = Blog::orderByDesc('id')
            ->where([['status', '=', 1]])
            ->limit(8)
            ->get();

        $currency = getCurrentCurrency();

        return view(
            'customer.index',
            compact(
                'mainBanner',
                'sliders',
                'categoryBanners',
                'latestFromTfeBannerOne',
                'latestFromTfeBannerTwo',
                'latestFromTfeBannerThree',
                'latestFromTfeBannerFour',
                'designerHighlightBannerOne',
                'designerHighlightBannerTwo',
                'designerHighlightBannerThree',
                'designerHighlightBannerFour',
                'jewellerySliders',
                'celebritySliders',
                // 'broadBanner',
                // 'twoBannerImages',
                'products',
                'blogs',
                'currency',
            ),
        );
    }
}
