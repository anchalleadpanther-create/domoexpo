<?php

namespace App\Http\Controllers\Customer\Buyer;

use Illuminate\View\View;
use App\Models\Buyer\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Ecommerce\ProductEnquiry;
use Yajra\DataTables\DataTables;

class ProductEnquiryController extends Controller
{
  

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
 

public function index(Request $request)
{
    
    if ($request->ajax()) {
        $query = ProductEnquiry::with('product.images') // eager load product and its images
            ->orderByDesc('id')
            ->where('buyer_id', auth()->guard('buyer')->user()->id);

        return DataTables::of($query)
            // ->addIndexColumn() // for S No.
            ->addColumn('id', function ($row) {
                return 'PE00-'.$row->id;
            })
            ->addColumn('image', function ($row) {
                $image = $row->product && !$row->product->images->isEmpty()
                    ? asset('uploads/products/' . $row->product->images[0]->image)
                    : asset('allUsers/icon-thumb.png');

                return '<img src="' . $image . '" class="rounded" style="width:70px" />';
            })
            ->addColumn('product_detail', function ($row) {
                $name = $row->product->name ?? 'N/A';
                $qty = $row->quantity ?? 'N/A';
                $price = $row->product->price_unit ?? 'N/A';
                
                return "<strong>Name:</strong> $name<br><strong>Quantity:</strong> $qty <br><strong>Unit Price:</strong> $ $price";
            })
            ->addColumn('user_detail', function ($row) {
                $fullName = $row->first_name . ' ' . $row->last_name;
                $createdAt =  $row->created_at->format('d M Y');
                return "<strong>Name:</strong> $fullName<br><strong>Email:</strong> $row->email<br><strong>Phone:</strong> $row->phone<br><strong>Created At:</strong> $createdAt";
            })
            ->addColumn('message', function ($row) {
                return $row->message;
            })
            ->addColumn('status', function ($row) {
                return $row->status == 1 ? 'Active' : 'Inactive';
            })
            ->rawColumns(['image', 'product_detail', 'user_detail']) // render HTML
            ->make(true);
    }

    return view('customer.buyer.product-enquiry');
}


}
