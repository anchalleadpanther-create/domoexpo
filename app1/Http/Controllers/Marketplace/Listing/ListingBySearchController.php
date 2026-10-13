<?php

namespace App\Http\Controllers\Marketplace\Listing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Ecommerce\Product;
use Illuminate\Http\JsonResponse;
use App\Models\Ecommerce\Category;
use App\Models\Ecommerce\ServiceCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use App\Actions\Customer\ProductFilter;
use App\View\Components\Purchasync\Listing\ProCard;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Repositories\Customer\CategoryProductsRepository;
use App\Models\Supplier\SellerService;
Use App\Models\Supplier\Supplier;

class ListingBySearchController extends Controller
{

public function lisitings(Request $request) {
    try {
        $search  = $request->search ?? '';
            $products = $this->products($request,$search);
            $services = $this->supplierServices($search);
            // $suppliers = $this->suppliers($search);


            // Get supplier IDs from products and services
            $productSupplierIds = $products->pluck('seller_id')->toArray();
            $serviceSupplierIds = $services->pluck('seller_id')->toArray();

            // Merge both arrays and get unique supplier IDs
            $supplierIds = array_unique(array_merge($productSupplierIds, $serviceSupplierIds));

            // Fetch suppliers based on the unique IDs
            $suppliers = $this->suppliersByIds($request,$supplierIds);
            $filters = $this->getFilters($products);

            $pageType = $request->pagetype; // Fetch pageType from request
            if ($request->wantsJson()) {
                if ($pageType == 'product') {
                    return response()->json([
                        'html' => view('marketplace.listing.card.product-listing', compact('products', 'suppliers', 'services'))->render(),
                        'pageType' => 'product'
                    ]);
                }

                if ($pageType == 'service') {
                    return response()->json([
                        'html' => view('marketplace.listing.card.supplier-service-listing', compact('products', 'suppliers', 'services'))->render(),
                        'pageType' => 'service'
                    ]);
                }

                if ($pageType == 'supplier') {
                    return response()->json([
                        'html' => view('marketplace.listing.card.supplier-listing', compact('products', 'suppliers', 'services'))->render(),
                        'pageType' => 'supplier'
                    ]);
                }
            }

            return view('marketplace.listing.lisitng-by-search-box', compact('products', 'suppliers', 'services','filters'));
        } catch (ModelNotFoundException $th) {
            abort(404);
        } catch (\Throwable $th) {
            dd("Message ".$th->getMessage().' Line No: '.$th->getLine(),$th);
        }
    }


    public function products(Request $request, string $search = '')
    {
        try {

            // Start building the product query
            $productsQuery = Product::where('status', 1);

             $productsQuery     =    $productsQuery->where('front_end_search_keyword', 'LIKE', "%{$search}%");
            
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

            // Handle color filtering if 'colors' parameter is present and non-empty
            if ($request->filled('colors')) {
                $colors = explode(',', $request->query('colors')); // Split the colors by comma
                $productsQuery->whereHas('productTypeValueOne', function ($query) use ($colors) {
                    $query->whereIn('type_value', $colors);
                });
            }

            // Print the SQL query and bindings using dd()
            $sql = $productsQuery->toSql();
            $bindings = $productsQuery->getBindings();

            // Dump the SQL query and its bindings
            // dd(['sql' => $sql, 'bindings' => $bindings]);

            // Fetch products with necessary relationships and paginate
            $products = $productsQuery->with(['mappedCategories', 'images'])->paginate(10);
            
            return $products; // Return paginated products as JSON response
            // return response()->json($products); // Return paginated products as JSON response

        } catch (ModelNotFoundException $e) {
            abort(404, 'Category not found.');
        } catch (\Throwable $e) {
            logger()->error($e);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    // public function products(string $search)
    // {
    //     try {
    //         // Retrieve products where status is 1 and search matches category name or product name
    //         $products = Product::where('status', 1)
    //             ->whereHas('mappedCategories', function ($q) use ($search) {
    //                 $q->where('category_name', 'LIKE', "%{$search}%"); // Use 'LIKE' for flexible search
    //             })
    //             ->orWhere('name', 'LIKE', "%{$search}%"); // Search product name as well
            
    //         return $products = $products->with(['mappedCategories', 'images']) // Eager load relations
    //             ->paginate(1); // Paginate results

    //     } catch (ModelNotFoundException $th) {
    //         abort(404); // Return a 404 error if no matching model is found
    //     } catch (\Throwable $th) {
    //         dd($th); // Dump any other throwable errors for debugging
    //     }
    // }

 
    public function supplierServices(string $search)
    {
        try {
            $data = SellerService::where('status', 1)->whereHas('mappedServiceCategories',function($q) use ($search){
                $q->where('category_name', 'LIKE', "%{$search}%"); // Use 'LIKE' for flexible search
            })->orWhere('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%"); // Search  name as well

            return $supplierServices =   $data->with(['mappedServiceCategories', 'images'])->paginate(10);
        } catch (ModelNotFoundException $th) {
            abort(404);
        } catch (\Throwable $th) {
            dd($th);
        }
    }



    public function suppliersByIds($request,array $supplierIds)
    {
        try {
            // $filterCertificate = '402';
            $supplier = Supplier::query()->where('status',1);
            $supplier = $supplier->whereIn('id', $supplierIds);

            // Handle brand filtering if 'brands' parameter is present and non-empty
            if ($request->filled('filter_by_quality_certificates')) {
                $supplier = $supplier->whereJsonContains('quality_certificates', $request->query('filter_by_quality_certificates'));
            }

            if ($request->filled('filter_by_sustainability_certificates')) {
                $supplier = $supplier->whereJsonContains('sustainability_certificates', $request->query('filter_by_sustainability_certificates'));
            }

            if ($request->filled('filter_by_other_certificates')) {
                $supplier = $supplier->whereJsonContains('other_certificates', $request->query('filter_by_other_certificates'));
            }
                
            return $supplier = $supplier->with(['mappedProductCategories'])->paginate(10);
        } catch (ModelNotFoundException $e) {
            abort(404, 'Suppliers not found.');
        } catch (\Throwable $e) {
            logger()->error($e);
            abort(500, 'An unexpected error occurred.');
        }
    }

    // public function suppliersByIds(array $supplierIds)
    // {
    //     try {
    //         $suppliers = Supplier::whereIn('id', $supplierIds)
    //             // ->where('status', 1)
    //             ->with(['mappedProductCategories']) // Load relationships
    //             ->paginate(10);

    //         return $suppliers;

    //     } catch (ModelNotFoundException $th) {
    //         abort(404);
    //     } catch (\Throwable $th) {
    //         dd($th);
    //     }
    // }



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


    // public function suppliers(string $search)
    // {
    //     try {
    //      $data = Supplier::where('status', 1)->whereHas('mappedProductCategories',function($q) use ($search){
    //             $q->where('category_name', 'LIKE', "%{$search}%"); // Use 'LIKE' for flexible search
    //         }); // Search product name as well

    //         return $suppliers =   $data->with(['mappedProductCategories', 'images'])->paginate(1);

    //     } catch (ModelNotFoundException $th) {
    //         abort(404);
    //     } catch (\Throwable $th) {
    //         dd($th);
    //     }
    // }
}
