<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

trait FileUpload
{
  public function handleSingleFileUpload($file, $path): string
  {
    $urls =  $this->uploadInMultiplePath($path);
    $fileName = Str::random(30) . time() . '.' . $file->extension();
    $file->move($path, $fileName);
    // foreach($urls as $url){
    //   $file->move($url, $fileName);
    // }
    return $fileName;
  }

  public function handleMultiFileUpload($request, $key, $path, $limit = 50, bool $changeName = true): array
  {
    $filesNames = [];
    foreach ($request->{$key} as $key => $file) :
      if ($key < $limit) {
        $name = $changeName ? Str::random(30) . time() . '.' . $file->extension() : $file->getClientOriginalName();
        $file->move(public_path($path), $name);
        $filesNames[] = $name;
      }
    endforeach;
    return $filesNames;
  }

  public function handleDeleteFile($file, $path): bool
  {
    if (Storage::disk('appFiles')->exists("{$path}{$file}")) {
      return Storage::disk('appFiles')->delete("{$path}{$file}");
    }
    return false;
  }

  public function uploadInMultiplePath($path){
    $base_url = [
      'https://purchasync.com/',
      'https://seller.purchasync.com/',
    ];
    $urls = [];
    foreach($base_url as $url){
      $urls[] = $url.$path;
    }
    return $urls;
  }
}
