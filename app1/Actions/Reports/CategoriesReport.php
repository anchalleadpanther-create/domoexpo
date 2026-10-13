<?php

namespace App\Actions\Reports;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Ecommerce\Brand;
use App\Models\Ecommerce\Product;
use App\Models\Ecommerce\Category;
use Maatwebsite\Excel\Facades\Excel;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Exports\Reports\BrandsReportExport;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class CategoriesReport
{
  use AsAction;

  public function handle(Request $request): View | BinaryFileResponse
  {
    $categories = Category::where([['status', '=', 1], ['parent_id', '=', 0]]);

    if (isset($request->search))
      $categories = $categories->where('category_name', 'like', '%' . $request->search . '%');

    if (isset($request->date_from))
      $categories = $categories->whereHas('mappedProducts.orders', function ($q) use ($request) {
        $q->whereDate('created_at', '>=', $request->date_from);
      });

    if (isset($request->date_till))
      $categories = $categories->whereHas('mappedProducts.orders', function ($q) use ($request) {
        $q->whereDate('created_at', '<=', $request->date_till);
      });

    if (isset($request->country))
      $categories = $categories->whereHas('mappedProducts.orders.orderItemDetail', function ($q) use ($request) {
        $q->where('shipping_country_id', '=', $request->country);
      });

    if (isset($request->state))
      $categories = $categories->whereHas('mappedProducts.orders.orderItemDetail', function ($q) use ($request) {
        $q->where('shipping_state_id', '=', $request->state);
      });

    if (isset($request->city))
      $categories = $categories->whereHas('mappedProducts.orders.orderItemDetail', function ($q) use ($request) {
        $q->where('shipping_city_id', '=', $request->city);
      });

    if (isset($request->report_type))
      return Excel::download(new BrandsReportExport($categories->get()), 'brands-report.xlsx');

    $categories = $categories->paginate(100)->withQueryString();

    $categoriesOrderInfo = [];

    foreach ($categories as $category) {
      $productOrdersCount = [];
      $productOrdersSum = [];

      foreach ($category->mappedProducts as $product) {
        if ($product->ordersCount >= 1) {
          $productOrdersCount[] = $product->ordersCount;
          $productOrdersSum[] = $product->ordersTotalSum;
        }
      }

      $categoriesOrderInfo[] = [
        'categoryId' => $category->id,
        'productOrdersCount' => array_sum($productOrdersCount),
        'ordersTotalSum' => array_sum($productOrdersSum)
      ];
    }

    return view('reports.category-reports', compact('categories', 'categoriesOrderInfo'));
  }
}
