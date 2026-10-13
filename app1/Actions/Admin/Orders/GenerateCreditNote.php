<?php

namespace App\Actions\Admin\Orders;

use NumberFormatter;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Models\Supplier\SupplierOrder;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Database\Eloquent\Collection;

class GenerateCreditNote
{
  use AsAction;

  /* 
  * Generate the Invoice PDF of the selected ordered items & save.
  */

  private function cartItemPriceUnitWithoutCouponAmount($cartItems)
  {
    return $cartItems->each(function ($cartItem) {
      $cartItem->price_unit -= $cartItem->coupon_amount;
    });
  }

  private function sumOfTax($cartItems): float
  {
    $taxAmount = 0;
    foreach ($cartItems as $cartItem) {
      $amountWithoutTax = ($cartItem->price_unit * $cartItem->quantity) / (1 + ($cartItem->gst / 100));
      $amountWithTax = $cartItem->price_unit * $cartItem->quantity;
      $taxAmount += $amountWithTax - $amountWithoutTax;
    }

    return $taxAmount;
  }

  private function totalProductQuantities($cartItems): float
  {
    $quantity = 0;
    foreach ($cartItems as $cartItem)
      $quantity += $cartItem->quantity;

    return $quantity;
  }

  private function sumOfProductPrices($cartItems): float
  {
    $price = 0;
    foreach ($cartItems as $cartItem)
      $price += $cartItem->price_unit + $cartItem->coupon_amount;

    return $price;
  }

  private function sumOfProductPricesWithoutTax($cartItems): float
  {
    $price = 0;
    foreach ($cartItems as $cartItem)
      $price += $cartItem->gstAmountWithoutQuantity;

    return $price;
  }

  private function sumOfProductPricesWithoutTaxMultiplyQuantity($cartItems): float
  {
    $price = 0;
    foreach ($cartItems as $cartItem)
      $price += $cartItem->gstAmountWithoutQuantity * $cartItem->quantity;

    return $price;
  }

  private function taxAmounts($cartItems, $shippingChargesWithGst, $shippingChargesGst): array
  {
    $taxes = [];
    $values = [];
    foreach ($cartItems as  $cartItem) {
      $selllingPriceWithoutTax = ($cartItem->price_unit * $cartItem->quantity) / (1 + ($cartItem->gst / 100));
      $sellingPrice = $cartItem->price_unit * $cartItem->quantity;

      $taxes[] = [
        'gst' => (int)$cartItem->gst,
        'sellingPrice' => $sellingPrice,
        'sellingPriceWithoutTax' => $sellingPrice / (1 + ($cartItem->gst / 100)),
        'taxAmount' => $sellingPrice - $selllingPriceWithoutTax,
      ];
    }

    if ($shippingChargesWithGst > 0.0) {
      $taxes[] = [
        'gst' => 18,
        'sellingPrice' => $shippingChargesWithGst,
        'sellingPriceWithoutTax' => $shippingChargesWithGst - $shippingChargesGst,
        'taxAmount' => $shippingChargesGst,
      ];
    }

    foreach ($taxes as $tax) {
      if (array_key_exists($tax['gst'], $values)) {
        $values[$tax['gst']]['sellingPrice'] += $tax['sellingPrice'];
        $values[$tax['gst']]['sellingPriceWithoutTax'] += $tax['sellingPriceWithoutTax'];
        $values[$tax['gst']]['taxAmount'] += $tax['taxAmount'];
      } else {
        $values[$tax['gst']]['gst'] = $tax['gst'];
        $values[$tax['gst']]['sellingPrice'] = $tax['sellingPrice'];
        $values[$tax['gst']]['sellingPriceWithoutTax'] = $tax['sellingPriceWithoutTax'];
        $values[$tax['gst']]['taxAmount'] = $tax['taxAmount'];
      }
    }
    return $values;
  }

