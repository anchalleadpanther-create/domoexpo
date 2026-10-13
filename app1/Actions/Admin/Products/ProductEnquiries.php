<?php

namespace App\Actions\Admin\Products;

use Illuminate\View\View;
use App\Models\Ecommerce\ProductEnquiry;
use Lorisleiva\Actions\Concerns\AsAction;

class ProductEnquiries
{
  use AsAction;

  public function handle(): View
  {
    $enquiries = ProductEnquiry::orderByDesc('id')->paginate(50);
    return view('ecommerce.product-enquiries', compact('enquiries'));
  }
}
