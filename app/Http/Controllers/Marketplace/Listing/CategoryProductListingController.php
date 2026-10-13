<?php
namespace App\Http\Controllers\Marketplace\Listing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Ecommerce\Product;
use App\Models\Ecommerce\Category;
use App\Models\Supplier\SellerService;
use App\Models\Supplier\Supplier;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryProductListingController extends Controller
{
    /**
     * Main function to handle product, service, and supplier listing.
     */
    public function lisitings(Request $request, string $categorySlug  = "")
    {
        try {
            $compareProducts = Product::whereIn('id', session('compareProducts', []))->get();
            $compareSuppliers = Product::whereIn('id', session('compareSuppliers', []))->get();
            $category = Category::where('category_slug', $categorySlug)->firstOrFail();
            $products = $this->products($request, $categorySlug);
            $services = $this->supplierServices($request,$categorySlug);
            
             $suppliers = $this->suppliers($request,$categorySlug);
            
            // dd($suppliers);
            // dd($suppliers->pluck('quality_certificates')->toArray());
            // Retrieve filters based on products
            $productsFilters = $this->productsFilters($request, $categorySlug);
            $filters = $this->getFilters($productsFilters);
            // dd($filters);
            
            // Combine supplier IDs from products and services to get unique suppliers
            // $productSupplierIds = $products->pluck('seller_id')->unique()->toArray();
            // $serviceSupplierIds = [];//$services->pluck('seller_id')->unique()->toArray();
            // $supplierIds = array_unique(array_merge($productSupplierIds, $serviceSupplierIds));
            // $suppliers = $this->suppliersByIds($request,$supplierIds);
            
            // Handle AJAX requests for paginated data
            if ($request->wantsJson()) {
                // dd($suppliers);
                // dd($request->all(), $products, $suppliers, $services, $category);
                return $this->handleAjaxRequest($request, $products, $suppliers, $services, $category);
            }

// dd($filters);
            return view('marketplace.listing.product-category-listing', compact('products', 'suppliers', 'services', 'category', 'filters','compareProducts','compareSuppliers'));
        } catch (ModelNotFoundException $e) {
            abort(404, 'Category not found.');
        } catch (\Throwable $e) {
            dd($e->getMessage(),$e->getLine());
            return response()->json(['error' => logger()->error($e)], 500);
            // Log the error for debugging

            logger()->error($e);
            abort(500, 'An unexpected error occurred.');
        }
    }

    /**
     * Handle AJAX requests for paginated data.
     */
    protected function handleAjaxRequest(Request $request, $products, $suppliers, $services, $category)
    {
        $pageType = $request->pagetype;
        $html = '';

        switch ($pageType) {
            case 'product':
                $html = view('marketplace.listing.card.product-listing', compact('products', 'suppliers', 'services', 'category'))->render();
                break;
            case 'service':
                $html = view('marketplace.listing.card.supplier-service-listing', compact('products', 'suppliers', 'services', 'category'))->render();
                break;
            case 'supplier':
                $html = view('marketplace.listing.card.supplier-listing', compact('products', 'suppliers', 'services', 'category'))->render();
                break;
        }

        return response()->json(['html' => $html, 'pageType' => $pageType]);
    }

    /**
     * Retrieve products based on the category slug.
     */
    public function products(Request $request, string $categorySlug)
    {
        try {
            return $products = Product::where('status', 1)->orderByDesc('id')->with(['mappedCategories', 'images'])->paginate(50);
            // Retrieve the category based on the slug
            $category = Category::where('category_slug', $categorySlug)->firstOrFail();
            $categoryId = $category->id;

            // Start building the product query
            $productsQuery = Product::where('status', 1)
                ->whereHas('mappedCategories', function ($query) use ($categoryId) {
                    $query->where('category_id', $categoryId);
                });

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
                $productsQuery = $productsQuery->whereJsonContains('health_hygiene_certificates', $request->query('filter_by_health_hygiene_certificates'));
            }
            
            if ($request->filled('filter_by_environmental_certificates')) {
                $productsQuery = $productsQuery->whereJsonContains('environmental_certificates', $request->query('filter_by_environmental_certificates'));
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
    
    /**
     * Retrieve all suppliers for a given category slug.
     */
    public function suppliers(Request $request, string $categorySlug)
    {
        try {
            // Retrieve the category based on the slug
            $category = Category::where('category_slug', $categorySlug)->firstOrFail();
            $categoryId = $category->id;
    
            // Start building the supplier query
            $supplierQuery = Supplier::query();
    
            // Filter suppliers based on status and category mapping
            $supplierQuery->where('status', 1)
                ->whereHas('mappedCategories', function ($query) use ($categoryId) {
                    $query->where('category_id', $categoryId);
                });
    
            // Filter by quality certificates
            if ($request->filled('filter_by_quality_certificates')) {
                $supplierQuery->whereJsonContains('quality_certificates', $request->query('filter_by_quality_certificates'));
            }
    
            // Filter by sustainability certificates
            if ($request->filled('filter_by_sustainability_certificates')) {
                $supplierQuery->whereJsonContains('sustainability_certificates', $request->query('filter_by_sustainability_certificates'));
            }
    
            // Filter by other certificates
            if ($request->filled('filter_by_other_certificates')) {
                $supplierQuery->whereJsonContains('other_certificates', $request->query('filter_by_other_certificates'));
            }
    
            // Filter by seller office country
            if ($request->filled('filter_by_seller_office_country')) {
                // Get the comma-separated values as an array
                $officeCountries = explode(',', $request->query('filter_by_seller_office_country'));
    
                // Check if the array is not empty and apply the filter
                if (!empty($officeCountries)) {
                    $supplierQuery->whereHas('officeCountry', function ($query) use ($officeCountries) {
                        $query->whereIn('name', $officeCountries);
                    });
                }
            }
            
            // Filter by supplier_described_seller
            if ($request->filled('suppllier_described_seller')) {
                $describedSeller= explode(',', $request->query('suppllier_described_seller'));
                if (!empty($describedSellerIds)) {
                    $supplierQuery->whereHas('suppllierDescribedSeller', function ($query) use ($describedSeller) {
                        $query->whereIn('dropdown_value', $describedSeller);
                    });
                }
            }
    
            // Paginate the results
            $suppliers = $supplierQuery->paginate(10);
           return   $suppliers ;
        } catch (ModelNotFoundException $e) {
            // Handle case where category is not found
            return response()->json(['error' => 'Category not found.'], 404);
        } catch (\Throwable $e) {
            // Log unexpected errors and return a generic response
            logger()->error('Error fetching suppliers: ' . $e->getMessage(), ['line' => $e->getLine()]);
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }


  

    /**
     * Retrieve supplier services based on the category slug.
     */
    public function supplierServices(Request $request ,string $categorySlug)
    {
        try {
            
            return SellerService::where('status', 1)
                ->with(['mappedServiceCategories', 'images'])
                ->paginate(10);
        } catch (ModelNotFoundException $e) {
            abort(404, 'Services not found.');
        } catch (\Throwable $e) {
            logger()->error($e);
           dd($e-getMessage()) ;
            // abort(500, 'An unexpected error occurred.');
        }
    }

    /**
     * Retrieve suppliers by their IDs.
     */
    public function suppliersByIds(Request $request,array $supplierIds)
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

    

    /**
     * Get filters from the products data.
     */
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
    
    
    

    public function productsFilters(Request $request, string $categorySlug)
    {
      try {
            // Retrieve the category based on the slug
            $category = Category::where('category_slug', $categorySlug)->firstOrFail();
            $categoryId = $category->id;

            // Start building the product query
            $productsQuery = Product::where('status', 1)
                ->whereHas('mappedCategories', function ($query) use ($categoryId) {
                    $query->where('category_id', $categoryId);
                });
                
            $products = $productsQuery->get();
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
