<?php

namespace App\Http\Controllers;

use App\Services\JccService;
use Illuminate\Http\Request;
use App\Models\TransactionHistory;
use App\Mail\Customer\BuyerSubscriptionPurchaseEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\Ecommerce\Coupon;
use  App\Models\Extensions\PlatformFee;

class JccPaymentController extends Controller
{
    protected $jcc;

    public function __construct(JccService $jcc)
    {
        $this->jcc = $jcc;
    }

    public function checkout()
    {
        return view('jcc.checkout');
    }
    
    
    // public function createOrder(Request $request)
    // { 
    //     // dd($request->all());
    //     $user = auth()->guard('buyer')->user();
    
    //     // 1. Generate Reference
    //     $reference = 'ORD_' . time() . '_' . $user->id;
        
    //     $coupon = Coupon::where('code', '=', $request->code)->first();
    //     // dd($coupon);
    
    //     // 2. Create DB Record (Pending)
    //     TransactionHistory::create([
    //         'reference'      => $reference,
    //         'payment_status' => 'pending',
    //         'coupon_code'    => $request->code ?? '',
    //         'coupon_type'    => $coupon->coupon_type ?? '',
    //         'coupon_value'   => $coupon->coupon_type == 'Discount' ? $coupon->percent :  ($coupon->duration ?? ''),
    //         'coupon_amt'     => $coupon->coupon_type == 'Discount' ? $request->amount * ($coupon->percent/100) :  ($coupon->duration ?? ''),
    //     ]);
       
    
    //     // ✅ FIX 1: comma → semicolon
    //     $amount = $request->amount;
    //     $message = null;
    
    //     if ($coupon) {
    //         if ($coupon->coupon_type == "Add Duration In Subscriptions") {
    //             // ✅ FIX 2: message built but also returned in response
    //             $duration = $coupon->duration ?? 0;
    //         }
    
    //         if ($coupon->coupon_type == "Discount") {
    //             $platformFee = getPlatformFee('Platform Fee');
    //             // ✅ FIX 3: use coupon_value not duration for discount %
    //             $discountAmt = number_format($platformFee * ($coupon->coupon_value / 100), 2);
    //             $amount = $amount - $discountAmt;
    //             if ($amount < 0) $amount = 0;
    //         }
    //     }
    //     $response = $this->jcc->createOrder(
    //         amount: $amount ?? 0.00,
    //         currency: $request->currency ?? '978',
    //         orderNumber: $reference
    //     );
    
    //     if (isset($response['formUrl'])) {
    //         return redirect()->away($response['formUrl']);
    //     }
    
