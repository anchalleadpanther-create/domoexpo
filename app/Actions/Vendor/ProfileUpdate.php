<?php

namespace App\Actions\Vendor;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\Supplier\Supplier;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\Supplier\SupplierProfileHistory;

class ProfileUpdate
{
  use AsAction, ApiResponser;

  public function rules(): array
  {
    return [
      'biz_phone' => 'required|max:20',
      'biz_company_address' => 'required|max:250',
      'biz_company_state' => 'required',
      'biz_company_city' => 'required|max:100',
    ];
  }

  public function messages(): array
  {
    return [
      'biz_phone.required' => 'Designer contact number is required',
      'biz_phone.max' => 'Designer contact number must be below or equal to 20 numbers',
      'biz_company_address.required' => 'Company/Legal name is required',
      'biz_company_address.max' => 'Company/Legal name must be below or equal to 250 characters',
      'biz_company_state.required' => 'State field is required',
      'biz_company_city.required' => 'City name is required',
      'biz_company_city.max' => 'City name must be below or equal to 100 characters',
    ];
  }

  public function asController(Request $request): JsonResponse
  {
    try {
      $supplier = Supplier::find(Auth::guard('vendor')->user()->id)
        ->update($request->only(
          'biz_phone',
          'biz_company_address',
          'biz_company_state',
          'biz_company_city'
        ));

      SupplierProfileHistory::create(['supplier_id' => Auth::guard('vendor')->user()->id, 'type' => $request->type]);
      return $this->successResponse([], 'Your details has been successfully updated!');
    } catch (\Illuminate\Validation\ValidationException $th) {
      return $this->errorResponse([],  $th->getMessage());
    } catch (\Throwable $th) {
      return $this->errorResponse([], $th->getMessage());
    }
  }
}
