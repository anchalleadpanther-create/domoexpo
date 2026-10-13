<?php

namespace App\Http\Controllers\Customer;

use App\Models\Extensions\FAQ;
use App\Http\Controllers\Controller;

class FAQController extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke()
  {
    $faqs = FAQ::where('status', '=', 1)->orderByDesc('id')->get();
    return view('customer.faq', compact('faqs'));
  }
}
