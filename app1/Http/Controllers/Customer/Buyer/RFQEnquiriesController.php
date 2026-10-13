<?php

namespace App\Http\Controllers\Customer\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer\RequestForQuotation;
use App\Models\RFQEnquiry;
use Yajra\DataTables\DataTables;

class RFQEnquiriesController extends Controller
{
    // public function index(Request $request){
    //     $user  = auth()->guard('buyer')->user();
    //     $rfqEnquiries = RFQEnquiry::where('receiver_type',$user->account_type)->where('receiver_id',$user->id)->orderByDesc('id')->get();
    //     return view('customer.buyer.rfq-enquiries',compact('rfqEnquiries'));
    // }
    
    
    
    public function index(Request $request)
    {
         $user  = auth()->guard('buyer')->user();
        if ($request->ajax()) {
            $query = RFQEnquiry::orderByDesc('id')
                ->where('receiver_type',$user->account_type)->where('receiver_id',$user->id);
    
            return DataTables::of($query)
                // ->addIndexColumn() // for S No.
                ->addColumn('id', function ($row) {
                    return 'EN00-'.$row->id;
                })
                
                ->addColumn('user_detail', function ($row) {
                    $fullName = $row->first_name . ' ' . $row->last_name;
                    $createdAt =  $row->created_at->format('d M Y');
                    return "<strong>Name:</strong> $fullName<br><strong>Created At:</strong> $createdAt";
                })
                
                ->addColumn('contect_info', function ($row) {
                    return "<strong>Email:</strong> $row->email<br><strong>Phone:</strong> $row->phone";
                })
                ->addColumn('message', function ($row) {
                    return $row->message;
                    // return $row->message;
                })
                ->rawColumns([ 'user_detail','contect_info']) // render HTML
                ->make(true);
        }
    
        return view('customer.buyer.rfq-enquiries');
    }
    
}
