<?php

namespace App\Repositories\Extensions;

use Illuminate\Support\Str;
use App\Models\Extensions\Page;
use App\Models\Extensions\Brand;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

class PageRepository extends BaseRepository
{
  public function store($request)
  {
    try {
      $request->request->add(['slug' => Str::slug($request->name, '-')]);
      $request->request->add(['user_id' => Auth::user()->id]);
      if ($request->hasfile('banner')) :
        $request->request->add(['image' => $this->handleSingleFileUpload($request->banner, 'uploads/page/')]);
      endif;
      Page::insert($request->except('_token', 'banner'));
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
      if ($request->hasfile('banner')) :
        $request->request->add(['image' => $this->handleSingleFileUpload($request->banner, 'uploads/page/')]);
      endif;
      Page::find($id)->update($request->except('_method', '_token', 'banner'));
    } catch (\Throwable $th) {
      dd($th);
    }
    return true;
  }

  public function toggleStatus($id, $status)
  {
    // dd($id, $status);
    return Page::find($id)->update(['status' => $status]);
  }
}
