<?php

namespace App\Http\Controllers\Customer\Seller\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ecommerce\Brand;
use App\Models\Extensions\Dropdown;
use App\Models\Ecommerce\Product;
use App\Repositories\Ecommerce\SellerServiceRepository;
use App\Http\Requests\Ecommerce\ProductRequest;
use Yajra\DataTables\DataTables;
use App\Models\Ecommerce\ProductType;
use App\Models\Supplier\SellerService;
use Str;



class SellerServiceController extends Controller
{
    public function __construct(private SellerServiceRepository $SellerServiceRepository)
  { 
  }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // Start building the query
            $query = SellerService::where('seller_id', auth()->guard('vendor')->user()->id);

            // Apply search filter if provided
            if ($request->filled('search_filter')) {
                $query->where('title', 'like', '%' . $request->get('search_filter') . '%');
                $query->where('description', 'like', '%' . $request->get('search_filter') . '%');
            }

            // Using DataTables to process the query
            return DataTables::of($query)
                ->addColumn('title', fn($data) => $data->title)
                ->addColumn('description', fn($data) => Str::limit($data->description,140,'...'))
                ->addColumn('includes', fn($data) => Str::limit($data->includes,50,'...'))
                ->addColumn('excludes', fn($data) => Str::limit($data->excludes,50,'...'))
                ->addColumn('status', fn($data) => $data->status ? 'Active' : 'Inactive')
                ->addColumn('action', function ($data) {
                    return '
                        <a href="'.route('seller.edit-seller-service', [$data->id]).'"  class="fs-20"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a href="'.route('seller.services.change-service-status', [$data->id, $data->status == 1 ? 0 : 1]).'" class="fs-20"><i class="fa fa-check-circle-o" aria-hidden="true"></i></a>
                       ';
                })
                ->rawColumns(['action']) // Specify which columns should not be escaped (e.g., HTML content)
                ->make(true);
        }

        return view('customer.seller.service.index');
    }



    public function create(Request $request){
        $brands = Brand::where('status', '=', 1)->orderBy('brand_name')->get();
        $colors = ProductType::orderby('type')->whereIn('type', ['Color'])->first()->mappedProductTypeValues;
        $sizes = ProductType::orderby('type')->whereIn('type', ['Size'])->first()->mappedProductTypeValues;
        $materials = ProductType::orderby('type')->whereIn('type', ['Material'])->first()->mappedProductTypeValues;
        return view('customer.seller.service.create',compact('brands','colors','sizes','materials'));
    }

    public function store(Request $request)
    {
        $this->SellerServiceRepository->store($request);
        return  redirect(route('seller.seller-services'));
        // return redirect()->back()->with('success', 'Service has been successfully added.');
    }

   

    public function edit(Request $request,string $id){
         $service = SellerService::find($id);  
        $productData = $this->SellerServiceRepository->getServiceDetails($service);
        $service->mappedServiceCategories;

         $mappedServiceLabels =  $service->mappedServiceLabels;
       return view('customer.seller.service.edit',compact('service','productData','mappedServiceLabels'));
    }

    public function update(Request $request, string $id)
    {
        $service = SellerService::find($id);  
        $this->SellerServiceRepository->update($request, $service);
        return  redirect(route('seller.seller-services'));
    }

    public function toggleStatus(int $id, int $status)
    {
        $this->SellerServiceRepository->toggleStatus($id, $status);
        // return back()->with('success', 'Service status has been changed.');
        return back();
    }
    
}
