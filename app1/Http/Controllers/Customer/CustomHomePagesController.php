<?php

namespace App\Http\Controllers\Customer;

use Session;
use Illuminate\View\View;
use App\Models\Buyer\Buyer;

use App\Models\Cms\HomeSlider;
use App\Models\Extensions\Blog;
use App\Models\Ecommerce\Product;
use App\Http\Controllers\Controller;
use App\Models\Cms\HomePageTestimonial;
use App\Models\Extensions\FAQ;

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

  public function eid(): View
  {
    return view('customer.eid');
  }

  public function weddings(): View
  {
    return view('customer.weddings');
  }

  public function faq(): View
  {
    $faqs = FAQ::where('status', '=', 1)->get();
    return view('customer.faq', compact('faqs'));
  }

  public function storeLocator(): View
  {
    return view('customer.store-locator');
  }


  public function returnFavours(): View
  {
    return view('customer.return-favours');
  }


  public function holi(): View
  {
    return view('customer.holi');
  }


  // public function index1(): View
  // {
  //     return view('customer.index1');
  //     return view('coming-soon');
  // }

  public function clearCache()
  {
    \Artisan::call('optimize:clear');
    return "cache clear";
  }


  public function index1()
  {
      
    $mainBanner = HomeSlider::orderBy('sort')
      ->where([['status', '=', 1], ['position', '=', 'Main Banner']])
      ->first();

    $topSliders = HomeSlider::orderBy('sort')
      ->where([['status', '=', 1], ['position', '=', 'Top Sliders']])
      ->limit(8)
      ->get();


    $sliders = HomeSlider::orderBy('sort')
      ->where([['status', '=', 1], ['position', '=', 'Sliders']])
      ->get();

    $shopByGenderOne = HomeSlider::orderBy('sort')
      ->where([['status', '=', 1], ['position', '=', 'Shop by Gender']])
      ->take(1)->first();

    $shopByGenderTwo = HomeSlider::orderBy('sort')
      ->where([['status', '=', 1], ['position', '=', 'Shop by Gender']])
      ->skip(1)->take(1)->first();

    $ourDesigners = HomeSlider::orderBy('sort')
      ->where([['status', '=', 1], ['position', '=', 'Our Designers']])
      ->limit(20)
      ->get();

    $cheseAwayTheGoldBanner = HomeSlider::orderBy('sort')
      ->where([['status', '=', 1], ['position', '=', 'Chase away the gold Banner']])
      ->first();

    $cheseAwayTheGoldSliders =  HomeSlider::orderBy('sort')
      ->where([['status', '=', 1], ['position', '=', 'Chase away the gold sliders']])
      ->limit(20)
      ->get();

    $spotlightOn = HomeSlider::orderBy('sort')
      ->where([['status', '=', 1], ['position', '=', 'Spotlight On']])
      ->limit(20)
      ->get();


    $shopByOccasionBannerOne = HomeSlider::orderBy('sort')
      ->where([['status', '=', 1], ['position', '=', 'Shop by occasion banner one']])
      ->first();

    $shopByOccasionBannerTwo = HomeSlider::orderBy('sort')
      ->where([['status', '=', 1], ['position', '=', 'Shop by occasion banner two']])
      ->first();


    // SHOP BY OCCASION


    $categoryBanners = HomeSlider::orderBy('sort')
      ->where([['status', '=', 1], ['position', '=', 'Popular Categories']])
      ->limit(8)
      ->get();

    $brandsWeLove = HomeSlider::orderBy('sort')
      ->where([['status', '=', 1], ['position', '=', 'Brands We Love']])
      ->limit(8)
      ->get();

    $designerStore = HomeSlider::orderBy('sort')
      ->where([['status', '=', 1], ['position', '=', 'Designer Store']])
      ->limit(3)
      ->get();

    $theValueStore = HomeSlider::orderBy('sort')
      ->where([['status', '=', 1], ['position', '=', 'The Value Store']])
      // ->limit(3)
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

    $bestsellerSliders = HomeSlider::orderBy('sort')
      ->where([['status', '=', 1], ['position', '=', 'Bestseller Sliders']])
      ->limit(8)
      ->get();

    $theValueStoreImages =  HomeSlider::orderBy('sort')
      ->where([['status', '=', 1], ['position', '=', 'The value store images']])
      ->limit(8)
      ->get();

    $mostLovedDesignersImages = HomeSlider::orderBy('sort')
      ->where([['status', '=', 1], ['position', '=', 'Most Loved Designers images']])
      ->limit(4)
      ->get();

    $mostLovedDesignersBannerOne = HomeSlider::orderBy('sort')
      ->where([['status', '=', 1], ['position', '=', 'Most Loved Designers banner one']])
      ->first();

    $mostLovedDesignersBannerTwo = HomeSlider::orderBy('sort')
      ->where([['status', '=', 1], ['position', '=', 'Most Loved Designers banner two']])
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

    $latestBlogs = Blog::orderbyDesc('id')->where('status', '=', 1)->limit(15)->get();

    $currency = getCurrentCurrency();

    $getAllTestimonials = HomePageTestimonial::orderBy('sort')->where('status', '=', 1)->get();

    return view(
      'customer.index-fn',
      // 'customer.index1',
      compact(
        'mainBanner',
        'topSliders',
        'sliders',
        'shopByGenderOne',
        'shopByGenderTwo',
        'ourDesigners',
        'cheseAwayTheGoldBanner',
        'cheseAwayTheGoldSliders',
        'shopByOccasionBannerOne',
        'shopByOccasionBannerTwo',
        'bestsellerSliders',
        'mostLovedDesignersImages',
        'mostLovedDesignersBannerOne',
        'mostLovedDesignersBannerTwo',
        'latestBlogs',
        'getAllTestimonials',
        'theValueStoreImages',
        'categoryBanners',
        'spotlightOn',
        'designerStore',
        'theValueStore',
        'brandsWeLove',
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
