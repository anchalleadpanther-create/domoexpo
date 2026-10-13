<?php

namespace App\Actions\Marketplace\DetailPage;


use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Supplier\Supplier;
use App\Models\Ecommerce\Product;


class SupplierDetail
{
    use AsAction;

    public function handle(Request $request)
    {
        try {
            // dd(5);
            
         $supplier_id = $request->supplier_id;
         $supplier = Supplier::where('id',$supplier_id)->firstOrFail();
        //  $products = Product::where('status', 1)->where('seller_id',$supplier_id)->paginate(10);//$this->products($request);
         $products = $this->products($request);
         
         $allProductsCounts = count($products);
        //  dd($products);
        // $user = auth()->guard('buyer')->user();
        // //  $category = ServiceCategory::where('category_slug', $categorySlug)->firstOrFail();
        // $service = $this->CategoryServicesRepository->ServiceDetail($serviceSlug);
        // $images = SellerService::find($service->id)->images;
        // $relatedServices = SellerService::get();
        $prodcutsForFilter = $this->productsFilters($request);
        $filters = $this->getFilters($prodcutsForFilter);
    
        
        // Handle AJAX requests for paginated data
        if ($request->wantsJson()) {
            // dd($products);
            // dd($request->all(), $products, $suppliers, $services, $category);
            return $this->handleAjaxRequest($request, $products,$allProductsCounts);
        }
        
        return view('marketplace.detail-page.supplier-detail', compact('supplier','products','filters'));

        } catch (\ModelNotFoundException $th) {

            abort(404);
        } catch (\Throwable $th) {
            dd($th->getMessage().' '.$th->getLine());
        }
    }
    
