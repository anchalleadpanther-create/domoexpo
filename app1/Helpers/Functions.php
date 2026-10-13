<?php

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Analytic;
use App\Models\NavbarMenu;
use App\Models\Extension\City;
use App\Models\Ecommerce\Brand;
use App\Models\Extension\State;
use App\Models\Ecommerce\Product;
use App\Models\Extension\Country;
use App\Models\Supplier\Supplier;
use App\Models\Ecommerce\Category;
use App\Models\Ecommerce\ServiceCategory;
use App\Models\Extensions\Currency;
use App\Models\Extensions\Dropdown;
use App\Models\Extensions\DropdownValue;
use App\Models\Extensions\PlatformFee;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer\ProductWishlist;
use App\Models\Extensions\FooterCategory;
use App\Repositories\Buyer\CartRepository;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Collection;
use App\Models\Buyer\CustomerViewedProduct;
use Illuminate\Http\Request;
use App\Models\BOQ\BoqQuotation;
use App\Models\Notification;
use App\Services\FirebaseNotificationService;



if(!function_exists('getUnseenNotificationCount')){
    function getUnseenNotificationCount($userId,$userType){
      return   Notification::where('user_id',$userId)->where('user_type',$userType)->where('is_seen',0)->count()  ?? 0;
    }
}

if (!function_exists('SendFirebaseNotification')) {
    function SendFirebaseNotification($device_token, $title = "Domo", $message = "Notification from Domo",$userId = "",$userType = "")
    {
        if (!empty($device_token)) {
            $firebaseNotificationService = new FirebaseNotificationService();
            $firebaseNotificationService->sendMessage($device_token, $title, $message);
        }
       
        if(!empty($userId) && !empty($userType)){
            Notification::create(['user_id' => $userId, 'user_type' => $userType,'title' => $title,'message' => $message]);
        }

        return true;
    }
}

if (!function_exists('getProductBySku')) {
    function getProductBySku($product)
    {
        return    $allSKUproducts = Product::where('sku', $product->sku)->get();
        return compact('allSKUproducts');
    }
}


if (!function_exists('getPlatformFee')) {
    function getPlatformFee($fee_key = null)
    {
        return PlatformFee::where('fee_key', $fee_key)->first()->fee ?? 0;
    }
}


if(!function_exists('getRevisedBOQProjects')){
    function getRevisedBOQProjects($boq = '')  {
        if(empty($boq))
            return collect([]);
            
        return BoqQuotation::where('parent_id',$boq)->get();
    }
}

if (!function_exists('getYoutubeEmbedUrl')) {
    function getYoutubeEmbedUrl($url)
    {
        // Return as-is if already an embed URL
        if (strpos($url, 'youtube.com/embed/') !== false) {
            return $url;
        }

        $parsedUrl = parse_url($url);

        if (isset($parsedUrl['host']) && isset($parsedUrl['query'])) {
            parse_str($parsedUrl['query'], $queryParams);
            if (isset($queryParams['v'])) {
                return 'https://www.youtube.com/embed/' . $queryParams['v'];
            }
        }

        // Support youtu.be links
        if (isset($parsedUrl['host']) && $parsedUrl['host'] === 'youtu.be') {
            return 'https://www.youtube.com/embed/' . ltrim($parsedUrl['path'], '/');
        }

        return null;
    }
}



if (!function_exists('seller_asset')) {
    function seller_asset($path)
    {
        $asset_url = "https://seller.domo.expo.cy";
        return $asset_url . '/' . ltrim($path, '/');
        // return config('app.asset_url') . '/' . ltrim($path, '/');
    }
}


if (!function_exists('recentlyViewedProducts')) {
    function recentlyViewedProducts($product = null)
    {
      $user = auth()->guard('buyer')->user();
       $recentlyViewedProductIds = [];
      if(!empty($user)){
        $recentlyViewedProductIds = CustomerViewedProduct::where('buyer_id', $user->id)->orderByDesc('id')->pluck('product_id');
       }else{
        $recentlyViewedProductIds = CustomerViewedProduct::where('buyer_ip', $request->ip())->orderByDesc('id')->pluck('product_id');
       }
       $query = Product::whereIn('id', $recentlyViewedProductIds);
       if (!empty($product)) {
           $query->where('id', '!=', $product->id);
       }
       return $recentlyViewedProducts = $query->orderByDesc('id')->limit(50)->get();
    }
} 

if (!function_exists('getDropdowns')) {
    function getDropdowns($dropdownName)
    {
        if (Dropdown::where([['displayflag', '=', 1], ['parent', '=', 0], ['dropdown_name', '=', $dropdownName]])->exists()) {
            return Dropdown::where([['displayflag', '=', 1], ['parent', '=', 0], ['dropdown_name', '=', $dropdownName]])->first();
        }
        return (object) ['displayflag' => 0];
    }
}

