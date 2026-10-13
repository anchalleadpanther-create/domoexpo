<?php

namespace App\Repositories\Extensions;

use Illuminate\Support\Str;
use App\Models\Extensions\Page;
use App\Models\Extensions\Brand;
use App\Models\Extensions\Media;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

class MediaRepository extends BaseRepository
{
  public function store($request)
  {
    try {

      if ($request->hasfile('media')) :
        $request->request->add(['media_file' => $this->handleSingleFileUpload($request->media, 'uploads/media/')]);
      endif;
      $request->request->add(['user_id' => Auth::user()->id]);
      Media::insert($request->except('_token', 'media'));
    } catch (\Throwable $th) {
      dd($th);
    }

    return true;
  }

  public function update($request, $id)
  {
    try {
      if ($request->hasfile('media')) :
        $request->request->add(['media_file' => $this->handleSingleFileUpload($request->media, 'uploads/media/')]);
      endif;
      $request->request->add(['user_id' => Auth::user()->id]);
      Media::find($id)->update($request->except('_method','_token', 'media'));
    } catch (\Throwable $th) {
      dd($th);
    }
    return true;
  }

  public function toggleStatus($id, $status)
  {
    return Media::find($id)->update(['status' => $status]);
  }
}
