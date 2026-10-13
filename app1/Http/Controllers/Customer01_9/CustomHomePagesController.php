<?php

namespace App\Http\Controllers\Customer;

use Illuminate\View\View;
use App\Models\Buyer\Buyer;
use App\Http\Controllers\Controller;

use App\Models\Cms\HomeSlider;
use App\Models\Extensions\Blog;
use App\Models\Ecommerce\Product;

class CustomHomePagesController extends Controller
{
    public function men(): View
    {
        return view('customer.men');
    }

    public function women(): View
    {
        return view('customer.women');
    }

    public function kids(): View
    {
        return view('customer.kids');
    }

    public function weddings(): View
    {
        return view('customer.weddings');
    }

    public function faq(): View
    {
        return view('customer.faq');
    }

    // public function index1(): View
    // {
    //     return view('customer.index1');
    //     return view('coming-soon');
    // }

    public function index1(): View
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

        $designerStore = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Designer Store']])
            ->limit(3)
            ->get();

        $boutiquesBanners = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Boutiques']])
            ->limit(8)
            ->get();

        $bestseller = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Bestseller']])
            ->limit(6)
            ->get();
        
        $bestsellerBanner = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Bestseller Banner']])
            ->first();


        $moreToExploreSlider = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'More to Explore Slider']])
            ->limit(8)
            ->get();
        $moreToExploreBanner = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'More to Explore Banner']])
            ->first();

        $giftCard = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Gift Card']])
            ->first();

        $moreOfferOnBrands = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'More Offer on Brands']])
            ->limit(8)
            ->get();

        $exclusivelyYoursFirstSlider = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Exclusively Yours First Slider']])
            ->limit(6)
            ->get();
        $exclusivelyYoursFirstBanner = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Exclusively Yours First Banner']])
            ->first();
        $exclusivelyYoursSecondSlider = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Exclusively Yours Second Slider']])
            ->limit(5)
            ->get();
        $exclusivelyYoursSecondBanner = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Exclusively Yours Second Banner']])
            ->first();
        $characterStoreSlider = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Character Store Slider']])
            ->limit(4)
            ->get();
        $characterStoreBanner = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Character Store Banner']])
            ->limit(2)
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

        $perfectTimeToShop = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Perfect Time to Shop']])
            ->get(); //In Our Jewellery Cabinet

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
            'customer.index1',
            compact(
                'mainBanner',
                'sliders',
                'categoryBanners',
                'designerStore',
                'boutiquesBanners',
                'moreToExploreBanner',
                'moreToExploreSlider',
                'giftCard',
                'bestseller',
                'bestsellerBanner',
                'moreOfferOnBrands',
                'latestFromTfeBannerOne',
                'latestFromTfeBannerTwo',
                'latestFromTfeBannerThree',
                'latestFromTfeBannerFour',
                'designerHighlightBannerOne',
                'designerHighlightBannerTwo',
                'designerHighlightBannerThree',
                'designerHighlightBannerFour',
                'perfectTimeToShop',
                'celebritySliders',
                // 'broadBanner',
                // 'twoBannerImages',
                'products',
                'blogs',
                'currency',
                'exclusivelyYoursFirstSlider',
                'exclusivelyYoursFirstBanner',
                'exclusivelyYoursSecondSlider',
                'exclusivelyYoursSecondBanner',
                'characterStoreSlider',
                'characterStoreBanner',
            ),
        );
    }
}
