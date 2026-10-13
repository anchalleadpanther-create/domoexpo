<?php

namespace App\Actions\Admin\Products;

use App\Traits\FileUpload;
use Illuminate\Http\Request;
use App\Models\Ecommerce\ProductImage;
use Lorisleiva\Actions\Concerns\AsAction;

class BulkProductImageUpload
{
  use AsAction, FileUpload;

  public function handle(Request $request)
  {
    $request->validate([
      'product_images' => 'required|array',
      'product_images.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
    ]);

    $this->handleMultiFileUpload($request, 'product_images', 'uploads/products', 20, false);
    return back()->with('success', 'Product images uploaded successfully.');
  }
}
