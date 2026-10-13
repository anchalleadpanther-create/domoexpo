<?php

namespace App\Http\Controllers\Customer\Designer;

use Carbon\Carbon;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\Ecommerce\Brand;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Builder;
use App\Actions\Customer\ProductFilterByBrand;
use App\View\Components\Customer\Products\ProductCard;
use App\Repositories\Customer\CategoryProductsRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DesignerController extends Controller
{
    use ApiResponser;

    public function __construct(private CategoryProductsRepository $CategoryProductsRepository)
    {
    }

    public function designers(string $letter = NULL): View|JsonResponse
    {
        return view('customer.designers.designers');
    }

    public function filterDesignersViaCategorySearchAndPreference(): View|JsonResponse
    {
        $brands = Brand::where('status', '=', 1);

        if (isset(request()->nationality)) {
            $brands = $brands->where('nationality_type', '=', request()->nationality);
        }

        if (!getCurrentLocation()->isIndia) {
            $brands = $brands->where('is_allowed_country', '=', false);
        }

        if (isset(request()->letter)) {
            $letter = request()->letter;
            $brands = $brands->where('brand_name', 'like', "{$letter}%");
        }

        if (isset(request()->category) && request()->category !== 'all') {
            $brands = $brands->whereJsonContains('categories', request()->category);
        }

        if (isset(request()->search)) {
            $search = request()->search;
            $brands = $brands->where('brand_name', 'like', "{$search}%");
        }

        $brands = $brands->get();
        $auth = Auth::guard('buyer')->user();

        return $this->successResponse(compact('brands', 'auth'));
    }

    public function products(string $brandSlug): View|JsonResponse
    {
        try {
            $brand = Brand::where('brand_slug', $brandSlug)->firstOrFail();
            $response = $this->CategoryProductsRepository->getBrandProducts($brand->id);
            $products = $response['products'];
            $productsCount = $response['productsCount'];

            if (request()->wantsJson()) {
                $productsTemplate = [];
                foreach ($products as $product)
                    $productsTemplate[] = Blade::renderComponent(new ProductCard($product, true, true));

                $nextPageUrl = $products?->nextPageUrl() ?? '';
                $hasPages = isset($nextPageUrl) ? true : false;

                return $this->successResponse(compact('productsTemplate', 'hasPages', 'nextPageUrl', 'productsCount'), 'Products fetched successfully');
            }
            return view('customer.product.designer-products', compact('products', 'brand', 'productsCount'));
        } catch (ModelNotFoundException) {
            abort(404);
        } catch (\Throwable $th) {
        }
    }

    public function productsFilteredAjax(Request $request): JsonResponse
    {
        try {
            $brand = Brand::where('brand_slug', $request->brandSlug)->firstOrFail();
            $response = ProductFilterByBrand::run($brand->id, $request);
            $products = $response['products'];
            $productsCount = $response['productsCount'];

            $productsCountSql = $response['productsCountSql'];
            $productsCountBindings = $response['productsCountBindings'];
            $productsSql = $response['productsSql'];
            $productsBindings = $response['productsBindings'];


            $path = asset('uploads/products') . '/';
            $loggedIn = Auth::guard('buyer')->check();

            $productsTemplate = [];
            foreach ($products as $product)
                $productsTemplate[] = Blade::renderComponent(new ProductCard($product, true, true));

            $nextPageUrl = $products?->nextPageUrl() ?? '';
            $hasPages = isset($nextPageUrl) ? true : false;

            return $this->successResponse(compact('brand', 'path', 'loggedIn', 'productsTemplate', 'nextPageUrl', 'hasPages', 'productsCount', 'productsCountSql', 'productsCountBindings', 'productsSql', 'productsBindings'), 'Products fetched successfully');
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage(), 500);
        }
    }

    public function productsFiltered(Request $request): View
    {
        try {
            $brand = Brand::where('brand_slug', $request->brandSlug)->firstOrFail();
            $response = ProductFilterByBrand::run($brand->id, $request);
            $products = $response['products'];
            $productsCount = $response['productsCount'];
            $path = asset('uploads/products') . '/';
            $loggedIn = Auth::guard('buyer')->check();

            return view('customer.product.designer-products', compact('products', 'brand', 'productsCount'));
        } catch (\Throwable $th) {
            return back()->withErrors($th->getMessage());
        }
    }
}
