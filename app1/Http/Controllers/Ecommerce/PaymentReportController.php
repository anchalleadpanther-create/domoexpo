<?php
namespace App\Http\Controllers\Ecommerce;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use App\Models\TransactionHistory;
use Mail;
use App\Mail\PaymentReceiptMail;
use Barryvdh\DomPDF\Facade\Pdf;

class PaymentReportController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    
    $histories = TransactionHistory::orderByDesc('id')->paginate(50);
    foreach($histories as $history){
        if(empty($history->invoice_pdf)){
            $this->emailPreviewPdf($history->id);
        } 
    }
    return view('ecommerce.payment-report',compact('histories'));
  }
  
  
  
  // In your HistoryController
  public function emailPreview($id)
    {
        $history = TransactionHistory::with(['getBuyer', 'getSeller'])->findOrFail($id);
        $paymentData = !empty($history->payment_data) 
            ? json_decode($history->payment_data, true) 
            : [];
        
        $emailHtml = view('emails.payment-receipt', [
            'history' => $history,
            'paymentData' => $paymentData,
            'user' => $history->user_type == 'buyer' ? $history->getBuyer : $history->getSeller
        ])->render();
        
        if(empty($history->invoice_pdf))
            $this->emailPreviewPdf($id);
        
        return response()->json(['html' => $emailHtml]);
    }
    
    
    
    public function emailPreviewPdf($id)
    {
        $history = TransactionHistory::with(['getBuyer', 'getSeller'])->findOrFail($id);
    
        $paymentData = !empty($history->payment_data)
            ? json_decode($history->payment_data, true)
            : [];
    
        $user = $history->user_type == 'buyer'? $history->getBuyer : $history->getSeller;
    
        $pdf = Pdf::loadView('emails.payment-receipt', ['history'     => $history,'paymentData' => $paymentData,'user' => $user])->setPaper('A4', 'portrait');
        
        $fileName = 'DOMO' . currentFinancialYear() . '-NV100'. $history->id . '.pdf';
        $pdf->setPaper('A4', 'portrait')->save(public_path('uploads/invoices/' . $fileName));
        $history->invoice_pdf = $fileName;
        $history->save();
        return true;
        
        // return $pdf->stream('payment-receipt.pdf'); // 👈 preview
    }

    public function sendEmail($id)
    {
        $history = TransactionHistory::with(['getBuyer', 'getSeller'])->findOrFail($id);
        $paymentData = !empty($history->payment_data) 
            ? json_decode($history->payment_data, true) 
            : [];
        
        $email = $history->user_type == 'buyer' ? $history->getBuyer->email : $history->getSeller->biz_email;
        
        Mail::to($email)->send(new PaymentReceiptMail($history, $paymentData));
        
        return response()->json(['success' => true, 'message' => 'Email sent successfully']);
    }
  
  
  
  

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Ecommerce\ProductOrder  $productOrder
   * @return \Illuminate\Http\Response
   */
  // public function show(ProductOrder $productOrder)
  public function show(int $id)
  {
    
    $newOrdersCount = Cart::where([['order_status', '=', 1], ['status', '=', 0]])->count();
    $acceptedOrdersCount = Cart::where([['order_status', '=', 1], ['status', '=', 1]])->count();
    $packedOrdersCount = Cart::where([['order_status', '=', 1], ['status', '=', 2]])->count();
    $readyToShipOrdersCount = Cart::where([['order_status', '=', 1], ['status', '=', 3]])->count();
    $shippedOrdersCount = Cart::where([['order_status', '=', 1], ['status', '=', 4]])->count();
    $deliveredOrdersCount = Cart::where([['order_status', '=', 1], ['status', '=', 5]])->count();
    $cancelledOrdersCount = Cart::where([['order_status', '=', 1], ['status', '=', 6]])->count();
    $returnedOrdersCount = Cart::where([['order_status', '=', 1], ['status', '=', 7]])->count();
    $pendingOrdersCount = Cart::where([['order_status', '=', 1], ['status', '=', 8]])->count();
    $order = Cart::orderByDesc('id')->where([['supplier_order_id', $id]])->first();
    $giftTotal = $order->gift_pricing * $order->quantity;

    $states = getStates($order->orderItemDetail->country->id);
    $cities = getCities(@$order->orderItemDetail->state->id);
    return view('ecommerce.orders.show', compact('order','states','cities', 'newOrdersCount', 'acceptedOrdersCount', 'packedOrdersCount', 'readyToShipOrdersCount', 'shippedOrdersCount', 'deliveredOrdersCount', 'cancelledOrdersCount', 'returnedOrdersCount', 'pendingOrdersCount', 'giftTotal'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Ecommerce\ProductOrder  $productOrder
   * @return \Illuminate\Http\Response
   */
  public function edit(ProductOrder $productOrder)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Ecommerce\ProductOrder  $productOrder
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, ProductOrder $productOrder)
  {
    //
  }

  public function changeProductOrderStatus(int $id, int $status)
  {
    ChangeProductOrderStatusViaAdmin::make()->handle($id, $status, Auth::user()->name, 'Admin');
    return back()->with('success', 'Order Status has been updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Ecommerce\ProductOrder  $productOrder
   * @return \Illuminate\Http\Response
   */
  public function destroy(ProductOrder $productOrder)
  {
    //
  }
}
