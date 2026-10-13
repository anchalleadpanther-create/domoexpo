<?php

namespace App\Repositories\CMS;

use App\Models\Cms\Banner;
use App\Repositories\BaseRepository;

class BannersRepository extends BaseRepository
{
  public function store($request)
  {
    try {
      if ($request->hasfile('banner_img_one')) :
        $request->request->add(['image_one' => $this->handleSingleFileUpload($request->banner_img_one, 'uploads/banners/')]);
      endif;
      if ($request->hasfile('banner_img_two')) :
        $request->request->add(['image_two' => $this->handleSingleFileUpload($request->banner_img_two, 'uploads/banners/')]);
      endif;
      if ($request->hasfile('banner_img_three')) :
        $request->request->add(['image_three' => $this->handleSingleFileUpload($request->banner_img_three, 'uploads/banners/')]);
      endif;
      if ($request->hasfile('banner_img_four')) :
        $request->request->add(['image_four' => $this->handleSingleFileUpload($request->banner_img_four, 'uploads/banners/')]);
      endif;
      Banner::insert($request->except('_token', 'banner_img_one', 'banner_img_two', 'banner_img_three', 'banner_img_four'));
    } catch (\Throwable $th) {
      dd($th);
    }

    return true;
  }

  public function update($request, $id)
  {
    try {
      if ($request->hasfile('banner_img_one')) :
        $request->request->add(['image_one' => $this->handleSingleFileUpload($request->banner_img_one, 'uploads/banners/')]);
      endif;
      if ($request->hasfile('banner_img_two')) :
        $request->request->add(['image_two' => $this->handleSingleFileUpload($request->banner_img_two, 'uploads/banners/')]);
      endif;
      if ($request->hasfile('banner_img_three')) :
        $request->request->add(['image_three' => $this->handleSingleFileUpload($request->banner_img_three, 'uploads/banners/')]);
      endif;
      if ($request->hasfile('banner_img_four')) :
        $request->request->add(['image_four' => $this->handleSingleFileUpload($request->banner_img_four, 'uploads/banners/')]);
      endif;

      Banner::find($id)->update($request->except('_method', '_token', 'banner_img_one', 'banner_img_two', 'banner_img_three', 'banner_img_four'));
    } catch (\Throwable $th) {
      dd($th);
    }
    return true;
  }
}
