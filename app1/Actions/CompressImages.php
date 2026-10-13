<?php

namespace App\Actions;

use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Models\Ecommerce\ProductImage;
use Illuminate\Support\Facades\Storage;
use Lorisleiva\Actions\Concerns\AsAction;

class CompressImages
{
  use AsAction, ApiResponser;

  public function handle(string $path, int $limit = null): JsonResponse
  {
    try {
      if (!File::exists(public_path() . '/uploads/' . $path . '/small/'))
        File::makeDirectory(public_path() . '/uploads/' . $path . '/small/', $mode = 0777, true, true);

      if (!File::exists(public_path() . '/uploads/' . $path . '/thumbnail/'))
        File::makeDirectory(public_path() . '/uploads/' . $path . '/thumbnail/', $mode = 0777, true, true);

      $images = ProductImage::where([['compressed_flag', '=', FALSE], ['not_found_flag', '=', FALSE]]);
      if (isset($images))
        $images = $images->limit($limit);

      $images = $images->get();

      foreach ($images as $image) {
        if (Storage::disk('public')->exists('/uploads/' . $path . '/' . $image->image)) {
          $img = Image::make(public_path() . '/uploads/' . $path . '/' . $image->image);
          $img->resize(500, 750)->save(public_path() . '/uploads/' . $path . '/small/' . $image->image);
          $img->resize(100, 150)->save(public_path() . '/uploads/' . $path . '/thumbnail/' . $image->image);
          $image->update(['compressed_flag' => TRUE]);
        } else {
          $image->update(['not_found_flag' => TRUE]);
        }
      }

      return $this->successResponse([], $images->count() . ' Images have been compressed and stored in their respective folders.');
    } catch (\Throwable $th) {
      return $this->errorResponse([], $th);
    }
  }
}
