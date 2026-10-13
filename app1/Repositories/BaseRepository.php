<?php

namespace App\Repositories;

use App\Traits\FileUpload;

class BaseRepository
{
  use FileUpload;

  public function curDateTime()
  {
    return date('Y-m-d, H:i:s');
  }
}
