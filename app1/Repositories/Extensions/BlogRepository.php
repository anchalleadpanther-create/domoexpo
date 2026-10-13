<?php

namespace App\Repositories\Extensions;

use Illuminate\Support\Str;
use App\Models\Extensions\Blog;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

class BlogRepository extends BaseRepository
{
  public function store($request)
  {
    try {
      $request->request->add(['slug' => Str::slug($request->name, '-')]);
      $request->request->add(['user_id' => Auth::user()->id]);
      $request->request->add(['short_desc' => Str::limit(strip_tags($request->content, 150))]);
      if ($request->hasfile('banner')) :
        $request->request->add(['image' => $this->handleSingleFileUpload($request->banner, 'uploads/blog/')]);
      endif;
      Blog::insert($request->except('_token', 'banner'));
    } catch (\Throwable $th) {
dd($th);
    }

    return true;
  }

  public function update($request, $id)
  {
    try {
      $request->request->add(['slug' => Str::slug($request->name, '-')]);
      $request->request->add(['user_id' => Auth::user()->id]);
      $request->request->add(['short_desc' => Str::limit(strip_tags($request->content, 150))]);
      if ($request->hasfile('banner')) :
        $request->request->add(['image' => $this->handleSingleFileUpload($request->banner, 'uploads/blog/')]);
      endif;
      Blog::find($id)->update($request->except('_method', '_token', 'banner'));
    } catch (\Throwable $th) {
      dd($th);
    }
    return true;
  }

  public function toggleStatus($id, $status)
  {
    return Blog::find($id)->update(['status' => $status]);
  }
}
