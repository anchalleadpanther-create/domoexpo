<?php

namespace App\Actions\Marketplace\DetailPage;

use Illuminate\View\View;
use App\Models\Customer\Rating;
use App\Models\Ecommerce\Product;
use App\Models\Ecommerce\Category;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Repositories\Customer\CategoryProductsRepository;
use App\Models\Buyer\CustomerViewedProduct;
use App\Models\Ecommerce\RelatedCategoryMapped;
use Illuminate\Http\Request;
use App\Models\AskForSample;

class ProductDetail
{
  use AsAction;

  public function __construct(private CategoryProductsRepository $CategoryProductsRepository)
  {
  }

  public function handle(Request $request,string $categorySlug, string $productSlug, string $productSku, string $uuid): View
  {
    try {
       $user = auth()->guard('buyer')->user();
     
       $category = Category::where('category_slug', $categorySlug)->firstOrFail();
     $product = $this->CategoryProductsRepository->productDetail($uuid);


    // return   $category->id;
      $productTypeValues = ($product->have_options) ? $this->CategoryProductsRepository->getProductTypeValues($product) : null;
      $images = Product::find($product->id)->images;
      // $relatedProducts = $this->CategoryProductsRepository->relatedProducts($product);
       $relatedProducts = Product::limit(10)->get();

        //  $relatedProducts = $this->CategoryProductsRepository->notRelatedBrandProducts($product);
       $relatedBrandsProducts = $this->CategoryProductsRepository->relatedBrandProducts($product);
      $stockCount = Product::where([['sku', '=', $product->sku], ['status', '=', 1]])->sum('stock');
      $this->CategoryProductsRepository->increaseViewCount($product->uuid);
      $haveIRated = (Auth::guard('buyer')->check()) ? Rating::where([

        ['product_id', '=', $product->id], ['type', '=', 'product'], ['user_id', '=', Auth::guard('buyer')->user()->id],

      ])->exists() : false;

      $recentlyViewedProductIds = [];
      $customerAlsoViewedProductIds =[];
      if(!empty($user)){
      $update = CustomerViewedProduct::where('buyer_ip', $request->ip())->whereNull('buyer_id')->update(['buyer_id' => $user->id]);
        $exists = CustomerViewedProduct::where('product_id', $product->id)->where('buyer_id', $user->id)->exists();
        if(!$exists) {
          $customerViewedProduct = new CustomerViewedProduct();
          $customerViewedProduct->product_id = $product->id;
          $customerViewedProduct->buyer_id = $user->id;
          $customerViewedProduct->buyer_ip = $request->ip();
          $customerViewedProduct->save();
        }
        $recentlyViewedProductIds = CustomerViewedProduct::where('buyer_id', $user->id)->orderByDesc('id')->pluck('product_id');
        $customerAlsoViewedProductIds = CustomerViewedProduct::where('buyer_id', "!=",$user->id)->pluck('product_id');
       }else{
        $exists = CustomerViewedProduct::where('product_id', $product->id)->where('buyer_ip', $request->ip())->exists();
        if(!$exists) {
          $customerViewedProduct = new CustomerViewedProduct();
          $customerViewedProduct->product_id = $product->id;
          $customerViewedProduct->buyer_ip = $request->ip();
          $customerViewedProduct->save();
        }
        $recentlyViewedProductIds = CustomerViewedProduct::where('buyer_ip', $request->ip())->orderByDesc('id')->pluck('product_id');
        $customerAlsoViewedProductIds = CustomerViewedProduct::where('buyer_ip',"!=" ,$request->ip())->orderByDesc('id')->pluck('product_id');

       }
       $recentlyViewedProducts =  Product::whereIn('id', $recentlyViewedProductIds)->where('id','!=',$product->id)->orderByDesc('id')->limit(20)->get();
       $customerAlsoViewedProducts =  Product::whereIn('id', $customerAlsoViewedProductIds)->where('id','!=',$product->id)->orderByDesc('id')->limit(30)->get();


        $relatedCategoryIds = RelatedCategoryMapped::where('category_a', $category->id)->pluck('category_b');

       
       $completeTheLookProducts = $this->CategoryProductsRepository->completeTheLookProducts($relatedCategoryIds);

      $productIds = Product::where('sku', '=', $product->sku)->pluck('id')->toArray();
      
        $isAskForSample = false;
    
        if($user){
            // dd(AskForSample::where(['product_id' => $this->product->id,'buyer_id'=>$user->id])->first());
          $isAskForSample =   !empty(AskForSample::where(['product_id' => $product->id,'buyer_id'=>$user->id])->first()) ? true : false;
            
            // AskForSample::where(['product_id' => $this->product->id,'buyer_id'=>$user->id])->exists()
        }

      $productRatings = Rating::where([
        ['type', '=', 'product'],
        ['status', '=', 1]
      ])
        ->whereIn('product_id', $productIds)
        ->get();
      $calculatedRatings = $this->calculateRatings($productRatings);
      return view('marketplace.detail-page.product-detail', compact('product','category','isAskForSample','completeTheLookProducts','recentlyViewedProducts', "customerAlsoViewedProducts",'productTypeValues', 'images', 'relatedProducts', 'relatedBrandsProducts', 'stockCount', 'haveIRated', 'productRatings', 'calculatedRatings'));
    } catch (ModelNotFoundException $th) {

      abort(404);
    } catch (\Throwable $th) {
      dd($th->getMessage().' '.$th->getLine());
    }
  }

  private function calculateRatings($productRatings): array
  {
    $star1Count = $star2Count = $star3Count = $star4Count = $star5Count = 0;

    // Loop through each rating and count the occurrences of each star rating
    foreach ($productRatings as $rating) {
      switch ($rating->star) {
        case 1:
          $star1Count++;
          break;
        case 2:
          $star2Count++;
          break;
        case 3:
          $star3Count++;
          break;
        case 4:
          $star4Count++;
          break;
        case 5:
          $star5Count++;
          break;
      }
    }

    // Calculate the percentage for each star rating
    $totalRatings = count($productRatings);
    $percentage1Star = $totalRatings === 0 ? 0 : number_format(($star1Count / $totalRatings) * 100, 2, '.', '.');
    $percentage2Star =  $totalRatings === 0 ? 0 : number_format(($star2Count / $totalRatings) * 100, 2, '.', '.');
    $percentage3Star =  $totalRatings === 0 ? 0 : number_format(($star3Count / $totalRatings) * 100, 2, '.', '.');
    $percentage4Star =  $totalRatings === 0 ? 0 : number_format(($star4Count / $totalRatings) * 100, 2, '.', '.');
    $percentage5Star =  $totalRatings === 0 ? 0 : number_format(($star5Count / $totalRatings) * 100, 2, '.', '.');

    return compact('percentage1Star', 'percentage2Star', 'percentage3Star', 'percentage4Star', 'percentage5Star');
  }
}
