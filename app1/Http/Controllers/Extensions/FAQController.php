<?php

namespace App\Http\Controllers\Extensions;

use Illuminate\Http\Request;
use App\Models\Extensions\FAQ;
use App\Http\Controllers\Controller;
use App\Repositories\Extensions\FAQRepository;

class FAQController extends Controller
{
  public function __construct(FAQRepository $FAQRepository)
  {
    $this->FAQRepository = $FAQRepository;
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $faqs = FAQ::orderByDesc('id')->get();
    return view('extensions.faqs', compact('faqs'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('extensions.create-faq');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $response = $this->FAQRepository->store($request);
    return redirect()->route('admin.faq.index')->with('success', 'New faq has been added.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Extensions\FAQ  $fAQ
   * @return \Illuminate\Http\Response
   */
  public function show(FAQ $fAQ)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Extensions\FAQ  $fAQ
   * @return \Illuminate\Http\Response
   */
  public function edit(int $id)
  {
    $fAQ = FAQ::find($id);
    return view('extensions.create-faq', compact('fAQ'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Extensions\FAQ  $fAQ
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, int $id)
  {

    $response = $this->FAQRepository->update($request, $id);
    return redirect()->route('admin.faq.index')->with('success', 'FAQ has been successfully updated');
  }

  public function toggleStatus(int $id, int $status)
  {
    $this->FAQRepository->toggleStatus($id, $status);
    return back()->with('success', 'FAQ status has been changed.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Extensions\FAQ  $fAQ
   * @return \Illuminate\Http\Response
   */
  public function destroy(int $id)
  {
    FAQ::find($id)->delete();
    return back()->withErrors('FAQ has been deleted successfully.');
  }

}
