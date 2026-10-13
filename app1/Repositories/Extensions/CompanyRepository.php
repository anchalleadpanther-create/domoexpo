<?php

namespace App\Repositories\Extensions;

use Illuminate\Support\Str;
use App\Models\Extensions\Blog;
use App\Models\Extensions\Company;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

class CompanyRepository extends BaseRepository
{
  public function store($request)
  {
    try {
      $request->request->add(['company_slug' => Str::slug($request->company_name, '-')]);
      $request->request->add(['user_id' => Auth::user()->id]);
      if ($request->hasfile('first_document')) :
        $request->request->add(['document_one' => $this->handleSingleFileUpload($request->first_document, 'uploads/company/')]);
      endif;
      if ($request->hasfile('second_document')) :
        $request->request->add(['document_two' => $this->handleSingleFileUpload($request->second_document, 'uploads/company/')]);
      endif;
      if ($request->hasfile('third_document')) :
        $request->request->add(['document_three' => $this->handleSingleFileUpload($request->third_document, 'uploads/company/')]);
      endif;
      if ($request->hasfile('four_document')) :
        $request->request->add(['document_four' => $this->handleSingleFileUpload($request->four_document, 'uploads/company/')]);
      endif;
      if ($request->hasfile('logo')) :
        $request->request->add(['company_logo' => $this->handleSingleFileUpload($request->logo, 'uploads/company/')]);
      endif;
      if ($request->hasfile('contact_picture')) :
        $request->request->add(['contact_photo' => $this->handleSingleFileUpload($request->contact_picture, 'uploads/company/')]);
      endif;
      Company::insert($request->except('_token', 'banner', 'first_document', 'second_document', 'third_document', 'four_document', 'contact_picture', 'logo'));
    } catch (\Throwable $th) {
      dd($th);
    }

    return true;
  }

  public function update($request, $id)
  {
    try {
      $request->request->add(['company_slug' => Str::slug($request->company_name, '-')]);
      $request->request->add(['user_id' => Auth::user()->id]);
      if ($request->hasfile('first_document')) :
        $request->request->add(['document_one' => $this->handleSingleFileUpload($request->first_document, 'uploads/company/')]);
      endif;
      if ($request->hasfile('second_document')) :
        $request->request->add(['document_two' => $this->handleSingleFileUpload($request->second_document, 'uploads/company/')]);
      endif;
      if ($request->hasfile('third_document')) :
        $request->request->add(['document_three' => $this->handleSingleFileUpload($request->third_document, 'uploads/company/')]);
      endif;
      if ($request->hasfile('four_document')) :
        $request->request->add(['document_four' => $this->handleSingleFileUpload($request->four_document, 'uploads/company/')]);
      endif;
      if ($request->hasfile('logo')) :
        $request->request->add(['company_logo' => $this->handleSingleFileUpload($request->logo, 'uploads/company/')]);
      endif;
      if ($request->hasfile('contact_picture')) :
        $request->request->add(['contact_photo' => $this->handleSingleFileUpload($request->contact_picture, 'uploads/company/')]);
      endif;
      Company::find($id)->update($request->except('_method', '_token', 'banner', 'first_document', 'second_document', 'third_document', 'four_document', 'contact_picture', 'logo'));
    } catch (\Throwable $th) {
      dd($th);
    }
    return true;
  }

  public function toggleStatus($id, $status)
  {
    return Company::find($id)->update(['status' => $status]);
  }
}