if (!function_exists('getDropdownValues')) {
    function getDropdownValues($ids = [])
    {
        if(!is_array($ids)){
            $ids  =[];
        }
       return DropdownValue::whereIn('id',$ids)->get() ?? (object) ['displayflag' => 0];
    }
}

if (!function_exists('navbarMenu')) {
    function navbarMenu(string $type)
    {
        return NavbarMenu::where([['type', '=', $type], ['status', '=', 1]])
            ->orderByDesc('sort')
            ->get();
    }
}

if (!function_exists('getCountries')) {
    function getCountries()
    {
        return Country::all();
    }
}

if (!function_exists('getStates')) {
    function getStates($countryId = 0)
    {
        return State::where('country_id', $countryId)
            ->orderBy('name')
            ->get();
    }
}

if (!function_exists('getCities')) {
    function getCities($stateId = 0)
    {
        return City::where('state_id', $stateId)->orderBy('name')->get();
    }
}

if (!function_exists('moneyName')) {
    function moneyName(): string
    {
        return 'MRP';
    }
}

if (!function_exists('wishlistCounter')) {
    function wishlistCounter(): int
    {
        $counter = 0;
        if (Auth::guard('buyer')->check()) {
            // dd(Auth::guard('buyer')->check());
            $counter = ProductWishlist::where('user_id', Auth::guard('buyer')->user()->id)->count();
        }
        return number_format($counter, 0);
    }
}

if (!function_exists('getCartCount')) {
    function getCartCount()
    {
        $CartRepository = new CartRepository();
        return $CartRepository->getCartCount();
    }
}

if (!function_exists('getCartData')) {
    function getCartData()
    {
        $CartRepository = new CartRepository();
        $cartProducts = $CartRepository->getCartData();
        $grandTotal = $CartRepository->getGrandTotal($cartProducts);
        return compact('cartProducts', 'grandTotal');
    }
}

if (!function_exists('supplierId')) {
    function supplierId($id)
    {
        return Supplier::where('buyer_id', '=', $id)->value('id');
    }
}

if (!function_exists('supplierDetails')) {
    function supplierDetails()
    {
        return Supplier::find(supplierId(Auth::guard('buyer')->user()->id));
    }
}

if (!function_exists('defaultProfileImage')) {
    function defaultProfileImage()
    {
        return asset('allUsers/user.png');
    }
}

if (!function_exists('navbarCategories')) {
    function navbarCategories()
    {
        
        return Category::where([['status', '=', 1], ['parent_id', '=', 0]])
            ->with(['children'])
            ->orderBy('sort')
            // ->limit(5)
            ->get();
    }
}

if (!function_exists('footerCategories')) {
    function footerCategories()
    {
        return FooterCategory::where([['status', '=', 1], ['parent_id', '=', 0]])
            ->with(['subCategories'])
            ->orderBy('sort')
            ->get();
    }
}

if (!function_exists('getCurrencies')) {
    function getCurrencies()
    {
        return Currency::where('status', 7)
            ->orderBy('currency')
            ->get();
    }
}

if (!function_exists('getCurrentCurrency')) {
    function getCurrentCurrency($countryId = 0)
    {
        return Currency::find(7);
        if (isset($countryId)) {
            return Currency::where('country_id', '=', $countryId)->first();
        }

        // dd(session('currency'),Currency::find((int) session('currency')));
        return Currency::find((int) session('currency'));
    }
}

if (!function_exists('getIndianShippingCost')) {
    function getIndianShippingCost(): float
    {
        return 100.0;
    }
}

if (!function_exists('getInternationalShippingCost')) {
    function getInternationalShippingCost(): float
    {
        return 2000.0;
    }
}

if (!function_exists('getInternationalShippingCircumstance')) {
    function getInternationalShippingCircumstance(): float
    {
        return 15000.0;
    }
}

if (!function_exists('getCurrentLocation')) {
    function getCurrentLocation(): object
    {
        $location = config('app.env') !== 'local' ? Location::get(request()->ip()) : Location::get('103.10.168.0');

        return (object) [
            'location' => $location,
            'isIndia' => isset($location->countryCode) && $location->countryCode !== 'IN' ? false : true,
        ];
    }
}

if (!function_exists('getCategories')) {
    function getCategories($parentId = 0): Collection
    {
        return Category::where([['status', '=', 1], ['parent_id', '=', $parentId]])
            ->orderBy('category_name')
            ->get();
    }
}

if (!function_exists('getServiceCategories')) {
    function getServiceCategories($parentId = 0): Collection
    {

        return ServiceCategory::where([['status', '=', 1], ['parent_id', '=', $parentId]])
            ->orderBy('category_name')
            ->get();
    }
}


 

if (!function_exists('events')) {
    function events(): Collection
    {
        return Event::orderBy('id')->get();
    }
}