    //     return back()->with('error', $response['message'] ?? 'JCC error');
    // }
    
    
    public function createOrder(Request $request)
    {
        $request->validate([
            'amount'   => 'required|numeric|min:0',
            'currency' => 'nullable|string|max:10',
            'code'     => 'nullable|string|max:100',
        ]);
    
        $user = auth()->guard('buyer')->user();
        
        
    
        if (!$user) {
            return back()->with('error', 'Unauthorized user.');
        }
    
        // Generate unique reference
        $reference = 'ORD_' . time() . '_' . $user->id;
    
        // Default amount
        $amount = (float) $request->amount;
        $paidAmount = $amount;
        
        
       
        // Default coupon details
        $couponDetail = ['coupon_code'  => null,'coupon_type'  => null,'coupon_value' => 0.00,'coupon_amt'   => 0,];
    
        $coupon = null;
    
        // Safe coupon fetch
        if (!empty($request->code)) {
            $coupon = Coupon::where('code', trim($request->code))->where('status', 1)->first();
        }
    
        // Apply coupon logic safely
        if ($coupon) {
    
            $couponDetail['coupon_code'] = $coupon->code;
            $couponDetail['coupon_type'] = $coupon->coupon_type;
            // Discount coupon
            if ($coupon->coupon_type === 'Discount') {
                $percent = (float) ($coupon->percent ?? 0);
                $discountAmt = round(($amount * $percent) / 100, 2);
                $couponDetail['coupon_value'] = $percent;
                $couponDetail['coupon_amt']   = $discountAmt;
                $paidAmount = max(0, $amount - $discountAmt);
            }
    
            // Subscription duration coupon
            if ($coupon->coupon_type === 'Add Duration In Subscriptions') {
                $couponDetail['coupon_value'] = $coupon->duration ?? 0;
                $couponDetail['coupon_amt']   = 0;
            }
        }
        
        $vatData = PlatformFee::where('fee_key','VAT')->first() ?? '';
        $vatType    = $vatData->fee_type ?? 'Flat';
        $vatValue   = $vatData->fee ?? 0;
        $vatAmt     = $vatData->fee ?? 0;
        if(!empty($vatData)){
            if($vatData->fee_type == 'Percentage'){
                $vatAmt =  $paidAmount * ($vatValue/100);
            }
            $paidAmount = $paidAmount + $vatAmt;
        }
    
    
        // Create pending transaction
        $transaction = TransactionHistory::create([
            'user_id'        => $user->id,
            'user_type'      => 'buyer',
            'transaction_for' => 'Membership',
            'reference'      => $reference,
            'amount'         => $amount,
            'vat_type'      => $vatType,
            'vat_value'     => $vatValue,
            'vat_amt'           => $vatAmt,
            'payment_status' => 'Payment Initiate',
        ] + $couponDetail);
    
        // Safety check
        if (!$transaction) {
            return back()->with('error', 'Unable to create transaction.');
        }
        try {
            // Create payment order
            $response = $this->jcc->createOrder(amount: $paidAmount, currency: $request->currency ?? '978',orderNumber: $reference);
    
            // Redirect to payment gateway
            if (!empty($response['formUrl'])) {
                // Optional: save gateway response
                $transaction->update([
                    'gateway_response' => json_encode($response),
                ]);
                return redirect()->away($response['formUrl']);
            }
    
            // Mark transaction failed
            $transaction->update(['payment_status'  => 'failed','gateway_response' => json_encode($response),]);
    
            return back()->with('error',$response['message'] ?? 'JCC gateway error.');
    
        } catch (\Throwable $e) {
    
            // Update transaction as failed
            $transaction->update(['payment_status'  => 'failed','gateway_response' => $e->getMessage(),]);
    
            \Log::error('JCC Create Order Error', [
                'message' => $e->getMessage(),
                'file'    => $e->getFile(),
                'line'    => $e->getLine(),
            ]);
    
            return back()->with('error','Something went wrong while creating payment order.');
        }
    }
    
    
    public function return(Request $request)
    {
        $orderId = $request->orderId;
        $res = $this->jcc->getOrderStatus($orderId);
    
        $transaction = TransactionHistory::where('reference', $res['orderNumber'])->first();
    
        if (!$transaction) {
            return redirect('/buyer/dashboard')->with('error', 'Transaction not found.');
        }
    
        // ✅ FIX 4: fetch coupon from transaction record
        $coupon = null;
        if (!empty($transaction->coupon_code)) {
            $coupon = Coupon::where('code', $transaction->coupon_code)->first();
        }
    
        $user = auth()->guard('buyer')->user();
        $amount = isset($res['amount']) ? $res['amount'] / 100 : 0.00;
    
        $start   = now();
        $endDate = $start->copy()->addYear();
    
        if ($coupon && $coupon->coupon_type == "Add Duration In Subscriptions") {
            $endDate = $endDate->copy()->addMonths($coupon->duration);
        }
    
        // ✅ FIX 5: orderStatus == 2 || == 3 (not duplicate == 2 || == 2)
        if ($res['actionCode'] == 0 && ($res['orderStatus'] == 2 || $res['orderStatus'] == 3) && $res['errorCode'] == 0) {
    
            $user->membership_start_date  = $start;
            $user->membership_expiry_date = $endDate;
            $user->save();
            $transaction->update([
                'user_id'                 => $user->id,
                'order_id'                => $orderId,
                'orderNumber'             => $res['orderNumber'],
                'user_type'               => 'buyer',
                // 'transaction_for'         => 'Membership',
                'membership_start_date'   => $start,
                'membership_expiry_date'  => $endDate,
                // 'amount'                  => $amount,
                'payment_status'          => 'success',
                'response'                => json_encode($res),
            ]);
    
            // ✅ FIX 6: refresh model after update so Mail gets correct data
            $transaction->refresh();
    
            Mail::to($user->email)->send(
                new \App\Mail\Customer\BuyerSubscriptionPurchaseEmail([
                    'user'            => $user,
                    'purchaseHistory' => $transaction,
                ])
            );
    
            return redirect('/buyer/dashboard')->with('success', 'Membership purchased successfully!');
        }
    
        // Failed payment
        $transaction->update([
            'user_id'                => $user->id,
            'user_type'              => 'buyer',
            'transaction_for'        => 'Membership',
            'membership_start_date'  => $start,
            'membership_expiry_date' => $endDate,
            'payment_status'         => 'failed',
            'response'               => json_encode($res),
        ]);
    
        // ✅ FIX 7: removed unreachable return view() + undefined $status
        $message = ($res['displayErrorMessage'] ?? '') . ' Transaction failed! Try again';
        return redirect('/buyer/dashboard')->with('error', $message);
    }

