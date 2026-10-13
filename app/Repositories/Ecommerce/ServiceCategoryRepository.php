<?php

namespace App\Repositories\Ecommerce;

use Illuminate\Support\Str;
use App\Models\Ecommerce\Category;
use App\Models\Ecommerce\ServiceCategory;
use App\Repositories\BaseRepository;
use App\Models\Ecommerce\CategoryMappedFilter;

class ServiceCategoryRepository extends BaseRepository
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
      
      if ($request->hasfile('second_catgory_banner')) :
        $request->request->add(['second_banner' => $this->handleSingleFileUpload($request->second_catgory_banner, 'uploads/category/')]);
      endif;

      if ($request->hasfile('feature_banner')) :
        $request->request->add(['featured_banner' => $this->handleSingleFileUpload($request->feature_banner, 'uploads/category/')]);
      endif;

      $request->request->add(['category_slug' => $this->generateCategorySlug($request)]);
      
      // Ensure 'is_show_in_filter' is set correctly
    $is_show_in_filter = !empty($request->is_show_in_filter) ? $request->is_show_in_filter : 0;
    $request->merge(['is_show_in_filter' => $is_show_in_filter]);
    
    // Insert category and get its ID
    $category_id = ServiceCategory::insertGetId($request->except(['_token', 'category_icon', 'category_banner','second_catgory_banner', 'feature_banner', 'filter_ids']));

      $this->categoryFilterMap($request, $category_id);
    } catch (\Throwable $th) {
      dd($th);
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
      
      if ($request->hasfile('second_catgory_banner')) :
        $request->request->add(['second_banner' => $this->handleSingleFileUpload($request->second_catgory_banner, 'uploads/category/')]);
      endif;

      if ($request->hasfile('feature_banner')) :
        $request->request->add(['featured_banner' => $this->handleSingleFileUpload($request->feature_banner, 'uploads/category/')]);
      endif;

      $request->request->add(['category_slug' => $this->generateCategorySlug($request)]);

      ServiceCategory::find($id)->update($request->except('_method', '_token', 'category_icon', 'category_banner','second_catgory_banner', 'feature_banner', 'filter_ids'));
      $this->categoryFilterMap($request, $id);
    } catch (\Throwable $th) {
      dd($th);
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

  public function updateSort($request)
  {
    try {
      foreach ($request->id as $key => $id) :
        ServiceCategory::find((int)$id)->update(['sort' => $request->sort[$key]]);
      endforeach;
    } catch (\Throwable $th) {
      dd($th);
    }

    return true;
  }

  public function toggleStatus($id, $status)
  {
    return ServiceCategory::find($id)->update(['status' => $status]);
  }

  public function generateCategorySlug($request)
  {
    // dd((int)$request->parent_id);
    if (!isset($request->parent_id) || !(int)$request->parent_id) {
      return Str::slug($request->category_name, '-');
    } else {
      $parent = ServiceCategory::find($request->parent_id);
      // check if parent category has parent category if yes then get parent category of parent category and merge slug with parent category slug
      if (isset($parent->parent_id) && $parent->parent_id) {
        $mainParent = ServiceCategory::find($parent->parent_id);
        return Str::slug($mainParent->category_name, '-') . '-' .  Str::slug($parent->category_name, '-') . '-' . Str::slug($request->category_name, '-');
      }
      return Str::slug($parent->category_name, '-') . '-' . Str::slug($request->category_name, '-');
    }
  }
}