if (!function_exists('poPrefix')) {
    function poPrefix(): string
    {
        $currentYear = now()->format('y');
        $nextYear = now()->addYear()->format('y');
        // return "FEIH/{$currentYear}-{$nextYear}/PO";
        return 'FEIG/23-24/PO';
    }
}

if (!function_exists('invoicePrefix')) {
    function invoicePrefix(): string
    {
        $currentYear = now()->format('y');
        $nextYear = now()
            ->addYear()
            ->format('y');
        // return "FEIH/{$currentYear}-{$nextYear}";
        return 'FEIG/23-24';
    }
}

if (!function_exists('creditNotePrefix')) {
    function creditNotePrefix(): string
    {
        $currentYear = now()->format('y');
        $nextYear = now()
            ->addYear()
            ->format('y');
        return 'FEIG/23-24';
    }
}

if (!function_exists('currentFinancialYear')) {
    function currentFinancialYear(): string
    {
        return '23-24';
    }
}

if (!function_exists('gstNumber')) {
    function gstNumber(): string
    {
        return '06AAOCA6072D1ZQ';
    }
}

if (!function_exists('projectCCEmails')) {
    function projectCCEmails(): array
    {
        return [];
    }
}

if (!function_exists('newlyAddedDesigners')) {
    function newlyAddedDesigners(): Collection
    {
        // return Brand::latest()->limit(15)->get();
        return Brand::whereIn('brand_name', ['Kaprapan', 'Ek Dhaaga', 'Soniya G', 'Studio 22', 'Sue Mue', 'Sparrow', 'Geisha Designs', 'Moh India', 'Not so sure', 'Somya Goyal', 'TAN AND LOOM', 'Ease', 'Ohria Ayurveda', 'NEEMLI NATURALS', 'JAJAABOR'])
            ->orderBy('brand_name')
            ->get();
    }
}

if (!function_exists('newCollectionDesigners')) {
    function newCollectionDesigners(): Collection
    {
        // return Product::has('brand')->latest()->groupBy('brand_id')->limit(15)->get();
        return Brand::whereIn('brand_name', ['Baju', 'JUANITA', 'More Soul', 'Aanchal Sayal', 'Rias Jaipur', 'Gopi Vaid', 'Gaya', 'Masaba', 'Studio Rigu', 'LITTLE BOYS CLOSET', 'Shivani Bhargava', 'Pooja Rajgarhia Gupta', 'Sougat Paul', 'Studio Yavi', 'Suruchi Parakh'])
            ->orderBy('brand_name')
            ->get();
    }
}

if (!function_exists('getAnalyticsStatsCount')) {
    function getAnalyticsStatsCount(string $columnName, string $columnValue, string $countColumn, string $dateFrom = null, string $dateTill = null): int
    {
        $count = Analytic::where($columnName, '=', $columnValue)->distinct($countColumn);

        if (isset($dateFrom)) {
            $count = $count->whereDate('created_at', '>=', $dateFrom)->whereDate('created_at', '<=', $dateTill);
        } else {
            $count = $count->whereDate('created_at', Carbon::today());
        }

        return $count = $count->count();
    }
}

if (!function_exists('defaultStartDateForReport')) {
    function defaultStartDateForReport()
    {
        return [
            'dateInCarbon' => Carbon::parse('2022-09-05'),
            'dateInString' => '2022-09-05',
        ];
    }
}

if (!function_exists('productCollections')) {
    function productCollectionsAccordingToVendor(): Collection
    {
        return Product::where([['seller_id', '=', Auth::guard('vendor')->user()->id], ['collection', '!=', null], ['collection', '!=', '']])
            ->groupBy('collection')
            ->pluck('collection');
    }
}


if (!function_exists('encryptCC')) {
    function encryptCC($plainText, $key)
    {
        $key = hextobin(md5($key));
        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        $openMode = openssl_encrypt($plainText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
        $encryptedText = bin2hex($openMode);
        return $encryptedText;
    }
}

    if (!function_exists('decryptCC')) {
    function decryptCC($encryptedText, $key)
        {
            $key = hextobin(md5($key));
            $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
            $encryptedText = $this->hextobin($encryptedText);
            $decryptedText = openssl_decrypt($encryptedText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
            return $decryptedText;
        }
    }

    // ccavenue functions
    if (!function_exists('pkcs5_padCC')) {
        function pkcs5_padCC($plainText, $blockSize)
        {
            $pad = $blockSize - (strlen($plainText) % $blockSize);
            return $plainText . str_repeat(chr($pad), $pad);
        }
    }

  if (!function_exists('hextobin')) {
        function hextobin($hexString)
        {
            $length = strlen($hexString);
            $binString = "";
            $count = 0;
            while ($count < $length) {
                $subString = substr($hexString, $count, 2);
                $packedString = pack("H*", $subString);
                if ($count == 0) {
                    $binString = $packedString;
                } else {
                    $binString .= $packedString;
                }

                $count += 2;
            }
            return $binString;
        }
  }
  //end of  ccavenue functions