    protected function handleAjaxRequest(Request $request, $products,$allProductsCounts)
    {
        $pageType = $request->pagetype;
        $html = '';
        $html = view('marketplace.listing.card.product-listing', compact('products','allProductsCounts'))->render();
        // switch ($pageType) {
        //     case 'product':
        //         $html = view('purchasync.listing.card.product-listing', compact('products', 'suppliers'))->render();
        //         break;
        //     case 'service':
        //         $html = view('purchasync.listing.card.supplier-service-listing', compact('products', 'suppliers', 'services', 'category'))->render();
        //         break;
        //     case 'supplier':
        //         $html = view('purchasync.listing.card.supplier-listing', compact('products', 'suppliers', 'services', 'category'))->render();
        //         break;
        // }
        
        return response()->json(['html' => $html, 'pageType' => $pageType]);
    }
    
    
    public function products(Request $request)
    {
        try {
            $supplier_id = $request->supplier_id;
            // Start building the product query
            $productsQuery = Product::where('status', 1)->where('seller_id',$supplier_id);
            
            // Fetch products with necessary relationships and paginate
            $products = $productsQuery->with(['mappedCategories', 'images'])->paginate(50);
            // dd($products);
            return $products; 
            
            

            // Handle price filtering if 'filter_by_price' parameter is present and is an array
            if ($request->has('filter_by_price') && !empty($request->filter_by_price)) {
                $priceRanges = $request->filter_by_price; // Assuming this is the format you receive

                // Initialize min and max prices
                $minPrice = null;
                $maxPrice = null;
                $priceRangesArr = explode(',',$request->filter_by_price);
                // dd();
                $firstelement = explode('_',reset($priceRangesArr)) ;
                $rangeFrom= reset($firstelement);

                $lastelement = explode('_',end($priceRangesArr)) ;
                $rangeTO= end($lastelement);
                // dd($rangeFrom,$rangeTO);


                // Add where conditions based on min and max price found
                if (!is_null($rangeFrom) && !empty($rangeTO)) {
                    $productsQuery->whereBetween('price_unit', [$rangeFrom, $rangeTO]);
                } elseif (!is_null($rangeFrom)) {
                    $productsQuery->where('price_unit', '>=', $rangeFrom);
                }
            }

            // Handle brand filtering if 'brands' parameter is present and non-empty
            if ($request->filled('brands')) {
                $brandSlugs = explode(',', $request->query('brands')); // Split the brands by comma
                $productsQuery->whereHas('brand', function ($query) use ($brandSlugs) {
                    $query->whereIn('brand_slug', $brandSlugs);
                });
            }
            
            // Handle brand filtering if 'Country of origin' parameter is present and non-empty
            if ($request->filled('filter_by_country_of_origin')) {
                $countryOfOrigin = explode(',', $request->query('filter_by_country_of_origin')); // Split the brands by comma
                $productsQuery->whereHas('countryOfOrigin', function ($query) use ($countryOfOrigin) {
                    $query->whereIn('name', $countryOfOrigin);
                });
            }

            // Handle color filtering if 'colors' parameter is present and non-empty
            if ($request->filled('colors')) {
                $colors = explode(',', $request->query('colors')); // Split the colors by comma
                $productsQuery->whereHas('productTypeValueOne', function ($query) use ($colors) {
                    $query->whereIn('type_value', $colors);
                });
            }
            
            if ($request->filled('filter_by_quality_safety_certificates')) {
                $productsQuery = $productsQuery->whereJsonContains('quality_safety_certificate', $request->query('filter_by_quality_safety_certificates'));
            }
            
            if ($request->filled('filter_by_health_hygiene_certificates')) {
                $productsQuery = $productsQuery->whereJsonContains('health_hygiene_certificate', $request->query('filter_by_health_hygiene_certificates'));
            }
            
            if ($request->filled('filter_by_environmental_certificates')) {
                $productsQuery = $productsQuery->whereJsonContains('environmental_certificate', $request->query('filter_by_environmental_certificates'));
            }
            
            
            // Print the SQL query and bindings using dd()
            $sql = $productsQuery->toSql();
            $bindings = $productsQuery->getBindings();

            // Dump the SQL query and its bindings
            // dd(['sql' => $sql, 'bindings' => $bindings]);

            // Fetch products with necessary relationships and paginate
            $products = $productsQuery->with(['mappedCategories', 'images'])->paginate(10);
            // dd($products);
            return $products; // Return paginated products as JSON response
            // return response()->json($products); // Return paginated products as JSON response

        } catch (ModelNotFoundException $e) {
            abort(404, 'Category not found.');
        } catch (\Throwable $e) {
            logger()->error($e);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function getFilters($products)
    {
        $brands = [];
        $colors = [];

        // Check if the products variable is a collection
        if ($products instanceof \Illuminate\Pagination\LengthAwarePaginator) {
            $products = $products->getCollection(); // Get the underlying collection
        }
        
        $quality_safety_certificates_arr = [];
        $health_hygiene_certificates_arr = [];
        $environmental_certificates_arr = [];
        $sellerOfficeCountry = [] ;
        
        $suppllierDescribedSeller = [];
        
        $quality_certificates_ids = [];
        $sustainability_certificates_ids = [];
        $other_certificates_ids = [];
        $brands = [];
        $colors = [];
        $countryOfOrigin = [];
        
        foreach ($products as $product) {
            // Product Certificates for filter
            
            if (!empty($product->quality_safety_certificate)) {
                $quality_safety_certificates_arr[] = json_decode($product->quality_safety_certificate, true);
            }
            
            if (!empty($product->health_hygiene_certificate)) {
                $health_hygiene_certificates_arr[] = json_decode($product->health_hygiene_certificate, true);
            }
            
            if (!empty($product->environmental_certificate)) {
                $environmental_certificates_arr[] = json_decode($product->environmental_certificate, true);
            }
            
            
            // Supplier Certificates for filter
            if (!empty($product->seller) && !empty($product->seller->quality_certificates)) {
                $quality_certificates_ids[] = json_decode($product->seller->quality_certificates, true);
            }
            if (!empty($product->seller) && !empty($product->seller->sustainability_certificates)) {
                $sustainability_certificates_ids[] = json_decode($product->seller->sustainability_certificates, true);
            }
            if (!empty($product->seller) && !empty($product->seller->other_certificates)) {
                $other_certificates_ids[] = json_decode($product->seller->other_certificates, true);
            }
            
            if (!empty($product->seller) && !empty($product->seller->biz_office_country)) {
                $sellerOfficeCountry[] = $product->seller->officeCountry;
            }
            
            if (!empty($product->seller) && !empty($product->seller->suppllierDescribedSeller)) {
                $suppllierDescribedSeller = $product->seller->suppllierDescribedSeller ?? [];
            }
            
            if (!empty($product->brand)) {
                $brands[] = $product->brand;
            }

            if (!empty($product->productTypeValueOne)) {
                $colors[] = $product->productTypeValueOne;
            }
            
            if (!empty($product->productTypeValueOne)) {
                $countryOfOrigin[] = $product->countryOfOrigin;
            }
            
            
        }
        
        // Flatten and remove duplicates in one step for products certificates
        $quality_safety_certificates = array_unique(array_merge(...$quality_safety_certificates_arr)) ;
        $health_hygiene_certificates = array_unique(array_merge(...$health_hygiene_certificates_arr));
        $environmental_certificates = array_unique(array_merge(...$environmental_certificates_arr));

        // Flatten and remove duplicates in one step for supplier certificates
        $flat_quality_certificates_ids = array_unique(array_merge(...$quality_certificates_ids));
        $flat_sustainability_certificates_ids = array_unique(array_merge(...$sustainability_certificates_ids));
        $flat_other_certificates_ids = array_unique(array_merge(...$other_certificates_ids));
        
        
        
        $productFilters = [
            'brands' => array_unique($brands),
            'colors' => array_unique($colors),
            'country_of_origin' => array_filter(array_unique($countryOfOrigin)),
            'quality_safety_certificates' =>  $quality_safety_certificates,
            'health_hygiene_certificates' => $health_hygiene_certificates,
            'environmental_certificates' => $environmental_certificates,
        ];
        
        $sellerFilters = [
            'quality_certificates' =>  getDropdownValues($flat_quality_certificates_ids),
            'sustainability_certificates' => getDropdownValues($flat_sustainability_certificates_ids),
            'other_certificates' => getDropdownValues($flat_other_certificates_ids),
            'seller_office_country' => array_filter(array_unique($sellerOfficeCountry)),
            'suppllier_described_seller' => $suppllierDescribedSeller,
        ];
        
        
        $data['product_filters'] = $productFilters;
        $data['seller_filters'] = $sellerFilters;
        // dd($data);
        return $data;
    }
    
    public function productsFilters(Request $request)
    {
      try {
            
            $supplier_id = $request->supplier_id;
            // Start building the product query
            $products = Product::where('status', 1)->where('seller_id',$supplier_id);
                
            $products = $products->get();
                return $products; // Return paginated products as JSON response
            // return response()->json($products); // Return paginated products as JSON response
          } catch (ModelNotFoundException $e) {
              abort(404, 'Category not found.');
          } catch (\Throwable $e) {
              logger()->error($e);
              return response()->json(['error' => $e->getMessage()], 500);
          }
      }
}
