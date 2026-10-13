<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageTestimonial extends Model
{
  use HasFactory;

  protected $fillable = ['*'];

  protected $appends = ['PatientPhotoWithPath'];

  public function getPatientPhotoWithPathAttribute()
  {
    $path = asset('/medical/public');
    return "{$path}/uploads/sliders/{$this->patient_photo}";
  }
}
