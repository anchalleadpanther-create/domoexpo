<?php

namespace App\Http\Controllers\Extensions;

use App\Models\Extensions\Blog;
use App\Http\Controllers\Controller;
use App\Http\Requests\Extensions\BlogRequest;
use App\Models\Extensions\BlogCategory;
use App\Repositories\Extensions\BlogRepository;

class BlogController extends Controller
{
  public function __construct(BlogRepository $BlogRepository)
  {
    $this->BlogRepository = $BlogRepository;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $blogs = Blog::orderByDesc('id')->paginate(100);
    return view('extensions.blogs', compact('blogs'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $categories = BlogCategory::orderBy('category_name')->where('status', 1)->get();
    return view('extensions.create-blog', compact('categories'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(BlogRequest $request)
  {
    $response = $this->BlogRepository->store($request);
    return redirect()->route('admin.blog.index')->with('success', 'New blog has been added.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Extensions\Blog  $blog
   * @return \Illuminate\Http\Response
   */
  public function show(Blog $blog)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Extensions\Blog  $blog
   * @return \Illuminate\Http\Response
   */
  public function edit(Blog $blog)
  {
    $categories = BlogCategory::orderBy('category_name')->where('status', 1)->get();
    return view('extensions.create-blog', compact('blog', 'categories'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Extensions\Blog  $blog
   * @return \Illuminate\Http\Response
   */
  public function update(BlogRequest $request, int $id)
  {
    $response = $this->BlogRepository->update($request, $id);
    return redirect()->route('admin.blog.index')->with('success', 'Blog has been successfully updated');
  }

  public function toggleStatus(int $id, int $status)
  {
    $this->BlogRepository->toggleStatus($id, $status);
    return back()->with('success', 'blog status has been changed.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Extensions\Blog  $blog
   * @return \Illuminate\Http\Response
   */
  public function destroy(Blog $blog)
  {
    Blog::find($blog->id)->delete();
    return back()->withErrors('blog has been deleted successfully.');
  }
}
