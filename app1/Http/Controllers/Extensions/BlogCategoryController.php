<?php

namespace App\Http\Controllers\Extensions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Extensions\BlogCategory;
use App\Repositories\Extensions\BlogCategoryRepository;

class BlogCategoryController extends Controller
{
  public function __construct(BlogCategoryRepository $BlogCategoryRepository)
  {
    $this->BlogCategoryRepository = $BlogCategoryRepository;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $categories = BlogCategory::orderBy('category_name')->get();
    return view('extensions.blog-categories', compact('categories'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('extensions.create-blog-category');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->BlogCategoryRepository->store($request);
    return redirect()->route('admin.blog-category.index')->with('success', 'New blog category has been added.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Extensions\BlogCategory  $blogCategory
   * @return \Illuminate\Http\Response
   */
  public function show(BlogCategory $blogCategory)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Extensions\BlogCategory  $blogCategory
   * @return \Illuminate\Http\Response
   */
  public function edit(BlogCategory $blogCategory)
  {
    return view('extensions.create-blog-category', compact('blogCategory'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Extensions\BlogCategory  $blogCategory
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, int $id)
  {
    $response = $this->BlogCategoryRepository->update($request, $id);
    return redirect()->route('admin.blog-category.index')->with('success', 'Blog category has been successfully updated');
  }

  public function toggleStatus(int $id, int $status)
  {
    $this->BlogCategoryRepository->toggleStatus($id, $status);
    return back()->with('success', 'Blog category status has been changed.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Extensions\BlogCategory  $blogCategory
   * @return \Illuminate\Http\Response
   */
  public function destroy(int $id)
  {
    BlogCategory::find($id)->delete();
    return back()->withErrors('Blog category has been deleted successfully.');
  }
}
