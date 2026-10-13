<?php

namespace App\Helpers;

class SEO
{
  private static string $title = 'Domo Expo';
  private static string $description = '';
  private static string $keywords = '';
  private static string $themeColor = '#f7e3e2';
  public static function tags(): object
  {
    return (object)[
      'title' => self::$title,
      'description' => self::$description,
      'keywords' => self::$keywords,
      'themeColor' => self::$themeColor,
    ];
  }
}
