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

class ServiceCategoryListingController extends Controller
{
    public function lisitings(Request $request, string $categorySlug) {
    try {
        // return 'sdf';
      // return Supplier::find(399);
          $category = ServiceCategory::where('category_slug', $categorySlug)->firstOrFail();
        $products = $this->products($categorySlug);
        $services = $this->supplierServices($categorySlug);
        $suppliers = $this->suppliers($categorySlug);
        


        // Get supplier IDs from products and services
        $productSupplierIds = $products->pluck('seller_id')->toArray();
        $serviceSupplierIds = $services->pluck('seller_id')->toArray();

        // Merge both arrays and get unique supplier IDs
        $supplierIds = array_unique(array_merge($productSupplierIds, $serviceSupplierIds));

        // Fetch suppliers based on the unique IDs
        $suppliers = $this->suppliersByIds($supplierIds);

        $filters = $this->getFilters($suppliers);

         $pageType = $request->pagetype; // Fetch pageType from request

        if ($request->wantsJson()) {
            if ($pageType == 'product') {
                return response()->json([
                    'html' => view('marketplace.listing.card.product-listing', compact('products', 'suppliers', 'services', 'category'))->render(),
                    'pageType' => 'product'
                ]);
            }

            if ($pageType == 'service') {
                return response()->json([
                    'html' => view('marketplace.listing.card.supplier-service-listing', compact('products', 'suppliers', 'services', 'category'))->render(),
                    'pageType' => 'service'
                ]);
            }

            if ($pageType == 'supplier') {
                return response()->json([
                    'html' => view('marketplace.listing.card.supplier-listing', compact('products', 'suppliers', 'services', 'category'))->render(),
                    'pageType' => 'supplier'
                ]);
            }
        }

        return view('marketplace.listing.service-category-listing', compact('products', 'suppliers', 'services','filters', 'category'));
    } catch (ModelNotFoundException $th) {
        abort(404);
    } catch (\Throwable $th) {
        dd("Message ".$th->getMessage().' Line No: '.$th->getLine(),$th);
    }
}




  public function products(string $categorySlug)
    // : View|JsonResponse
  {
    try {
      $category = Category::where('category_slug', $categorySlug)->first();
       $categoryId = $category->id ??  '';

      $products = Product::where('status', 1)
      ->whereHas('mappedCategories', function ($q) use ($categoryId) {
          $q->where('category_id', $categoryId);
      });

    // $products = $products->join('cpr_product_mapped_categories', 'cpr_products.id', '=', 'cpr_product_mapped_categories.product_id')
    //             ->where('cpr_product_mapped_categories.category_id', $categoryId)
    //             ->orderBy('cpr_product_mapped_categories.sort', 'desc');


    //  $products = $products->groupBy(['cpr_products.sku', 'cpr_products.type_value_id_1'])
    //             ->select('cpr_products.*')
    return  $products =       $products->with(['mappedCategories', 'images'])
                ->paginate(1);

                // dd($products[1]->images);


    } catch (ModelNotFoundException $th) {
      abort(404);
    } catch (\Throwable $th) {
      dd($th);
    }
  }


  public function supplierServices(string $categorySlug)
    // : View|JsonResponse
  {
    try {
      $category = ServiceCategory::where('category_slug', $categorySlug)->first();
      $categoryId = $category->id ?? '';
      $data = SellerService::where('status', 1);
      $data = $data->whereHas('mappedServiceCategories', function ($q) use ($categoryId) {
                  $q->where('category_id', $categoryId);
              });
      return $supplierServices =    $data->with(['mappedServiceCategories', 'images'])
                ->paginate(1);


    } catch (ModelNotFoundException $th) {
      abort(404);
    } catch (\Throwable $th) {
      dd($th);
    }
  }


  public function suppliersByIds(array $supplierIds)
    {
        try {
            $suppliers = Supplier::whereIn('id', $supplierIds)
                // ->where('status', 1)
                ->where('status',1)->where('membership_expiry_date','>=',now())
                ->with(['mappedProductCategories']) // Load relationships
                ->paginate(1);

            return $suppliers;

        } catch (ModelNotFoundException $th) {
            abort(404);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

  public function suppliers(string $categorySlug)
    // : View|JsonResponse
  {
    try {
      $category = Category::where('category_slug', $categorySlug)->first();
      $categoryId = $category->id ?? '';
      $suppliers = Supplier::where('status', 1)->where('status',1)->where('membership_expiry_date','>=',now());
      return $suppliers = $suppliers->paginate(10);

    } catch (ModelNotFoundException $th) {
      abort(404);
    } catch (\Throwable $th) {
      dd($th);
    }
  }






    public function getFilters($suppliers)
    {
        $quality_certificates_ids = [];
        $sustainability_certificates_ids = [];
        $other_certificates_ids = [];
        $sellerOfficeCountry = [];
        $suppllierDescribedSeller = [];
      

        foreach ($suppliers as $supplier) {
            if (!empty($supplier) && !empty($supplier->quality_certificates)) {
                $quality_certificates_ids[] = json_decode($supplier->quality_certificates, true);
            }
            if (!empty($supplier) && !empty($supplier->sustainability_certificates)) {
                $sustainability_certificates_ids[] = json_decode($supplier->sustainability_certificates, true);
            }
            if (!empty($supplier) && !empty($supplier->other_certificates)) {
                $other_certificates_ids[] = json_decode($supplier->other_certificates, true);
            }

            if (!empty($supplier) && !empty($supplier->biz_office_country)) {
                $sellerOfficeCountry[] = $supplier->officeCountry;
            }
            
            if (!empty($supplier) && !empty($supplier->suppllierDescribedSeller)) {
                $suppllierDescribedSeller = $supplier->suppllierDescribedSeller ?? [];
            }
        }

        // Flatten and remove duplicates in one step
        $flat_quality_certificates_ids = array_unique(array_merge(...$quality_certificates_ids));
        $flat_sustainability_certificates_ids = array_unique(array_merge(...$sustainability_certificates_ids));
        $flat_other_certificates_ids = array_unique(array_merge(...$other_certificates_ids));

        $quality_certificates = getDropdownValues($flat_quality_certificates_ids);
        $sustainability_certificates = getDropdownValues($flat_sustainability_certificates_ids);
        $other_certificates = getDropdownValues($flat_other_certificates_ids);

        $sellerFilters = [
            'quality_certificates' =>  getDropdownValues($flat_quality_certificates_ids),
            'sustainability_certificates' => getDropdownValues($flat_sustainability_certificates_ids),
            'other_certificates' => getDropdownValues($flat_other_certificates_ids),
            'seller_office_country' => array_filter(array_unique($sellerOfficeCountry)),
            'suppllier_described_seller' => $suppllierDescribedSeller,
        ];
        
        $data['seller_filters'] = $sellerFilters;
// dd($data);
        return $data;
    }






}
