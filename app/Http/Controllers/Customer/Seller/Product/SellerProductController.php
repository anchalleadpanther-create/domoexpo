<?php

namespace App\Http\Controllers\Customer\Seller\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ecommerce\Brand;
use App\Models\Extensions\Dropdown;
use App\Models\Ecommerce\Product;
use App\Repositories\Ecommerce\ProductRepository;
use App\Http\Requests\Ecommerce\ProductRequest;
use Yajra\DataTables\DataTables;
use App\Models\Ecommerce\ProductType;
use Illuminate\Support\Facades\Auth;



class SellerProductController extends Controller
{
    public function __construct(private ProductRepository $ProductRepository)
    { 
        
    }
    
    public function index(Request $request){
        
        // return  $user = Auth::guard('vendor')->user();
        if ($request->ajax()) {
            // Start building the query
            $query = Product::query()->where('seller_id',auth()->guard('vendor')->user()->id);
            // Apply custom filters
            if ($request->has('search_filter') && !empty($request->get('search_filter'))) {
                $query->where('name', 'like', "%{$request->get('search_filter')}%");
            }

            // Optional email filter (uncomment if needed)
            if ($request->has('sku_filter') && !empty($request->get('sku_filter'))) {
                $query->where('sku', 'like', "%{$request->get('sku_filter')}%");
            }

            // Using DataTables to process the query
            return DataTables::of($query)
                ->addColumn('image', function ($product) {
                return '<img src="' . (!$product->images->isEmpty() 
                    ? asset('uploads/products/' . $product->images[0]->image) 
                    : asset('allUsers/icon-thumb.png')) . '" class="rounded-circle" style="width:60px" />';
                    // return '<img src="' . asset('allUsers/frontend/img/image-icon1.png') . '" class="rounded-circle" style="width:60px" />';
                })
               ->addColumn('date_of_upload', function ($product) {
                    return $product->created_at->format('Y-m-d');
                })
                ->addColumn('category', function ($product) {
                    return implode(', ',$product->mappedCategories->pluck('category_name')->toArray()) ;
                })
                ->addColumn('status', function ($product) {
                    return $product->status == 1 ? 'Active' : 'Inactive';
                })
                ->addColumn('action', function ($product) {
                    return '
                    <a href="'.route('seller.edit-seller-product',[$product->id]).'" class="fs-25"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <!-- <a href="'.route('seller.edit-seller-product',[$product->id]).'" class="ml-2 fs-25"><i class="fa fa-trash-o" aria-hidden="true"></i></a> -->
                    ';
                })
                ->rawColumns(['image', 'action']) // Specify which columns should not be escaped (e.g., HTML content)
                ->make(true);
        }

        return view('customer.seller.product.index');
    }

    public function create(Request $request){
        $brands = Brand::where('status', '=', 1)->orderBy('brand_name')->get();
        $colors = ProductType::orderby('type')->whereIn('type', ['Color'])->first()->mappedProductTypeValues;
        $sizes = ProductType::orderby('type')->whereIn('type', ['Size'])->first()->mappedProductTypeValues;
        $materials = ProductType::orderby('type')->whereIn('type', ['Material'])->first()->mappedProductTypeValues;
        return view('customer.seller.product.create',compact('brands','colors','sizes','materials'));
    }

    public function store(ProductRequest $request)
    {
        $this->ProductRepository->store($request);
        return redirect(route('seller.seller-products'))->with('success', 'Product has been successfully added.');
    }

   

    public function edit(Request $request,string $id){
        $product = Product::find($id);  
        $productData = $this->ProductRepository->getProductDetails($product);
        $brands = Brand::where('status', '=', 1)->orderBy('brand_name')->get();

        $colors = ProductType::orderby('type')->whereIn('type', ['Color'])->first()->mappedProductTypeValues;
        $sizes = ProductType::orderby('type')->whereIn('type', ['Size'])->first()->mappedProductTypeValues;
        $materials = ProductType::orderby('type')->whereIn('type', ['Material'])->first()->mappedProductTypeValues;

        $product->mappedCategories;
       return view('customer.seller.product.edit',compact('brands','product','productData','colors','sizes','materials'));
    }

    public function update(ProductRequest $request, string $id)
    {
        $product = Product::find($id);  
        $this->ProductRepository->update($request, $product);
        return redirect(route('seller.seller-products'))->with('success', 'Product has been successfully updated.');
    }
    
}
