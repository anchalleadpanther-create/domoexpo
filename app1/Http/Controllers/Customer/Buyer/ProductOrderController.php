<?php

namespace App\Http\Controllers\Customer\Buyer;

use App\Traits\Wallet;
use Illuminate\View\View;
use App\Models\Buyer\Cart;
use App\Models\Buyer\Buyer;
use App\Models\Buyer\Order;
use App\Models\Buyer\OldOrder;
use App\Models\Buyer\OldOrderSeller;
use Illuminate\Http\Request;
use App\Traits\PaymentGateway;
use App\Http\Controllers\Controller;
use App\Traits\WhatsappNotification;
use Illuminate\Support\Facades\Auth;
use App\Models\Supplier\SupplierOrder;
use App\Repositories\Buyer\CartRepository;
use App\Repositories\Buyer\OrderRepository;
use App\Actions\Customer\OrderEmailNotification;
use App\Actions\Customer\OrderWhatsappNotification;
use App\Actions\ProductOrder\ChangeProductOrderStatus;
use App\Actions\Customer\AddReferralBonusAmountToWalletOfReferrer;
use App\Actions\ProductOrder\DivideAndAllocateWalletAndGiftCardAmount;

class ProductOrderController extends Controller
{
  use PaymentGateway, WhatsappNotification;

