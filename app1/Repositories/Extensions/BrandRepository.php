<?php

namespace App\Repositories\Extensions;

use Illuminate\Support\Str;
use App\Models\Extensions\Brand;
use App\Repositories\BaseRepository;
use App\Models\Extensions\BrandMappedCategory;

class BrandRepository extends BaseRepository
{
  public function store($request)
  {
    try {
      if ($request->hasfile('brand_icon')) :
        $request->request->add(['icon' => $this->handleSingleFileUpload($request->brand_icon, 'uploads/brand/')]);
      endif;

      if ($request->hasfile('brand_banner')) :
        $request->request->add(['banner' => $this->handleSingleFileUpload($request->brand_banner, 'uploads/brand/')]);
      endif;

      $request->request->add(['brand_slug' => Str::slug($request->brand_name, '-')]);


      $brand_id = Brand::insertGetId($request->except('_token', 'brand_icon', 'brand_banner', 'category_id'));
      $this->brandCategoryMap($request, $brand_id);
    } catch (\Throwable $th) {
      dd($th);
      return back()->withError($th)->withInput();
    }

    return true;
  }

  public function update($request, $id)
  {
    try {
      if ($request->hasfile('brand_icon')) :
        $request->request->add(['icon' => $this->handleSingleFileUpload($request->brand_icon, 'uploads/brand/')]);
      endif;

      if ($request->hasfile('brand_banner')) :
        $request->request->add(['banner' => $this->handleSingleFileUpload($request->brand_banner, 'uploads/brand/')]);
      endif;

      $request->request->add(['brand_slug' => Str::slug($request->brand_name, '-')]);

      Brand::find($id)->update($request->except('_method', '_token', 'brand_icon', 'brand_banner', 'category_id'));
      $this->brandCategoryMap($request, $id);
    } catch (\Throwable $th) {
      return back()->withError($th)->withInput();
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
