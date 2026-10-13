<?php

namespace App\Http\Controllers\Extensions;

use Illuminate\Http\Request;
use App\Models\Extensions\Filter;
use App\Models\Extensions\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Extensions\CategoryRequest;
use App\Repositories\Extensions\CategoryRepository;

class CategoryController extends Controller
{

  public function __construct(CategoryRepository $CategoryRepository)
  {
    $this->CategoryRepository = $CategoryRepository;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index($parent_id = 0)
  {
    $categories = Category::orderByDesc('id')->where('parent_id', $parent_id)->get();
    return view('extensions.categories', compact('categories'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create($parent_id = 0)
  {
    $filters = Filter::orderByDesc('id')->where('status', '=', 1)->get();
    return view('extensions.create-category', compact('parent_id', 'filters'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CategoryRequest $request)
  {
    $response = $this->CategoryRepository->store($request);
    return redirect()->route('admin.category.index', ['parent_id' => $request->parent_id])->with('success', 'New category has been added.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Extensions\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function show(Category $category)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Extensions\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function edit(Category $category)
  {
    $filters = Filter::orderByDesc('id')->where('status', '=', 1)->get();
    // dd($category->mappedFilters[0]->id);
    return view('extensions.create-category', compact('category', 'filters'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Extensions\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $response = $this->CategoryRepository->update($request, $id);
    return redirect()->route('admin.category.index', ['parent_id' => 0])->with('success', 'Category has been successfully updated');
  }

  public function toggleStatus(int $id, int $status)
  {
    $this->CategoryRepository->toggleStatus($id, $status);
    return back()->with('success', 'Category status has been changed.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Extensions\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function destroy(Category $category)
  {
    Category::where('parent_id', '=', $category->id)->delete();
    Category::find($category->id)->delete();
    return back()->withErrors('Category has been deleted successfully.');
  }
}
