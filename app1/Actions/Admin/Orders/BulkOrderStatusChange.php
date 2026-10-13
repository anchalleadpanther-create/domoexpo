<?php
namespace App\Actions\Admin\Orders;

use Carbon\Carbon;
use App\Traits\Wallet;
use App\Models\Buyer\Cart;
use Illuminate\Http\Request;
use App\Traits\WhatsappNotification;
use Illuminate\Http\RedirectResponse;
use App\Models\Supplier\SupplierOrder;
use App\Traits\CustomerMembershipPoints;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Actions\ProductOrder\CreateOrderHistory;

class BulkOrderStatusChange
{
  use AsAction, CustomerMembershipPoints, WhatsappNotification, Wallet;
  /* 

   * Handles the change in the status of the orders

   * and performs different actions 

   * according to the changing status.

  */
  public function handle(Request $request) : RedirectResponse
  {
    try {
      $status = (int)$request->order_status;
      $cartItems = Cart::whereIn('id', $request->cart_id)->get();
      $buyer = $cartItems[0]->buyer;
      $seller = $cartItems[0]->seller;

      if(isset($seller->commission))
        if ($seller->commission === 0)
          return back()->withErrors('Order status cannot be changed as designer comission is 0% only.');

      $cartItemIds = $cartItems->pluck('id')->toArray();

      $grandTotal = 0;
      $order = null;
      $supplierOrderIds = [];

      if ($status === 1 && (count(array_unique($cartItems->pluck('seller_id')->toArray())) !== 1))
        return back()->withErrors('Please select the same seller/designer order.');

      foreach ($cartItems as $cartItem) :
        $supplierOrder = SupplierOrder::find($cartItem->supplier_order_id);
        $grandTotal += $supplierOrder->grand_total;
        $order = $supplierOrder->order;
        $supplierOrderIds[] = $supplierOrder->id;
      endforeach;

      switch ($status):
        case 1:
          // GeneratePOAndSendMail::run($supplierOrderIds);
          // if ($order->shipping_country_id !== 101) $this->orderConfirmationInternationalOrder($order);
          // elseif ($order->payment_method !== 'Cash on Delivery') $this->orderConfirmationPrepaidOrder($order);
          break;
        case 2:
          Cart::whereIn('id', $cartItemIds)->update(['packed_at' => now()]);
          break;
        case 3:
          $dimensions = ['length' => $request->length, 'height' => $request->height, 'width' => $request->width, 'weight' => $request->weight];
          Cart::whereIn('id', $cartItemIds)->update(['shipped_at' => now()]);
          $response =  GenerateOrderInvoiceIdAndGenerateManifest::run($cartItemIds, $status, $dimensions);
          if(isset($response['status'] )){
            if($response['status'] == 'error'){
              return back()->with('success', @$response['message']);
            }
          }
          // dd($response); 
          $invoice = GenerateInvoice::run(Cart::whereIn('id', $cartItemIds)->get());
          SupplierOrder::whereIn('id', $supplierOrderIds)->update(['invoice_document' => $invoice]);
          break;
        case 4;
          $this->orderDispatched($order);
          break;
        case 5:
          $this->incrementPoints($grandTotal, $cartItems[0]->buyer_id);
          $this->orderDelivered($order);
          break;
        case 6:
          // $this->orderCancelled($order);
          $this->orderCancelledByAdminWhatsappNotification($order);
          Cart::whereIn('id', $cartItemIds)->update(['cancelled_at' => now()]);
          $productsForCreditNote = Cart::whereIn('id', $cartItemIds)
            ->whereHas('orderItemDetail', function ($q) {
              $q->where('invoice_document', '!=', NULL);
            })
            ->get();
          if (!$productsForCreditNote->isEmpty()) {
            $creditNote = GenerateCreditNote::run($productsForCreditNote);
            SupplierOrder::whereIn('id', $supplierOrderIds)->update(['credit_note_document' => $creditNote]);
          }
          break;
      endswitch;


      foreach ($cartItems as $cartItem) :
        $cartItem->update(['status' => $status]);
        $supplierOrder = SupplierOrder::find($cartItem->supplier_order_id);
        $supplierOrder->update(['status' => $status]);
        CreateOrderHistory::run($status, $cartItem->supplier_order_id, $request->action_by, $request->action_type);
      endforeach; 

      if ($status !== 1)
        OrderStatusChangeMail::run($cartItemIds, $status);

      return back()->with('success', 'Status changed successfully');
    } catch (\Throwable $th) {
      dd($th->getLine());
    }

  }

}