  public function __construct(private OrderRepository $orderRepository, private  CartRepository $cartRepository)
  {
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(string $type, int $status): View
  {
    $orders = Cart::orderByDesc('id')
      ->where([['buyer_id', Auth::guard('buyer')->user()->id], ['order_status', '=', 1], ['status', '=', $status]])
      ->get();
    return view('customer.buyers.product-orders', compact('orders'));
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
    try {
      $request->validate(['address' => 'required|exists:App\Models\Customer\Address,id']);

      if ($request->payment_method === 'PayPal') {
        $response = $this->orderRepository->newOrderViaPaypal($request);
        return $this->paypal($response['order']);
      } elseif ($request->payment_method === 'RazorPay' || $request->payment_method === 'Cash on Delivery') {

        $order = $this->orderRepository->newOrder($request);
        return redirect()->route('buyer.order-successful', $order->id)->with('sweet-alert', 'Order Successfully Placed');
      } elseif ($request->payment_method === 'CcAvenue') {
        $response = $this->orderRepository->newOrderViaCCAvenue($request);
        return $this->ccAvenuePayment($response['order']);
      }
    } catch (\Throwable $th) {
      dd($th);
    }
  }




  // cc avenue payment getway
  public function ccAvenuePayment(Order $order)
  {


    $WORKING_KEY = '297B68F2FBADF1BF04A313DDF2115D1D';
    $CCAVENUE_ACCESS_CODE = 'AVNX82FL59CM15XNMC';

    // $WORKING_KEY = 'A2F6560628A8AA1E8B0622D3D75FB51B';
    // $CCAVENUE_ACCESS_CODE = 'AVZH86GG34AH87HZHA';

    	
    // dd($order);
    $input = [];

    $input['amount'] = $order->grand_total;
    // $input['amount'] = 1;
    $input['order_id'] = $order->id;
    $input['currency'] = "INR";
    $input['redirect_url'] = route('buyer.ccResponse');
    $input['cancel_url'] = route('buyer.ccResponse');
    // $input['redirect_url'] = $WORKING_KEY;
    // $input['cancel_url'] = $CCAVENUE_ACCESS_CODE;
    $input['language'] = "EN";
    $input['merchant_id'] = "203405";
  
    $merchant_data = "";

    $working_key = '297B68F2FBADF1BF04A313DDF2115D1D'; //Shared by CCAVENUES
    $access_code = 'AVNX82FL59CM15XNMC'; //Shared by CCAVENUES

    // $working_key = env('WORKING_KEY'); //Shared by CCAVENUES
    // $access_code = 'AVNX82FL59CM15XNMC'; //Shared by CCAVENUES

    $input['merchant_param1'] = "some-custom-inputs"; // optional parameter
    $input['merchant_param2'] = "some-custom-inputs"; // optional parameter
    $input['merchant_param3'] = "some-custom-inputs"; // optional parameter
    $input['merchant_param4'] = "some-custom-inputs"; // optional parameter
    $input['merchant_param5'] = "some-custom-inputs"; // optional parameter
    foreach ($input as $key => $value) {
      $merchant_data .= $key . '=' . $value . '&';
    }

    $encrypted_data = encryptCC($merchant_data, $working_key);
    $ccavenueUrl = "https://secure.ccavenue.com/";
    // $ccavenueUrl = "https://test.ccavenue.com/";

    
    $url = $ccavenueUrl . '/transaction/transaction.do?command=initiateTransaction&encRequest=' . $encrypted_data . '&access_code=' . $access_code;

    return redirect($url);
  }


  // public function ccResponse(Request $request)
  // {
  //   try {
  //     $workingKey = '297B68F2FBADF1BF04A313DDF2115D1D';//config('cc-avenue.working_key'); //Working Key should be provided here.
  //     $encResponse = $_POST["encResp"];

  //     $rcvdString = $this->decryptCC($encResponse, $workingKey);        //Crypto Decryption used as per the specified working key.
  //     $order_status = "";
  //     $decryptValues = explode('&', $rcvdString);
  //     $dataSize = sizeof($decryptValues);

  //     dd($decryptValues);
  //   } catch (\Throwable $th) {
  //     dd($th);
  //   }
  // }

  public function ccResponse(Request $request)
{
    $workingKey = '297B68F2FBADF1BF04A313DDF2115D1D'; // Use the correct working key
    $encResponse = $request->input('encResp'); // Retrieve the encrypted response from the request

    $rcvdString = $this->decryptCC($encResponse, $workingKey); // Decrypt the response
    $decryptValues = explode('&', $rcvdString); // Split the response string into key-value pairs

    $responseArray = [];

    foreach ($decryptValues as $value) {
        $pair = explode('=', $value);
        if (count($pair) == 2) {
            $key = $pair[0];
            $val = $pair[1];
            $responseArray[$key] = $val;
        }
    }

    // dd($responseArray);
    // Now you can access the order_id and order_status easily
    $order_id = $responseArray['order_id'] ?? null;
    $order_status = $responseArray['order_status'] ?? null;

    // Assuming you have an Order model to retrieve the order
    $order = Order::find($order_id);

    if (!$order) {
        // Handle case where order is not found
        return redirect()->route('buyer.order-failed')->with('sweet-alert', 'Order not found');
    }

    if ($order_status === 'Success') {
        // Order was successful
        // Update order status in your database if needed
        $order->update(['ccavenue_response' => $responseArray]);
        return redirect()->route('buyer.order-successful', $order->id)->with('sweet-alert', 'Order Successfully Placed');
    } else {
        // Order failed  Aborted
        // Update order status in your database if needed
        // $order->update(['status' => 'Failed']);
        return redirect()->route('buyer.order-failed', $order->id)->with('sweet-alert', 'Order Failed');
    }
}



public  function decryptCC($encryptedText,$key)
{
	$key = hextobin(md5($key));
	$initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
	$encryptedText = hextobin($encryptedText);
	$decryptedText = openssl_decrypt($encryptedText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
	return $decryptedText;
}



  public function orderSuccessful(int $orderId): View
  {
    $order = Order::find($orderId);
    // getting order data
    $cartProducts = $this->cartRepository->getCartData($order->cart_id);
    $giftTotal = $this->cartRepository->getGiftTotal($cartProducts);

    if ($order->status != 8)
      return view('customer.order.order-successful', compact('order', 'giftTotal'));


    // copying just created order into sellers order table
    $this->orderRepository->mapOrderToSuppliersOrderTable($order, $cartProducts);

    // emptying user wallet if used and make an entry in wallet history
    // (!isset($order->wallet_used)) ?: $this->orderWalletUpdate($order->buyer, $order->id);

    if ($order->status === 8)
      $this->orderRepository->updateStatus($orderId, 0);

    // changing cart items status to order placed
    $this->cartRepository->changeCartItemsStatus($order->cart_id, 1);

    ChangeProductOrderStatus::run($order->cart_id, 0, $order->buyer->fullName, 'Buyer');
    // sending order email to buyer after successful order
    OrderEmailNotification::run($order, $order->buyer->email, 'Order Placed');
    // sending order whatsapp notification to buyer after successful order
    $this->newOrderNotification($order);
    // giving bonus amount to the referrer if order is via referral after successful order
    AddReferralBonusAmountToWalletOfReferrer::run(Buyer::find(Auth::guard('buyer')->user()->id), $order);
    // dividing wallet and allocating amounts of wallet & giftcard among all the ordered products after successful order
    DivideAndAllocateWalletAndGiftCardAmount::run(SupplierOrder::where('order_id', '=', $order->id)->get());
    // emptying cart session
    session()->forget('cart_id');

    return view('customer.order.order-successful', compact('order', 'giftTotal'));
  }

  public function orderFailed(int $orderId)
  {
    $order = Order::find($orderId);

    if ($order->status != 8)
      return redirect()->route('home');

    // getting order data
    $cartProducts = $this->cartRepository->getCartData($order->cart_id);
    $giftTotal = $this->cartRepository->getGiftTotal($cartProducts);

    // changing cart items status to order placed
    $this->cartRepository->changeCartItemsStatus($order->cart_id, 1);

    // copying just created order into sellers order table
    $this->orderRepository->mapOrderToSuppliersOrderTable($order, $cartProducts);

    $this->orderRepository->updateStatus($orderId, 8);

    ChangeProductOrderStatus::run($order->cart_id, 8, $order->buyer->fullName, 'Buyer');
    // dividing wallet and allocating amounts of wallet & giftcard among all the ordered products after successful order
    DivideAndAllocateWalletAndGiftCardAmount::run(SupplierOrder::where('order_id', '=', $order->id)->get());
    // emptying cart session
    session()->forget('cart_id');
    return view('customer.order.order-failed', compact('order', 'giftTotal'));
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function show(int $id)
  {
    $order = Cart::orderByDesc('id')
      ->where([['supplier_order_id', $id]])
      ->first();
    $giftTotal = $order->gift_pricing * $order->quantity;

    return view('customer.profile.order-detail', compact('order', 'giftTotal'));
  }

  public function show_old_order(int $id)
  {
   
      // $order = OldOrder::orderByDesc('oid')
      // ->where([['oid', $id]])
    $email =    Auth::guard('buyer')->user()->email;
    $order = OldOrderSeller::orderByDesc('sid')
      ->where([['sid', $id]])
      ->first();
    //  return $order->emailid;
      if(empty($order) || !($order->emailid == $email)){
        return   abort('404');
      }
    $giftTotal = 0;//$order->gift_pricing * $order->quantity;

    return view('customer.profile.order-detail_old', compact('order', 'giftTotal'));
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function edit(Order $order)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Order $order)
  {
    //
  }

  public function status(int $id, int $status)
  {
    $this->orderRepository->updateStatus($id, $status);
    return back()->with('sucsess', 'Order Status has been updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function destroy(Order $order)
  {
    //
  }
}
