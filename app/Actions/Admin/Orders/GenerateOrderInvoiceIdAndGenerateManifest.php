<?php

namespace App\Actions\Admin\Orders;

use App\Models\Buyer\Cart;
use Illuminate\Support\Facades\DB;
use App\Traits\WhatsappNotification;
use Illuminate\Support\Facades\Http;
use App\Models\Supplier\SupplierOrder;
use Lorisleiva\Actions\Concerns\AsAction;
use Carbon\Carbon;

class GenerateOrderInvoiceIdAndGenerateManifest
{
  use AsAction, WhatsappNotification;

  public function handle(array $ids, int $status, array $dimensions)
  // : bool
  {
    // return request()->shipping_api;
    $status = 'Ready to Ship';
    $invoiceId = DB::table('cpr_orders_invoice_ids')->insertGetId(['created_at' => now(), 'updated_at' => now()]);
    $invoiceId = DB::table('cpr_orders_invoice_ids')->where('id', $invoiceId)->value('id');
    $supplierOrderIds = Cart::whereIn('id', $ids)->pluck('supplier_order_id')->toArray();
    $cartItems = Cart::whereIn('id', $ids)->get();
    SupplierOrder::whereIn('id', $supplierOrderIds)->update(['invoice_id' => $invoiceId]);

    $productNames = implode(',', Cart::whereIn('id', $ids)->pluck('name')->toArray());
    $orderIds = implode('|', SupplierOrder::whereIn('id', $supplierOrderIds)->pluck('order_id_counter')->toArray());

    $cart = Cart::find($ids[0]);
    $quantity = Cart::whereIn('id', $ids)->sum('quantity');
    $supplierOrders = SupplierOrder::whereIn('id', $supplierOrderIds)->get();
    $grandTotal = 0;
    $order = $supplierOrders[0]?->order;

    foreach ($supplierOrders as $supplierOrder)
      $grandTotal += ($supplierOrder->grand_total + $supplierOrder->shipping_charge) - ($supplierOrder->wallet_amount + $supplierOrder->gift_card_amount + $supplierOrder->coupon_value + $supplierOrder->advance_amount + $supplierOrder->referral_amount);
// return config('myconfig.APP_ENV') ;
    // if (config('myconfig.APP_ENV') === 'local') return OrderStatusChangeMail::run($ids, $status);

    if (request()->shipping_api === 'delhivery') {
      $delhiveryResponse = Delhivery::run($cart, $productNames, $grandTotal, $quantity, $orderIds);
      // dd($delhiveryResponse);
      SupplierOrder::where('invoice_id', $invoiceId)->update([
        'delhivery_response' => (array)$delhiveryResponse,
      ]);
      OrderStatusChangeMail::run($ids, $status, null);
      $this->orderShipped($order, '');

    } elseif (request()->shipping_api === 'BlueDart') {
      $data = ['cart'=>$cart,'cart->orderItemDetail'=>$cart->orderItemDetail,'productNames'=>$productNames,'grandTotal'=>$grandTotal,'quantity'=>$quantity,'orderIds'=>$orderIds,'dimensions' =>$dimensions];
      $delhiveryResponse = GenerateBlueDartWaybill::run($cart,$cartItems,$productNames, $grandTotal, $quantity, $orderIds,$dimensions);

      
      if($delhiveryResponse['status'] == "200"){

        $cartItems = Cart::whereIn('id', $ids)->update([
          "weight" => $dimensions['weight'],
          "length" =>  $dimensions['length'],
          "breadth" => $dimensions['width'],
          "height" => $dimensions['height']
        ]);


        SupplierOrder::where('invoice_id', $invoiceId)->update([
          'blurdart_response' => $delhiveryResponse['json'] ?? [],
          'blue_dart_awb_no' => @$delhiveryResponse['AWBNo']  ?? "",
          'is_blue_dart_delivery' => 1,
        ]);


        // $saveBDResToSupplierOrder = SupplierOrder::where('id', $supplierOrder->id)->first();
        // $saveBDResToSupplierOrder->blurdart_response = $delhiveryResponse['json'] ?? [];
        // $saveBDResToSupplierOrder->is_blue_dart_delivery = 1;
        // $saveBDResToSupplierOrder->save();
      }elseif($delhiveryResponse['status'] != "200"){
        // $supplierOrder = SupplierOrder::where('id', $supplierOrder->id)->first();
        // $supplierOrder->blurdart_response = $delhiveryResponse['json'];
        // $supplierOrder->save();
        return $data = ['status' => 'error','message'=> @$delhiveryResponse['message']];
      }

      // return  $response =   $delhiveryResponse['status'];
      // return $response;
      // dd($delhiveryResponse);
      
      OrderStatusChangeMail::run($ids, $status, null);
      $this->orderShipped($order, '');

    }elseif (request()->shipping_api === 'pickrr') {
      if ($grandTotal >= 50000) {
        OrderStatusChangeMail::run($ids, $status);
        return true;
      }

      $response = Http::post('https://www.pickrr.com/api/place-order/', [
        'auth_token' => config('myconfig.PICKRR_TOKEN'),
        'item_name' => $productNames,
        'from_name' => 'The Fashion Edit',
        'from_phone_number' => '8447722222',
        'from_address' => '86, Maulsari Avenue, DLF phase 3, Gurgaon, Haryana',
        'from_pincode' => '122002',
        'pickup_gstin' => '',
        'to_name' =>  $cart->orderItemDetail->shipping_name,
        'to_phone_number' => $cart->orderItemDetail->shipping_phone,
        'to_pincode' => config('myconfig.APP_ENV') === 'local' ? '250001' : $cart->orderItemDetail->shipping_pincode,
        'to_address' => $cart->orderItemDetail->shipping_address,
        'quantity' => $quantity,
        'invoice_value' => $grandTotal,
        'cod_amount' => $cart->orderItemDetail->order->payment_method === 'Cash on Delivery' ? $grandTotal : 0,
        'client_order_id' => $invoiceId,
        'item_breadth' => $dimensions['width'],
        'item_length' => $dimensions['length'],
        'item_height' => $dimensions['height'],
        'item_weight' => $dimensions['weight'],
        'item_tax_percentage' => 12,
        'is_reverse' => False
      ]);

      $pickrrResponse = $response->object();

      if ($response->object()->success) {
        SupplierOrder::where('invoice_id', $invoiceId)->update([
          'track_url' => $pickrrResponse?->track_url,
          'courier' => $pickrrResponse?->courier,
          'tracking_id' => $pickrrResponse?->tracking_id,
          'manifest_link_pdf' => $pickrrResponse?->manifest_link_pdf,
          'manifest_link' => $pickrrResponse?->manifest_link,
          'edd_stamp' => $pickrrResponse?->edd_stamp,
          'pickrr_response' => (array)$pickrrResponse,
        ]);
        OrderStatusChangeMail::run($ids, $status, $pickrrResponse->track_url);
        $this->orderShipped($order, $pickrrResponse->tracking_id);
      }
    } else {
      OrderStatusChangeMail::run($ids, $status, null);
      $this->orderShipped($order, '');
    }

    return true;
  }
}
