<?php

namespace App\Repositories\Extensions;

use Illuminate\Support\Str;
use App\Models\Extensions\BlogCategory;
use App\Repositories\BaseRepository;

class BlogCategoryRepository extends BaseRepository
{
  public function store($request)
  {
    try {
      if ($request->hasfile('category_icon')) :
        $request->request->add(['icon' => $this->handleSingleFileUpload($request->category_icon, 'uploads/blog-category/')]);
      endif;

      if ($request->hasfile('category_banner')) :
        $request->request->add(['banner' => $this->handleSingleFileUpload($request->category_banner, 'uploads/blog-category/')]);
      endif;

      $request->request->add(['category_slug' => Str::slug($request->category_name, '-')]);


      $category_id = BlogCategory::insertGetId($request->except('_token', 'category_icon', 'category_banner', 'filter_ids'));
    } catch (\Throwable $th) {
      dd($th);
    }

    return true;
  }

  public function update($request, $id)
  {
    try {
      if ($request->hasfile('category_icon')) :
        $request->request->add(['icon' => $this->handleSingleFileUpload($request->category_icon, 'uploads/blog-category/')]);
      endif;

      if ($request->hasfile('category_banner')) :
        $request->request->add(['banner' => $this->handleSingleFileUpload($request->category_banner, 'uploads/blog-category/')]);
      endif;

      $request->request->add(['category_slug' => Str::slug($request->category_name, '-')]);

      BlogCategory::find($id)->update($request->except('_method', '_token', 'category_icon', 'category_banner', 'filter_ids'));
    } catch (\Throwable $th) {
      dd($th);
    }

    return true;
  }

  public function toggleStatus($id, $status)
  {
    return BlogCategory::find($id)->update(['status' => $status]);
  }
}
