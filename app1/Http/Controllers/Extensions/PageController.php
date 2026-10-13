<?php

namespace App\Http\Controllers\Extensions;

use Illuminate\Http\Request;
use App\Models\Extensions\Page;
use App\Http\Controllers\Controller;
use App\Http\Requests\Extensions\PageRequest;
use App\Repositories\Extensions\PageRepository;

class PageController extends Controller
{
  public function __construct(PageRepository $PageRepository)
  {
    $this->PageRepository = $PageRepository;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $pages = Page::orderByDesc('id')->get();
    return view('extensions.pages', compact('pages'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('extensions.create-page');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(PageRequest $request)
  {
    $response = $this->PageRepository->store($request);
    return redirect()->route('admin.page.index')->with('success', 'New page has been added.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Extensions\Page  $page
   * @return \Illuminate\Http\Response
   */
  public function show(Page $page)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Extensions\Page  $page
   * @return \Illuminate\Http\Response
   */
  public function edit(Page $page)
  {
    return view('extensions.create-page', compact('page'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Extensions\Page  $page
   * @return \Illuminate\Http\Response
   */
  public function update(PageRequest $request, int $id)
  {
    $response = $this->PageRepository->update($request, $id);
    return redirect()->route('admin.page.index')->with('success', 'Page has been successfully updated');
  }

  public function toggleStatus(int $id, int $status)
  {
    $this->PageRepository->toggleStatus($id, $status);
    return back()->with('success', 'Page status has been changed.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Extensions\Page  $page
   * @return \Illuminate\Http\Response
   */
  public function destroy(Page $page)
  {
    Page::find($page->id)->delete();
    return back()->withErrors('Page has been deleted successfully.');
  }
}
