<?php

namespace App\Http\Controllers\Customer;

use Illuminate\View\View;
use App\Models\Buyer\Buyer;
use App\Http\Controllers\Controller;

use App\Models\Cms\HomeSlider;
use App\Models\Extensions\Blog;
use App\Models\Ecommerce\Product;


class RakhiController extends Controller
{
public function rakhi()
// : View
    {


        
       $mainBanner = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Rakhi Main banner']])
            ->first();

        $mainSlider = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Rakhi Main Slider']])
            ->get();
        
        $mainThirdSectionFirstBanner = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Rakhi Third Section First Banner']])
            ->first();
        
        $mainThirdSectionSecondBanner = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Rakhi Third Section Second Banner']])
            ->first();

        $fastiveAdOnsSlider = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Rakhi FESTIVE AD-ONS Section Slider']])
            ->get();

        $giftingFirstBanner = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Rakhi Gifting First Banner']])
            ->first();

        $giftingSecondBanner = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Rakhi Gifting Second Banner']])
            ->first();

        $giftingFirstSlider = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Rakhi Gifting First Slider']])
            ->get();


        $brandOnFocusSlider = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Rakhi BRAND ON FOCUS Slider']])
            ->get();

            




            // Rakhi Mian banner
                                                // Rakhi Main Slider
                                                // Rakhi Third Section First Banner
                                                // Rakhi Third Section Second Banner
                                                // Rakhi FESTIVE AD-ONS Section Slider
                                                // Rakhi Gifting First Banner
                                                // Rakhi Gifting Second Banner
                                                // Rakhi Gifting First Slider
                                                // Rakhi BRAND ON FOCUS Slider

        $sliders = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Wedding Main Sliders']])
            ->get();

        $subSliders = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Wedding Main Sub Sliders']])
            ->get();

        $weddingDesignerSliders = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Wedding Designer Sliders']])
            ->get();
        
        $weddingDesignerBannersLeft = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Wedding Designer Banners Left']])
            ->first();
        $weddingDesignerBannersRight = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Wedding Designer Banners Right']])
            ->get();
        
        $weddingGirl = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Wedding Girl']])
            ->get();
        
        $weddingBoy = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Wedding Boy']])
            ->get();

        $weddingOccasions = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Wedding Occasions']])
            ->get();

        $weddingAccessoryEdit = HomeSlider::orderBy('sort')
            ->where([['status', '=', 1], ['position', '=', 'Wedding Accessory Edit']])
            ->get();
        
            
    

    // -------------------------------------------------


        $currency = getCurrentCurrency();

        return view(
            'customer.rakhi',
            compact(
                'mainBanner',
                'mainSlider',
                'mainThirdSectionFirstBanner',
                'mainThirdSectionSecondBanner',
                'fastiveAdOnsSlider',
                'giftingFirstBanner',
                'giftingSecondBanner',
                'giftingFirstSlider',
                'brandOnFocusSlider',
                
            ),
        );
    }

}

