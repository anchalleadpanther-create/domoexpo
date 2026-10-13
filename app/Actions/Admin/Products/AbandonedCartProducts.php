<?php

namespace App\Actions\Admin\Products;

use Illuminate\View\View;
use App\Models\Buyer\Cart;
use Maatwebsite\Excel\Facades\Excel;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Exports\Reports\AbandonedCartReport;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AbandonedCartProducts
{
  use AsAction;

  public function handle(): View | BinaryFileResponse
  {
    $products = Cart::where([['buyer_id', '!=', NULL], ['order_status', '=', 0]])->orderByDesc('id');
    $grandTotal = 0;

    if (isset(request()->date_from))
      $products = $products->whereDate('created_at', '>=', request()->date_from)
        ->whereDate('created_at', '<=', request()->date_till);

    if (isset(request()->report_type))
      return Excel::download(new AbandonedCartReport($products->get()), 'abandoned-cart-report.xlsx');

    $totalQuantity = (int)$products->sum('quantity');
    foreach ($products->get() as $product)
      $grandTotal += $product->price_unit * $product->quantity;

    $products = $products->paginate(100);
    
    return view('ecommerce.abandoned-cart-products', compact('products', 'totalQuantity', 'grandTotal'));
  }
}
