<?php

namespace App\Actions\Rfq;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Supplier\Supplier;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Repositories\Buyer\Rfq\RfqRepository;

class SearchSupplier
{
  use AsAction;

  public function handle(Request $request, int $id, RfqRepository $rfqRepository): View
  {
    $data = $rfqRepository->index($id);
    // supplier filter method to get suppliers according to the buyer search criteria
    $suppliers = $this->getSupplier($request, $id);

    $searchData = (object)$request->except(['_token']);
    return view('customer.buyers.rfq.index', compact('data', 'suppliers', 'searchData'));
  }

  public function getSupplier($request, $rfqId): object
  {
    $industryId = (int)$request->supplier_industry;

    $suppliers = Supplier::where([
      ['status', '=', 1], ['supplier_status', '=', 1], ['biz_supplier_type', $request->supplier_type], ['biz_company_country', '=', (int)$request->supplier_country], ['buyer_id', '!=', Auth::guard('buyer')->user()->id],
    ]);

    if (isset($request->supplier_name)) {
      $suppliers = $suppliers->where('biz_name', 'like', '%' . $request->supplier_name . '%');
    }

    if (isset($request->registered_with)) {
      $suppliers = $suppliers->where('biz_reg_with', '=', $request->registered_with);
    }
    switch ($request->supplier_type) {
      case 'Products Supplier':
        $suppliers = $suppliers->whereHas('productIndustries', function ($suppliers) use ($industryId) {
          $suppliers->where('cpr_suppliers_mapped_product_industries.dropdown_id', $industryId);
        });
        break;
      case 'Service Supplier':
        $suppliers = $suppliers->whereHas('serviceIndustries', function ($suppliers) use ($industryId) {
          $suppliers->where('cpr_suppliers_mapped_service_industries.dropdown_id', $industryId);
        });
        break;
      case 'Product & Service Supplier':
        $suppliers = $suppliers->whereHas('productIndustries', function ($suppliers) use ($industryId) {
          $suppliers->where('cpr_suppliers_mapped_product_industries.dropdown_id', $industryId);
        })->orWhereHas(
          'serviceIndustries',
          function ($suppliers) use ($industryId) {
            $suppliers->where('cpr_suppliers_mapped_service_industries.dropdown_id', $industryId);
          }
        );
        break;
    }

    if (isset($request->ship_from)) {
      $suppliers = $suppliers->whereHas('shippingFromCountries', function ($suppliers) use ($request) {
        $suppliers->where('cpr_suppliers_ship_from.country_id', (int)$request->ship_from);
      });
    }

    if (isset($request->ship_to)) {
      $suppliers = $suppliers->whereHas('shippingToCountries', function ($suppliers) use ($request) {
        $suppliers->where('cpr_suppliers_ship_to.country_id', (int)$request->ship_to);
      });
    }
    return $suppliers->get();
  }
}
