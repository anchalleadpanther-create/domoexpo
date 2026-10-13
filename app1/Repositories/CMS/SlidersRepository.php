<?php

namespace App\Repositories\CMS;

use App\Models\Cms\HomeSlider;
use App\Repositories\BaseRepository;
use App\Models\Cms\HomePageTestimonial;

class SlidersRepository extends BaseRepository
{
  public function storeHomeSlider($request)
  {
    if ($request->hasfile('slider_img')) :
      $request->request->add(['slider_image' => $this->handleSingleFileUpload($request->slider_img, 'uploads/sliders/')]);
    endif;

    if ($request->hasfile('second_slider_img')) :
      $request->request->add(['second_slider_image' => $this->handleSingleFileUpload($request->second_slider_img, 'uploads/sliders/')]);
    endif;

    return HomeSlider::insert($request->except('_token', 'slider_img', 'second_slider_img'));
  }

  public function updateHomeSlider($request, $id)
  {
    if ($request->hasfile('slider_img')) :
      $request->request->add(['slider_image' => $this->handleSingleFileUpload($request->slider_img, 'uploads/sliders/')]);
    endif;

    if ($request->hasfile('second_slider_img')) :
      $request->request->add(['second_slider_image' => $this->handleSingleFileUpload($request->second_slider_img, 'uploads/sliders/')]);
    endif;

    if (!isset($request->status)) {
      $request->request->add(['status' => 0]);
    }

    return HomeSlider::where('id', '=', (int) $id)->update($request->except('_token', '_method', 'slider_img', 'second_slider_img'));
  }

  public function updateHomeSliderSorting($request)
  {
    foreach ($request->id as $id) {
      HomeSlider::where('id', '=', (int) $id)->update(['sort' => (int) $request->sort[$id]]);
    }

    return true;
  }

  public function storeHomeTestimonial($request)
  {
    if ($request->hasfile('slider_img')) :

      $request->request->add(['patient_photo' => $this->handleSingleFileUpload($request->slider_img, 'uploads/sliders/')]);

    endif;

    return HomePageTestimonial::insert($request->except('_token', 'slider_img'));
  }

  public function updateHomeTestimonial($request, $id)
  {
    if ($request->hasfile('slider_img')) :

      $request->request->add(['patient_photo' => $this->handleSingleFileUpload($request->slider_img, 'uploads/sliders/')]);

    endif;

    if (!isset($request->status)) {
      $request->request->add(['status' => 0]);
    }

    return HomePageTestimonial::where('id', '=', (int)$id)->update($request->except('_token', '_method', 'slider_img'));
  }

  public function updateHomeTestimonialSorting($request)
  {
    foreach ($request->id as $id) {
      HomePageTestimonial::where('id', '=', (int)$id)->update(['sort' => (int)$request->sort[$id]]);
    }

    return true;
  }
}
