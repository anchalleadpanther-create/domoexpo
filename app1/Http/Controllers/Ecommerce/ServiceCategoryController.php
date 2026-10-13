<?php

namespace App\Http\Controllers\Ecommerce;

use Illuminate\Http\Request;
use App\Models\Ecommerce\Filter;
use App\Models\Ecommerce\Product;
// use App\Models\Ecommerce\Category;
use App\Models\Ecommerce\ServiceCategory;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ExcelFileRequest;
use App\Models\Ecommerce\ProductCategory;
use App\Models\Ecommerce\ProductMappedCategory;
use App\Models\Ecommerce\RelatedCategoryMapped;
use App\Exports\Products\CategoryProductsExport;
use App\Http\Requests\Ecommerce\CategoryRequest;
use App\Repositories\Ecommerce\ServiceCategoryRepository;
use App\Imports\Admin\Products\CategoryProductsImport;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ServiceCategoryController extends Controller
{

  public function __construct(public ServiceCategoryRepository $ServiceCategoryRepository)
  {
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(int $parent_id = 0)
  {
    if (!isset(request()->search))
      $categories = ServiceCategory::orderBy('sort')->where('parent_id', $parent_id)->get();
    else
      $categories = ServiceCategory::orderBy('sort')->where('category_name', '=', request()->search)->get();

    $category = ServiceCategory::find($parent_id);
    return view('ecommerce.service-categories.index', compact('categories', 'category'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create($parent_id = 0)
  {
    $filters = Filter::orderByDesc('id')->where('status', '=', 1)->get();
    return view('ecommerce.service-categories.create', compact('parent_id', 'filters'));
  }

  public function mapProductCategory()
  {
    $categories = ServiceCategory::where([['status', '=', 1], ['parent_id', '=', 0]])->orderBy('category_name')->get();
    return view('ecommerce.map-product-category', compact('categories'));
  }

  public function saveProductCategory(Request $request)
  {
    $productIds = Product::where('sku', '=', $request->sku)->pluck('id')->toArray();
    $categoryArray = [];
    foreach ($request->category as $categoryId) {
      foreach ($productIds as $productId) {
        if (ProductServiceCategory::where([
          [
            'product_id', '=', $productId,
          ],
          [
            'category_id', '=', (int)$categoryId
          ]
        ])->doesntExist() && $categoryId > 0) {
          $categoryArray[] =  [
            'product_id' => $productId,
            'category_id' => (int)$categoryId,
            'is_extra_cat' => isset($request->is_extra_cat) ? 1 : 0,
          ];
        }
      }
    }
    ProductServiceCategory::insert($categoryArray);
    return back()->with('success', 'Category has been successfully mapped');
  }

  public function mapRelatedCategoryList()
  {
    $mapped_categories = RelatedCategoryMapped::get();
    return view('ecommerce.map-related-category-list', compact('mapped_categories'));
  }

  public function deleteMappedRelatedCategory(Request $request)
  {
    $mapped_category = RelatedCategoryMapped::where('id',$request->id)->first();
    $mapped_category->delete();
    return back()->with('success', 'Category has been successfully deleted');
  }

  

 public function mapRelatedCategory()
  {
    $categories = ServiceCategory::where([['status', '=', 1], ['parent_id', '=', 0]])->orderBy('category_name')->get();
    return view('ecommerce.map-related-category', compact('categories'));
  }
  public function saveMapRelatedCategory(Request $request){
     $category_a_last_key = count($request->category_a) - 1;
     $category_b_last_key = count($request->category_b) - 1;
    $category_a =  $request->category_a[$category_a_last_key];
    $category_b =  $request->category_b[$category_b_last_key];
    
    $categoryArray = [['category_a'=>$category_a,'category_b'=>$category_b]];
    
    RelatedCategoryMapped::insert($categoryArray);
    return back()->with('success', 'Category has been successfully mapped');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CategoryRequest $request)
  {
    $response = $this->ServiceCategoryRepository->store($request);
    return redirect()->route('admin.service-category.index', ['parent_id' => $request->parent_id])->with('success', 'New category has been added.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Extensions\ServiceCategory  $category
   * @return \Illuminate\Http\Response
   */
  public function show(ServiceCategory $serviceCategory)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Extensions\ServiceCategory  $category
   * @return \Illuminate\Http\Response
   */
  public function edit(ServiceCategory $serviceCategory)
  {
    $filters = Filter::orderByDesc('id')->where('status', '=', 1)->get();
    // dd($category->mappedFilters[0]->id);
    return view('ecommerce.service-categories.create', compact('serviceCategory', 'filters'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Extensions\ServiceCategory  $category
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $response = $this->ServiceCategoryRepository->update($request, $id);
    return redirect()->route('admin.service-category.index', ['parent_id' => $request->parent_id])->with('success', 'Category has been successfully updated');
  }

  public function toggleStatus(int $id, int $status)
  {
    $this->ServiceCategoryRepository->toggleStatus($id, $status);
    return back()->with('success', 'Category status has been changed.');
  }

  public function updateSorts(Request $request)
  {
    $this->ServiceCategoryRepository->updateSort($request);
    return back()->with('success', 'Category sorts have been updated.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Extensions\ServiceCategory  $category
   * @return \Illuminate\Http\Response
   */
  public function destroy(ServiceCategory $serviceCategory)
  {
    //  dd($serviceCategory);
    ServiceCategory::where('parent_id', '=', $serviceCategory->id)?->delete();
    ServiceCategory::find($serviceCategory->id)?->delete();
    return back()->withErrors('Category has been deleted successfully.');
  }

  public function exportProducts(int $categoryId): BinaryFileResponse
  {
    try {
      $mappedCategories = ProductMappedServiceCategory::where('category_id', '=', $categoryId)->with('product', 'category')->get();
      return Excel::download(new CategoryProductsExport($mappedCategories), 'category-products.xlsx');
    } catch (\Throwable $th) {
      dd($th->getMessage(), $th);
      return back()->withErrors($th->getMessage());
    }
  }

  public function importProducts(ExcelFileRequest $request): RedirectResponse
  {
    try {
      Excel::import(new CategoryProductsImport,  $request->excelSheet);
      return back()->with('success', 'Product sorts have been updated.');
    } catch (\Throwable $th) {
      dd($th->getMessage(), $th);
      return back()->withErrors($th->getMessage());
    }
  }
}
