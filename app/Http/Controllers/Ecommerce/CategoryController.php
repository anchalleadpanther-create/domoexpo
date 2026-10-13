<?php

namespace App\Http\Controllers\Ecommerce;

use Illuminate\Http\Request;
use App\Models\Ecommerce\Filter;
use App\Models\Ecommerce\Product;
use App\Models\Ecommerce\Category;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ExcelFileRequest;
use App\Models\Ecommerce\ProductCategory;
use App\Models\Ecommerce\ProductMappedCategory;
use App\Models\Ecommerce\RelatedCategoryMapped;
use App\Exports\Products\CategoryProductsExport;
use App\Http\Requests\Ecommerce\CategoryRequest;
use App\Repositories\Ecommerce\CategoryRepository;
use App\Imports\Admin\Products\CategoryProductsImport;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

  
  use App\Imports\CategoryImport;

class CategoryController extends Controller
{

  public function __construct(public CategoryRepository $CategoryRepository)
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
      $categories = Category::orderBy('sort')->where('parent_id', $parent_id)->get();
    else
      $categories = Category::orderBy('sort')->where('category_name', 'LIKE', '%'. request()->search .'%')->get();

    $category = Category::find($parent_id);
    return view('ecommerce.categories.index', compact('categories', 'category'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create($parent_id = 0)
  {
    $filters = Filter::orderByDesc('id')->where('status', '=', 1)->get();
    return view('ecommerce.categories.create', compact('parent_id', 'filters'));
  }
  
  

    
    public function importCategories()
    {
        // dd(2);
        // Excel::import(new CategoryImport, public_path('DOMOallcategories.xlsx'));
        // Excel::import(new CategoryImport, public_path('extracategories.xlsx'));
        Excel::import(new CategoryImport, public_path('MISSING_CATEGORIES_EXPANSION.xlsx'));
        
        
    
        return "Categories Imported Successfully!";
    }

  public function mapProductCategory()
  {
    $categories = Category::where([['status', '=', 1], ['parent_id', '=', 0]])->orderBy('category_name')->get();
    return view('ecommerce.map-product-category', compact('categories'));
  }

  public function saveProductCategory(Request $request)
  {
    $productIds = Product::where('sku', '=', $request->sku)->pluck('id')->toArray();
    $categoryArray = [];
    foreach ($request->category as $categoryId) {
      foreach ($productIds as $productId) {
        if (ProductCategory::where([
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
    ProductCategory::insert($categoryArray);
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
    $categories = Category::where([['status', '=', 1], ['parent_id', '=', 0]])->orderBy('category_name')->get();
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
    return view('ecommerce.categories.create', compact('category', 'filters'));
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
    return redirect()->route('admin.category.index', ['parent_id' => $request->parent_id])->with('success', 'Category has been successfully updated');
  }

  public function toggleStatus(int $id, int $status)
  {
    $this->CategoryRepository->toggleStatus($id, $status);
    return back()->with('success', 'Category status has been changed.');
  }

  public function updateSorts(Request $request)
  {
    $this->CategoryRepository->updateSort($request);
    return back()->with('success', 'Category sorts have been updated.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Extensions\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function destroy(Category $category)
  {
    //   dd('category');
    Category::where('parent_id', '=', $category->id)->delete();
    Category::find($category->id)->delete();
    return back()->withErrors('Category has been deleted successfully.');
  }

  public function exportProducts(int $categoryId): BinaryFileResponse
  {
    try {
      $mappedCategories = ProductMappedCategory::where('category_id', '=', $categoryId)->with('product', 'category')->get();
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
