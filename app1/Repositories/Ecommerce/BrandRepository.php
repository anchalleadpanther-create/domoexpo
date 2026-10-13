<?php

namespace App\Repositories\Ecommerce;

use Illuminate\Support\Str;
use App\Models\Ecommerce\Brand;
use App\Repositories\BaseRepository;
use App\Models\Ecommerce\BrandMappedCategory;

class BrandRepository extends BaseRepository
{
  public function store($request)
  {
    try {
      if ($request->hasfile('brand_icon'))
        $request->request->add(['icon' => $this->handleSingleFileUpload($request->brand_icon, 'uploads/brand/')]);

      if ($request->hasfile('brand_banner'))
        $request->request->add(['banner' => $this->handleSingleFileUpload($request->brand_banner, 'uploads/brand/')]);

      if ($request->hasfile('brand_certificate'))
        $request->request->add(['certificate' => $this->handleSingleFileUpload($request->brand_certificate, 'uploads/brand/')]);

      if ($request->hasfile('brand_reseller_auth_letter'))
        $request->request->add(['reseller_auth_letter' => $this->handleSingleFileUpload($request->brand_reseller_auth_letter, 'uploads/brand/')]);

      $request->request->add(['brand_slug' => Str::slug($request->brand_name, '-')]);

      if (isset($request->brand_categories))
        $request->request->add(['categories' => array_filter(array_map('trim', explode(',', $request->brand_categories)))]);

      $brand_id = Brand::create($request->except('_token', 'brand_icon', 'brand_banner', 'category_id', 'brand_categories'));
      // $this->brandCategoryMap($request, $brand_id);
    } catch (\Throwable $th) {
      dd($th);
    }

    return true;
  }

  public function update($request, $id)
  {
    try {
      if ($request->hasfile('brand_icon'))
        $request->request->add(['icon' => $this->handleSingleFileUpload($request->brand_icon, 'uploads/brand/')]);

      if ($request->hasfile('brand_banner'))
        $request->request->add(['banner' => $this->handleSingleFileUpload($request->brand_banner, 'uploads/brand/')]);

      if ($request->hasfile('brand_certificate'))
        $request->request->add(['certificate' => $this->handleSingleFileUpload($request->brand_certificate, 'uploads/brand/')]);

      if ($request->hasfile('brand_reseller_auth_letter'))
        $request->request->add(['reseller_auth_letter' => $this->handleSingleFileUpload($request->brand_reseller_auth_letter, 'uploads/brand/')]);

      $request->request->add(['brand_slug' => Str::slug($request->brand_name, '-')]);

      if (isset($request->brand_categories))
        $request->request->add(['categories' => array_filter(array_map('trim', explode(',', $request->brand_categories)))]);

      Brand::find($id)->update($request->except('_method', '_token', 'brand_icon', 'brand_banner', 'category_id', 'brand_categories'));
      // $this->brandCategoryMap($request, $id);
    } catch (\Throwable $th) {
      dd($th);
    }

    return true;
  }

  public function brandCategoryMap($request, int $brand_id)
  {
    BrandMappedCategory::where('brand_id', '=', $brand_id)->delete();
    if (is_array($request->category_id)) {
      $data = [];
      foreach ($request->category_id as $key => $value) {
        $data[] = [
          'brand_id' => $brand_id,
          'category_id' => (int)$value,
        ];
      }
      BrandMappedCategory::insert($data);
    }

    return true;
  }

  public function toggleStatus($id, $status)
  {
    // dd($id, $status);
    return Brand::find($id)->update(['status' => $status]);
  }
}
