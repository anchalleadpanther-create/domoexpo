<?php

namespace App\Actions\Customer;

use App\Traits\FileUpload;
use App\Traits\ApiResponser;
use App\Models\Supplier\Supplier;
use Illuminate\Http\JsonResponse;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\Supplier\SupplierProfileHistory;
use App\Http\Requests\Customer\DesignerOnboardingRequest;

class DesignerOnboarding
{
  use AsAction, ApiResponser, FileUpload;

  public function asController(DesignerOnboardingRequest $request): JsonResponse
  {
    try {
      $request->request->add(['biz_company_country' => 101]);

      if ($request->hasfile('biz_reg_gst_file'))
        $request->request->add(['biz_reg_gst_document' => $this->handleSingleFileUpload($request->biz_reg_gst_file, 'uploads/supplier/')]);

      if ($request->hasfile('biz_reg_pan_file'))
        $request->request->add(['biz_reg_pan_document' => $this->handleSingleFileUpload($request->biz_reg_pan_file, 'uploads/supplier/')]);

      if ($request->hasfile('biz_bank_cancel_cheque_file'))
        $request->request->add(['biz_bank_cancel_cheque' => $this->handleSingleFileUpload($request->biz_bank_cancel_cheque_file, 'uploads/supplier/')]);

      $supplier = Supplier::create($request->only(
        'biz_email',
        'merchandiser',
        'biz_company',
        'biz_name',
        'biz_phone',
        'biz_company_address',
        'biz_reg_gst',
        'biz_reg_pan_no',
        'commission',
        'ar_name',
        'ar_phone',
        'ar_email',
        'accounts_name',
        'accounts_phone',
        'accounts_email',
        'biz_company_state',
        'biz_company_city',
        'biz_bank_acc_no',
        'biz_bank_acc_type',
        'biz_bank_acc_type',
        'biz_bank_name',
        'biz_bank_ifsc_code',
        'biz_bank_branch_name',
        'biz_bank_acc_name',
        'biz_reg_gst_file',
        'biz_reg_pan_file',
        'biz_bank_cancel_cheque_file',
        'biz_reg_gst_document',
        'biz_reg_pan_document',
        'biz_bank_cancel_cheque'
      ));
      SupplierProfileHistory::create(['supplier_id' => $supplier->id, 'type' => $request->type]);
      return $this->successResponse([], 'You have been successfully onboarded!');
    } catch (\Illuminate\Validation\ValidationException $th) {
      return $this->errorResponse([],  $th->getMessage());
    } catch (\Throwable $th) {
      return $this->errorResponse([], $th->getMessage());
    }
  }
  public function handleFiles()
  {
    # code...
  }
}
