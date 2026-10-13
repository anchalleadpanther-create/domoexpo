<?php
namespace App\Actions\Admin\Orders;

use NumberFormatter;
use App\Models\Buyer\Cart;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Supplier\Supplier;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Supplier\SupplierOrder;
use App\Models\Buyer\Order;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Mail\Admin\PurchaseOrderToDesigner;
use Illuminate\Http\Request;

class GenerateShippingLabelBlueDart
{
  use AsAction;
  public function handle(Request $request)
//   : string
  {
    $numberFormatter = new NumberFormatter("en", NumberFormatter::SPELLOUT);
    $products = [];
    $orders = SupplierOrder::where('blue_dart_awb_no',$request->blueDartAwb)->where('is_blue_dart_delivery', 1)->get();
    if(empty($orders)){
        abort(404);
    }
    $orderDetail = Order::where('id',$orders[0]->order_id)->first();
    // dd($orders[0]);
    $orderedProducts = Cart::whereIn('supplier_order_id', $orders->pluck('id')->toArray())->get();
    $purchaseDate = $orders[0]->created_at->format('d M, Y');
    $supplier = Supplier::find($orderedProducts[0]->seller_id);
    $brand = $orderedProducts[0]->brand;
    $supplierCommissionPercentage = $supplier->commission;
    $acceptedAt = '';
    $vendorDeliveryDate = null;



    foreach ($orderedProducts as $cartProduct) {
      $products[$cartProduct->product_id]['frontImage'] = null;
      $products[$cartProduct->product_id]['backImage'] = null;
      $commissionAmount = ($supplierCommissionPercentage / 100) * $cartProduct->orderItemDetail->grand_total;
      $products[$cartProduct->product_id]['totalPrice'] = $cartProduct->orderItemDetail->grand_total;
      $products[$cartProduct->product_id]['gst'] = $cartProduct->gst;
      $products[$cartProduct->product_id]['priceWithoutCommission'] = $cartProduct->orderItemDetail->grand_total - $commissionAmount;
      $products[$cartProduct->product_id]['priceWithoutCommissionAndTax'] = $products[$cartProduct->product_id]['priceWithoutCommission'] / (1 + ($cartProduct->gst / 100));
      $taxAmount = $products[$cartProduct->product_id]['priceWithoutCommission'] - $products[$cartProduct->product_id]['priceWithoutCommissionAndTax'];
      $products[$cartProduct->product_id]['gstAmount'] = $taxAmount;

      if (isset($cartProduct->product->images[0]->image) && file_exists(public_path() . '/uploads/products/' . $cartProduct->product->images[0]->image))
        $products[$cartProduct->product_id]['frontImage'] = public_path() . '/uploads/products/' . $cartProduct->product->images[0]->image;

      if (isset($cartProduct->product->images[1]->image) && file_exists(public_path() . '/uploads/products/' . $cartProduct->product->images[1]->image))
        $products[$cartProduct->product_id]['backImage'] = public_path() . '/uploads/products/' . $cartProduct->product->images[1]->image;


      $products[$cartProduct->product_id]['sizeChart'] = isset($cartProduct->product->size_chart) ? $cartProduct->product->size_chart : null;
      $products[$cartProduct->product_id]['adminComment'] = isset($cartProduct->orderItemDetail->admin_comment) ? $cartProduct->orderItemDetail->admin_comment : null;
      $cartProduct->update(['designer_commission' => $supplierCommissionPercentage, 'accepted_at' => now()]);
      $acceptedAt = now()->format('d M, Y');
      if ($vendorDeliveryDate === null) 
        $vendorDeliveryDate = $cartProduct->product->vendor_delivery_date;

    }
    $grandTotal = array_sum(array_column($products, 'priceWithoutCommission'));
    $grandTotalWithoutTax = array_sum(array_column($products, 'priceWithoutCommissionAndTax'));
    $totalOfTax = array_sum(array_column($products, 'gstAmount'));
    $grandTotalInWords = 'Rupees ' . ucwords($numberFormatter->formatCurrency($grandTotal, 'INR')) . ' only';
    $poPrefix = "";
    $pdfName = 'LT' . currentFinancialYear() . 'BDShippingLable' .'-'. str::random(32) . '.pdf';
    // Pdf::loadView('ecommerce.orders.blue-dart-shipping-label', compact('supplier', 'purchaseDate', 'orders', 'supplierCommissionPercentage', 'products', 'orderedProducts', 'grandTotalWithoutTax', 'totalOfTax', 'grandTotal', 'grandTotalInWords', 'poId', 'poPrefix', 'acceptedAt'))->setPaper('A4', 'portrait')->save(public_path('uploads/po/' . $pdfName));
    //    dd($orderedProducts);
   
    return Pdf::loadView('ecommerce.orders.blue-dart-shipping-label', compact('supplier', 'purchaseDate', 'orders','orderDetail','supplierCommissionPercentage', 'products', 'orderedProducts', 'grandTotalWithoutTax', 'totalOfTax', 'grandTotal', 'grandTotalInWords'))->setPaper('A4', 'portrait')->stream();
    // SupplierOrder::whereIn('id', $supplierOrderIds)->update(['po_document' => $pdfName, 'po_prefix' => poPrefix(), 'po_number' => $poId]);
    return view('ecommerce.orders.blue-dart-shipping-label',compact('supplier', 'purchaseDate', 'orders','orderDetail','supplierCommissionPercentage', 'products', 'orderedProducts', 'grandTotalWithoutTax', 'totalOfTax', 'grandTotal', 'grandTotalInWords'));
    // Mail::to($supplier->biz_email)->cc(array_merge(projectCCEmails(), $supplier->po_emails))->send(new PurchaseOrderToDesigner(['pdfName' => $pdfName, 'supplier' => $supplier, 'products' => $products, 'poId' => $poId, 'poPrefix' => $poPrefix, 'vendorDeliveryDate' => $vendorDeliveryDate]));
    return $pdfName;
    // return Pdf::loadView('ecommerce.orders.po', compact('supplier', 'purchaseDate', 'orders', 'supplierCommissionPercentage', 'products', 'orderedProducts', 'grandTotalWithoutTax', 'totalOfTax', 'grandTotal', 'grandTotalInWords', 'poId'))->setPaper('A4', 'portrait')->stream();
  }

}