    // public function createOrder(Request $request)
    // { 
    //     $user = auth()->guard('buyer')->user();
    //     // 1. Generate Reference
    //     $reference = 'ORD_' . time() . '_' . $user->id;
        
    //     $coupon = Coupon::where('code', '=', $request->coupon_code)->first();
    
    //     // 2. Create DB Record (Pending)
    //     TransactionHistory::create([
    //         'reference'       => $reference, // Match this with JCC orderNumber
    //         'payment_status'  => 'pending',
    //         'coupon_code'       => $request->coupon_code ?? '',
    //         'coupon_type'       => $coupon->coupon_type ?? '',
    //         'coupon_value'      => $coupon->coupon_value ?? '',
    //     ]);
        
        
    //     $amount = $request->amount,
    //     if($coupon->coupon_type == "Add Duration In Subscriptions"){
    //       $message = "Hurray! You got {$coupon->duration} " . ($coupon->duration == 1 ? 'month' : 'months') . " of additional access.";
    //     }
       
    //     if($coupon->coupon_type == "Discount"){
    //       $platformFee = getPlatformFee('Platform Fee');
    //       $discountAmt = number_format($platformFee * ($coupon->duration / 100), 2) ?? 0.00;
    //       $amount = $amount - $discountAmt;
    //     }
    
    
    //     $response = $this->jcc->createOrder(
    //         amount: $amount ?? 0.00,
    //         currency: $request->currency ?? '978',
    //         orderNumber: $reference // <--- This now matches your function signature
    //     );

    //     if (isset($response['formUrl'])) {
    //         return redirect()->away($response['formUrl']);
    //     }

    //     return back()->with('error', $response['message'] ?? 'JCC error');
    // }

    // public function return(Request $request)
    // {
    //     $orderId = $request->orderId;
    //     $res = $this->jcc->getOrderStatus($orderId);
    //     // dd($res);
    //      $transaction = TransactionHistory::where('reference', $res['orderNumber'])->first();
    //     $start = now();
    //     $endDate = $start->copy()->addYear();
    //     if($coupon->coupon_type == "Add Duration In Subscriptions"){
    //         $endDate = $endDate->copy()->addMonths($coupon->duration);
    //     }
    //     $user = auth()->guard('buyer')->user();
    //     $amount = $res['amount']/100 ?? 0.00;
    //     if($res['actionCode'] == 0 && ($res['orderStatus'] == 2 || $res['orderStatus'] == 2) &&  $res['errorCode'] == 0){
    //         $user->membership_start_date = $start;
    //         $user->membership_expiry_date   = $endDate;
    //         $user->save();
    //         // $purchaseHistory = TransactionHistory::create(['user_id'=>$user->id,'order_id' => $orderId,'orderNumber' => $res['orderNumber'],'user_type' => 'buyer','transaction_for' => 'Membership','membership_start_date'=>$start,'membership_expiry_date' =>$endDate,'amount'=>$amount,'payment_status' => 'success','response' => json_encode($res)]);
            
    //         $purchaseHistory = $transaction->update(['user_id'=>$user->id,'order_id' => $orderId,'orderNumber' => $res['orderNumber'],'user_type' => 'buyer','transaction_for' => 'Membership','membership_start_date'=>$start,'membership_expiry_date' =>$endDate,'amount'=>$amount,'payment_status' => 'success','response' => json_encode($res)]);
        
    //         Mail::to($user->email)->send(new \App\Mail\Customer\BuyerSubscriptionPurchaseEmail(['user' => $user,'purchaseHistory'=>$purchaseHistory]));
            
    //         return redirect('/buyer/dashboard')->with('success','You have purchased successfully!');
    //     }
    //     // TransactionHistory::create(['user_id'=>$user->id,'user_type' => 'buyer','transaction_for' => 'Membership','membership_start_date'=>$start,'membership_expiry_date' =>$endDate,'payment_status' => 'failed','response' => json_encode($res)]);
    //     $transaction->update(['user_id'=>$user->id,'user_type' => 'buyer','transaction_for' => 'Membership','membership_start_date'=>$start,'membership_expiry_date' =>$endDate,'payment_status' => 'failed','response' => json_encode($res)]);
       
       
    //     //   dd($res['displayErrorMessage'] ?? 'Transaction failed! Try again');  
    //       $message = $res['displayErrorMessage'] ?? '' . ' Transaction failed! Try again';
    //     return redirect('/buyer/dashboard')->with('success',$message);
        
    //     return view('jcc.result', compact('status'));
    // }

    public function fail(Request $request)
    {
        return view('jcc.fail');
    }
}
