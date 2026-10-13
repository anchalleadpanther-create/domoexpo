<?php

namespace App\Repositories\Extensions;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Extensions\Category;
use App\Repositories\BaseRepository;
use App\Models\Extensions\CategoryMappedFilter;

class CategoryRepository extends BaseRepository
{
  public function store($request)
  {
    try {
      if ($request->hasfile('category_icon')) :
        $request->request->add(['icon' => $this->handleSingleFileUpload($request->category_icon, 'uploads/category/')]);
      endif;

      if ($request->hasfile('category_banner')) :
        $request->request->add(['banner' => $this->handleSingleFileUpload($request->category_banner, 'uploads/category/')]);
      endif;

      $request->request->add(['category_slug' => Str::slug($request->category_name, '-')]);


      $category_id = Category::insertGetId($request->except('_token', 'category_icon', 'category_banner', 'filter_ids'));
      $this->categoryFilterMap($request, $category_id);
    } catch (\Throwable $th) {
      return back()->withError($th)->withInput();
    }

    return true;
  }

  public function update($request, $id)
  {
    try {
      if ($request->hasfile('category_icon')) :
        $request->request->add(['icon' => $this->handleSingleFileUpload($request->category_icon, 'uploads/category/')]);
      endif;

      if ($request->hasfile('category_banner')) :
        $request->request->add(['banner' => $this->handleSingleFileUpload($request->category_banner, 'uploads/category/')]);
      endif;

      $request->request->add(['category_slug' => Str::slug($request->category_name, '-')]);

      Category::find($id)->update($request->except('_method', '_token', 'category_icon', 'category_banner', 'filter_ids'));
      $this->categoryFilterMap($request, $id);
    } catch (\Throwable $th) {
      return back()->withError($th)->withInput();
    }

    return true;
  }

  public function categoryFilterMap($request, int $category_id)
  {
    CategoryMappedFilter::where('category_id', '=', $category_id)->delete();
    if (is_array($request->filter_ids)) {
      $data = [];
      foreach ($request->filter_ids as $key => $value) {
        $data[] = [
          'category_id' => $category_id,
          'filter_id' => (int)$value,
        ];
      }
      CategoryMappedFilter::insert($data);
    }

    return true;
  }

  public function toggleStatus($id, $status)
  {
    // dd($id, $status);
    return Category::find($id)->update(['status' => $status]);
  }
}