  public function handle(Collection $cartItems): string
  {
    $creditNoteId = DB::table('cpr_orders_credit_note_ids')->insertGetId(['created_at' => now(), 'updated_at' => now()]);
    $creditNoteId = DB::table('cpr_orders_credit_note_ids')->where('id', $creditNoteId)->value('id');

    foreach ($cartItems as $cartItem) $cartItem->orderItemDetail()->update(['credit_note_id' => $creditNoteId]);

    $cartItems = $this->cartItemPriceUnitWithoutCouponAmount($cartItems);

    $numberFormatter = new NumberFormatter("en", NumberFormatter::SPELLOUT);
    $supplierOrders = SupplierOrder::whereIn('id', $cartItems->pluck('supplier_order_id')->toArray())->get();
    $shippingChargesWithGst = $supplierOrders->sum('shipping_charge');
    $shippingChargesGst = ($supplierOrders->sum('shipping_charge') / (1 + ((int)18 / 100)));
    $shippingChargesGst = $supplierOrders->sum('shipping_charge') - $shippingChargesGst;

    $grandTotalWithTax = array_sum(array_column($supplierOrders->toArray(), 'grand_total'));
    $amountReceivable = array_sum(array_column($supplierOrders->toArray(), 'grand_total')) + $shippingChargesWithGst;

    $totalWalletAmount = array_sum(array_column($supplierOrders->toArray(), 'wallet_used'));
    $totalGiftCardAmount = array_sum(array_column($supplierOrders->toArray(), 'gift_card_amount'));
    $totalCouponAmount = array_sum(array_column($cartItems->toArray(), 'coupon_amount'));
    $totalAdvanceAmount = array_sum(array_column($supplierOrders->toArray(), 'advance_amount'));
    $totalReferralAmount = array_sum(array_column($supplierOrders->toArray(), 'referral_amount'));

    $sumOfAllDiscounts = ($totalWalletAmount + $totalGiftCardAmount + $totalCouponAmount + $totalReferralAmount);
    $grandTotalWithTax -= $totalCouponAmount;

    $sumOfTax = $this->sumOfTax($cartItems);
    $grandTotalWithoutTax = $this->sumOfProductPricesWithoutTaxMultiplyQuantity($cartItems);

    $data = [
      'creditNoteId' => $creditNoteId,
      'creditNoteDate' => $cartItems[0]->cancelled_at->format('d/m/Y'),
      'orderId' => $supplierOrders[0]->order_id,
      'orderDate' => $supplierOrders[0]->created_at->format('d/m/Y'),
      'state' => $supplierOrders[0]->state?->name,
      'code' => 24,
      'airwayShippingBillNo' => !empty($supplierOrders[0]->pickrr_response) ? $supplierOrders[0]->pickrr_response['tracking_id'] : (isset($supplierOrders[0]->delhivery_response['packages'][0]['waybill']) ? $supplierOrders[0]->delhivery_response['packages'][0]['waybill'] : null),
      'airwayShippingBillDate' => empty($supplierOrders[0]->pickrr_response) ? '' : $supplierOrders[0]->pickrr_response['edd_stamp'],
      'dispatchDocNo' => !empty($supplierOrders[0]->pickrr_response) ? $supplierOrders[0]->pickrr_response['tracking_id'] : (isset($supplierOrders[0]->delhivery_response['packages'][0]['waybill']) ? $supplierOrders[0]->delhivery_response['packages'][0]['waybill'] : null),
      'dispatchedThrough' => empty($supplierOrders[0]->pickrr_response) ? '' : $supplierOrders[0]->pickrr_response['courier'],
      'transportMode' => empty($supplierOrders[0]->pickrr_response) ? '' : $supplierOrders[0]->pickrr_response['dispatch_mode'],
      'dateOfSupply' => $cartItems[0]->shipped_at->format('d/m/Y'),
      'placeOfSupply' => '',
      'GstPayableOnReverseCharge' => 'NO',
      'paymentMethod' => $supplierOrders[0]->payment_method,
      'sameState' => $supplierOrders[0]->state?->name === 'Gujarat',
      'shippingInfo' => [
        'shippingName' => $supplierOrders[0]->shipping_name,
        'shippingEmail' => $supplierOrders[0]->shipping_email,
        'shippingPhone' => $supplierOrders[0]->shipping_phone,
        'shippingPincode' => $supplierOrders[0]->shipping_pincode,
        'shippingAddress' => $supplierOrders[0]->shipping_address,
        'shippingCountry' => $supplierOrders[0]->country?->name,
        'shippingState' => $supplierOrders[0]->state?->name,
        'shippingCity' => $supplierOrders[0]->city?->name,
        'shippingGst' => '',
        'shippingCode' => '03',
      ],
      'amount' => [
        'grandTotalWithTax' => $grandTotalWithTax + $shippingChargesWithGst,
        'sumOfTax' => $sumOfTax,
        'grandTotalWithoutTax' => $grandTotalWithoutTax,
        'grandTotalWithTaxInWords' => ucwords($numberFormatter->formatCurrency($grandTotalWithTax, 'INR')) . ' only',
        'amountReceivable' => $amountReceivable - ($sumOfAllDiscounts + $totalAdvanceAmount),
        'amountReceivableInWords' => ucwords($numberFormatter->formatCurrency($amountReceivable - ($sumOfAllDiscounts + $totalAdvanceAmount), 'INR')) . ' only',
        'totalProductQuantities' => $this->totalProductQuantities($cartItems),
        'totalPriceOfProducts' => $this->sumOfProductPrices($cartItems),
        'totalPriceOfProductWithoutTax' => $this->sumOfProductPricesWithoutTax($cartItems),
        'shippingChargesGst' => $shippingChargesGst,
        'shippingChargesWithoutGst' => $supplierOrders[0]->shipping_charge - $shippingChargesGst,
        'sumOfAllDiscounts' => $sumOfAllDiscounts,
        'shippingChargesWithGst' => $shippingChargesWithGst,
        'totalAdvanceAmount' => $totalAdvanceAmount,
        'totalCouponAmount' => $totalCouponAmount,
        'totalWalletAmount' => $totalWalletAmount,
        'totalGiftCardAmount' => $totalGiftCardAmount,
        'totalReferralAmount' => $totalReferralAmount,
      ],
      'taxAmounts' => $this->taxAmounts($cartItems, $shippingChargesWithGst, $shippingChargesGst),
      'products' => $cartItems,
    ];

    $fileName = 'FEIG'  . currentFinancialYear() . 'CN' . $creditNoteId . '-' . Str::slug($data['shippingInfo']['shippingName']) . '.pdf';

    Pdf::loadView('ecommerce.orders.credit-note', $data)->setPaper('A4', 'portrait')->save(public_path('uploads/creditNotes/' . $fileName));
    // return Pdf::loadView('ecommerce.orders.invoice', $data)->setPaper('A4', 'portrait')->stream();
    return $fileName;
  }
}
