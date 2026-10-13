<?php

namespace App\Repositories\Ecommerce;

use Illuminate\Support\Str;
use App\Models\Ecommerce\Product;
use App\Models\Ecommerce\Category;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use App\Models\Ecommerce\ProductType;
use App\Models\Ecommerce\ProductImage;
use App\Models\Ecommerce\ProductPrice;
use App\Models\Ecommerce\ProductMappedFilter;
use App\Models\Ecommerce\ProductMappedCategory;
use App\Models\Extensions\Brand;


class ProductRepository extends BaseRepository
{ 
  public function getProductDetails($product)
  {
    $pCategories = $pSubCategories = $pSubSubCategories = $lastCategoryId = null;
    $brands = [];
    $categories = Category::where([['status', '=', 1], ['parent_id', '=', 0]])->get();
 
    foreach ($product->mappedCategories as $mappedCategory) {
      if ($mappedCategory->parent_id === 0) {
        $brands = Category::where([['id', '=', $mappedCategory->id], ['status', '=', 1]])->with('mappedBrands')->first();
        $mainCategory = Category::find($mappedCategory->id);
        $pCategories = Category::where('parent_id', '=', 0)->get();
        $pSubCategories = Category::where([['status', '=', 1], ['parent_id', '=', $mainCategory->id]])->get();
        $pSubSubCategories = Category::where([['status', '=', 1]])->whereIn('parent_id', $pSubCategories->pluck('id')->toArray())->get();
      }
    }

    $deliveryOptions = explode(',', $product->delivery_options);

    $lastCategoryId = $product->mappedCategories->first()->id;

    $productTypes = ProductType::orderby('type')->whereIn('type', ['Color', 'Size'])->with('mappedProductTypeValues')->get();

    $pricing[] = $product;

    foreach ($product->variants as $variant)
      $pricing[] = $variant;

    return compact('categories', 'pCategories', 'pSubCategories', 'pSubSubCategories', 'deliveryOptions', 'brands', 'productTypes', 'pricing');
  }


  public function store($request)
  {
    try {
      // dd($request->type_value_id2[0]);
      $request->request->add(['slug' => Str::slug($request->name, '-')]);
      $request->request->add(['user_id' => Auth::user()->id]);
      $request->request->add(['short_desc' => Str::limit(strip_tags($request->description, 150))]);


      if (isset($request->product_gender))
        $request->request->add(['gender' => implode(',', $request->product_gender)]);


      if ($request->hasfile('specification_document_file'))
        $request->request->add(['specification_document' => $this->handleSingleFileUpload($request->specification_document_file, 'uploads/specification_document/')]);


      if (isset($request->product_gender))
        $request->request->add(['gender' => implode(',', $request->product_gender)]);

      if (isset($request->product_occasion))
        $request->request->add(['occasion' => implode(',', $request->product_occasion)]);

      if (is_array($request->delivery_option))
        $request->request->add(['delivery_options' => implode(",", $request->delivery_option)]);

      if (is_array($request->product_label))
        $request->request->add(['product_labels' => implode(",", $request->product_label)]);
        
    if (!empty($request->brand_id))
        $request->request->add(['brand_name' => Brand::where('id', $request->brand_id)->first()->brand_name]);

      $pData1 = $request->only(
        'user_id', 'name', 'slug', 'sku', 'barcode', 'product_condition', 'product_tag', 'brand_id','brand_name', 'seller_id', 'pay', 
        'partial', 'payment_method', 'payment_instruction_for_bank', 'description', 'warranty_terms', 
        'return_and_exchange_policy', 'warranty_period', 'closing_date', 'closing_time', 'weight', 'length', 
        'breadth', 'height', 'pickup_availability', 'delivery_options', 'short_desc', 'material', 'hsn_code', 
        'wash_care', 'gender', 'occasion', 'availability', 'youtube_url', 'warranty', 'meta_title', 
        'meta_description', 'meta_keywords', 'disclaimer', 'size_chart', 'vendor_delivery_date', 'return_conditions',
        'lead_time', 'moq', 'packaging_base_unit', 'packaging_unit', 'packaging_volume', 'selling_sold_by', 
        'selling_volume', 'country_of_origin', 'product_labels', 'specification_document', 'search_keywords', 
       'gst', 'gst_value', 'selling_unit', 'quantity', 'packing_type', 'type_value_id_3', 'type_value_id_2', 
        'type_value_id_1', 'is_customizable', 'rrp', 'discount', 'price_unit', 'return_policy', 
        'return_description', 'is_replacement', 'is_refund','product_specification'
    );

      $pData2 = [
          'type_value_id_1' => isset($request->type_value_id0[0]) ? (int) $request->type_value_id0[0] : null,
          'type_value_id_2' => isset($request->type_value_id1[0]) ? (int) $request->type_value_id1[0] : null,
          'type_value_id_3' => isset($request->type_value_id2[0]) ? (int) $request->type_value_id2[0] : null,
          'min_qty' => $request->min_qty[0] ?? null,
          'max_qty' => $request->max_qty[0] ?? null,
          'barcode' => $request->variant_barcode[0] ?? null,
          'unit' => $request->unit[0] ?? null,
          'rrp' => $request->rrp[0] ?? null,
          'discount' => $request->discount[0] ?? 0,
          'price_unit' => $request->price_unit[0] ?? null,
          'stock' => $request->stock[0] ?? null,
          'uuid' => (string) Str::uuid(),
      ];


      $pData3 = array_merge($pData1, $pData2);
      $product = Product::create($pData3);

      $this->makeVariants($request, $product->id);
      $this->productImageUpload($request);
      $this->mapProductFilter($request, $product->id);
      $this->mapProductCategories($request, $product->id);
      $this->makeSearchKeyword($request, $product);
    } catch (\Throwable $th) {
      dd($th->getLine(), $th->getMessage());
    }

    return true;
  }

  public function update($request, $product)
  {
    try {
      // dd($request->all());
      $request->request->add(['slug' => Str::slug($request->name, '-')]);
      $request->request->add(['user_id' => Auth::user()->id]);
      $request->request->add(['short_desc' => Str::limit(strip_tags($request->description, 150))]);


      if (isset($request->product_gender))
        $request->request->add(['gender' => implode(',', $request->product_gender)]);


      if ($request->hasfile('specification_document_file'))
        $request->request->add(['specification_document' => $this->handleSingleFileUpload($request->specification_document_file, 'uploads/specification_document/')]);


      if (isset($request->product_gender))
        $request->request->add(['gender' => implode(',', $request->product_gender)]);

      if (isset($request->product_occasion))
        $request->request->add(['occasion' => implode(',', $request->product_occasion)]);

      if (is_array($request->delivery_option))
        $request->request->add(['delivery_options' => implode(",", $request->delivery_option)]);

      if (is_array($request->product_label))
        $request->request->add(['product_labels' => implode(",", $request->product_label)]);

      $pData1 = $request->only(
        'user_id', 'name', 'slug', 'sku', 'barcode', 'product_condition', 'product_tag', 'brand_id', 'seller_id', 'pay', 
        'partial', 'payment_method', 'payment_instruction_for_bank', 'description', 'warranty_terms', 
        'return_and_exchange_policy', 'warranty_period', 'closing_date', 'closing_time', 'weight', 'length', 
        'breadth', 'height', 'pickup_availability', 'delivery_options', 'short_desc', 'material', 'hsn_code', 
        'wash_care', 'gender', 'occasion', 'availability', 'youtube_url', 'warranty', 'meta_title', 
        'meta_description', 'meta_keywords', 'disclaimer', 'size_chart', 'vendor_delivery_date', 'return_conditions',
        'lead_time', 'moq', 'packaging_base_unit', 'packaging_unit', 'packaging_volume', 'selling_sold_by', 
        'selling_volume', 'country_of_origin', 'product_labels', 'specification_document', 'search_keywords', 
         'gst','gst_value', 'selling_unit', 'quantity', 'packing_type', 'type_value_id_3', 'type_value_id_2', 
        'type_value_id_1', 'is_customizable', 'rrp', 'discount', 'price_unit', 'return_policy', 
        'return_description', 'is_replacement', 'is_refund','product_specification'
    );
      $pData2 = [
        'type_value_id_1' => (isset($request->type_value_id0[0])) ? (int)$request->type_value_id0[0] : null,
        'type_value_id_2' => (isset($request->type_value_id1[0])) ? (int)$request->type_value_id1[0] : null,
        'type_value_id_3' => (isset($request->type_value_id2[0])) ? (int)$request->type_value_id2[0] : null,
        'min_qty' => (isset($request->min_qty[0])) ? $request->min_qty[0] : null,
        'max_qty' => (isset($request->max_qty[0])) ? $request->max_qty[0] : null,
        'barcode' => (isset($request->variant_barcode[0])) ? $request->variant_barcode[0] : null,
        'unit' => (isset($request->unit[0])) ? $request->unit[0] : null,
        'rrp' => (isset($request->rrp[0])) ? $request->rrp[0] : null,
        'discount' => (isset($request->discount[0])) ? $request->discount[0] : 0,
        'price_unit' => (isset($request->price_unit[0])) ? $request->price_unit[0] : null,
        'stock' => (isset($request->stock[0])) ? $request->stock[0] : null,
      ];

      $pData3 = array_merge($pData1, $pData2);
      $product->update($pData3);


      $this->makeUpdatedVariants($request, $product->id);
      $this->productImageUpload($request);
      $this->mapProductFilter($request, $product->id);
      // $this->mapProductCategories($request, $product->id);
      $this->makeSearchKeyword($request, $product);

      // dd($request->all(), $pData3, $product);

    } catch (\Throwable $th) {
      dd($th);
    }
  }

  function makeVariants($request, $productId)
  {
    foreach ($request->rrp as $key => $value) {
      $newProduct = [
        'parent_id' => ($key != 0) ? $productId : 0,
        'type_value_id_1' => isset($request->type_value_id0[0]) ? (int) $request->type_value_id0[0] : null,
        'type_value_id_2' => isset($request->type_value_id1[0]) ? (int) $request->type_value_id1[0] : null,
        'type_value_id_3' => isset($request->type_value_id2[0]) ? (int) $request->type_value_id2[0] : null,
        'min_qty' => (isset($request->min_qty[$key])) ? $request->min_qty[$key] : null,
        'max_qty' => (isset($request->max_qty[$key])) ? $request->max_qty[$key] : null,
        'sku' => $request->sku,
        'barcode' => $request->barcode,
        'unit' => (isset($request->unit[$key])) ? $request->unit[$key] : null,
        'rrp' => $value,
        'discount' => (isset($request->discount[$key])) ? $request->discount[$key] : 0,
        'price_unit' => (isset($request->price_unit[$key])) ? $request->price_unit[$key] : null,
        'stock' => (isset($request->stock[$key])) ? $request->stock[$key] : null,
        'uuid' => (string) Str::uuid(),
      ];

      $oldProduct = $request->only('user_id', 'seller_id', 'parent_id', 'name', 'slug', 'sku', 'barcode', 'product_condition', 'variant_type', 'have_options', 'brand_id', 'pay', 'partial', 'payment_method', 'payment_instruction_for_bank', 'description', 'warranty_terms', 'return_and_exchange_policy', 'warranty_period', 'closing_date', 'closing_time', 'weight', 'length', 'breadth', 'height', 'pickup_availability', 'delivery_options', 'short_desc', 'material', 'gst', 'hsn_code', 'wash_care', 'gender', 'occasion', 'availability', 'youtube_url', 'warranty', 'meta_title', 'meta_description', 'meta_keywords', 'disclaimer', 'size_chart', 'vendor_delivery_date');
      
      
      $newProductVariant = array_merge($oldProduct, $newProduct);
      if ($key > 0) {
        $product = Product::create($newProductVariant);
        $this->mapProductCategories($request, $product->id);
        $this->makeSearchKeyword($request, $product);
      }
    }
  }

  function makeUpdatedVariants($request, $productId)
  {
    if (empty($request->price_id)) {
      Product::where('parent_id', '=', $productId)
        ->delete();
    } else {
      Product::where('parent_id', '=', $productId)
        ->whereNotIn('id', $request->price_id)
        ->delete();
    }

    foreach ($request->rrp as $key => $value) {
      $newProduct = [
        'parent_id' => ($key !== 0) ? $productId : 0,
        'type_value_id_1' => (isset($request->type_value_id0[$key])) ? (int)$request->type_value_id0[$key] : null,
        'type_value_id_2' => (isset($request->type_value_id1[$key])) ? (int)$request->type_value_id1[$key] : null,
        'min_qty' => (isset($request->min_qty[$key])) ? $request->min_qty[$key] : null,
        'max_qty' => (isset($request->max_qty[$key])) ? $request->max_qty[$key] : null,
        'sku' => $request->sku,
        'barcode' => $request->barcode,
        'unit' => (isset($request->unit[$key])) ? $request->unit[$key] : null,
        'rrp' => $value,
        'discount' => (isset($request->discount[$key])) ? $request->discount[$key] : 0,
        'price_unit' => (isset($request->price_unit[$key])) ? $request->price_unit[$key] : null,
        'stock' => (isset($request->stock[$key])) ? $request->stock[$key] : null,
        'uuid' => (!isset($request->uuid[$key])) ? (string) Str::uuid() :  $request->uuid[$key],
      ];

      $oldProduct = $request->only('user_id', 'seller_id', 'name', 'slug', 'sku', 'barcode', 'product_condition', 'variant_type', 'have_options', 'brand_id', 'pay', 'partial', 'payment_method', 'payment_instruction_for_bank', 'description', 'warranty_terms', 'return_and_exchange_policy', 'warranty_period', 'closing_date', 'closing_time', 'weight', 'length', 'breadth', 'height', 'pickup_availability', 'delivery_options', 'short_desc', 'material', 'gst', 'hsn_code', 'wash_care', 'gender', 'occasion', 'availability', 'youtube_url', 'warranty', 'meta_title', 'meta_description', 'meta_keywords', 'disclaimer', 'size_chart', 'vendor_delivery_date');
      $newProductVariant = array_merge($oldProduct, $newProduct);
      if (isset($request->price_id[$key])) {
        // dd($newProductVariant, Product::find($request->price_id[$key]));
        Product::find($request->price_id[$key])->update($newProductVariant);
        $product = Product::find($request->price_id[$key]);
        // $this->mapProductCategories($request, Product::find($request->price_id[$key])->id);
        $this->makeSearchKeyword($request, $product);
      } else {
        if ($key > 0) {
          $product = Product::create($newProductVariant);
          // $this->mapProductCategories($request, $product->id);
          $this->makeSearchKeyword($request, $product);
        }
      }
    }
  }

  public function productImageUpload($request)
  {
    if ($request->hasfile('product_images')) {
      $images = $this->handleMultiFileUpload($request, 'product_images', 'uploads/products', 6);
      $imageData = [];
      $productIds = Product::where('sku', '=', $request->sku)->pluck('id')->toArray();
      foreach ($productIds as $productId) {
        foreach ($images as $image) {
          $imageData[] = [
            'product_id' => $productId,
            'image' => $image
          ];
        }
      }
      ProductImage::insert($imageData);
    } else {
      $imageData = [];
      $productIds = Product::where('sku', '=', $request->sku)->pluck('id')->toArray();
      $productImages = Product::where('sku', '=', $request->sku)->first()->images;

      foreach ($productIds as $productId) {
        ProductImage::where('product_id', '=', $productId)->delete();
        foreach ($productImages as $image) {
          $imageData[] = [
            'product_id' => $productId,
            'image' => $image->image,
            'sort' => $image->sort
          ];
        }
      }

      ProductImage::insert($imageData);
    }
  }

  public function mapProductFilter($request, $productId)
  {
    ProductMappedFilter::where('product_id', '=', $productId)->delete();
    if (is_array($request->filters)) :
      foreach ($request->filters as $value) {
        $filterData[] = [
          'product_id' => $productId,
          'filter_value_id' => $value,
        ];
      }
      ProductMappedFilter::insert($filterData);
    endif;
  }

  public function mapProductPrices($request, $productId)
  {
    if (is_array($request->variant_sku)) :
      foreach ($request->variant_sku as $key => $value) {
        $priceData = [
          'product_id' => $productId,
          'type_value_id_1' => (isset($request->type_value_id0[$key])) ? (int)$request->type_value_id0[$key] : null,
          'type_value_id_2' => (isset($request->type_value_id1[$key])) ? (int)$request->type_value_id1[$key] : null,
          'min_qty' => (isset($request->min_qty[$key])) ? $request->min_qty[$key] : null,
          'max_qty' => (isset($request->max_qty[$key])) ? $request->max_qty[$key] : null,
          'sku' => $value,
          'barcode' => (isset($request->variant_barcode[$key])) ? $request->variant_barcode[$key] : null,
          'unit' => (isset($request->unit[$key])) ? $request->unit[$key] : null,
          'rrp' => (isset($request->rrp[$key])) ? $request->rrp[$key] : null,
          'discount' => (isset($request->discount[$key])) ? $request->discount[$key] : 0,
          'price_unit' => (isset($request->price_unit[$key])) ? $request->price_unit[$key] : null,
          'stock' => (isset($request->stock[$key])) ? $request->stock[$key] : null,
        ];
        ProductPrice::insertGetId($priceData);
      }
    endif;
  }

  public function mapUpdatedProductPrices($request, $productId)
  {
    if (empty($request->price_id)) {
      ProductPrice::where('product_id', '=', $productId)
        ->delete();
      // dd('empty', $request->price_id);
    } else {
      ProductPrice::where('product_id', '=', $productId)
        ->whereNotIn('id', $request->price_id)
        ->delete();
      // dd('not empty', $request->price_id, $request->all());

    }
    if (is_array($request->variant_sku)) :
      foreach ($request->variant_sku as $key => $value) {
        $priceData = [
          'product_id' => $productId,
          'type_value_id_1' => (isset($request->type_value_id0[$key])) ? (int)$request->type_value_id0[$key] : null,
          'type_value_id_2' => (isset($request->type_value_id1[$key])) ? (int)$request->type_value_id1[$key] : null,
          'min_qty' => (isset($request->min_qty[$key])) ? $request->min_qty[$key] : null,
          'max_qty' => (isset($request->max_qty[$key])) ? $request->max_qty[$key] : null,
          'sku' => $value,
          'barcode' => (isset($request->variant_barcode[$key])) ? $request->variant_barcode[$key] : null,
          'unit' => (isset($request->unit[$key])) ? $request->unit[$key] : null,
          'rrp' => (isset($request->rrp[$key])) ? $request->rrp[$key] : null,
          'discount' => (isset($request->discount[$key])) ? $request->discount[$key] : 0,
          'price_unit' => (isset($request->price_unit[$key])) ? $request->price_unit[$key] : null,
          'stock' => (isset($request->stock[$key])) ? $request->stock[$key] : null,
        ];

        if (isset($request->price_id[$key])) {
          ProductPrice::find($request->price_id[$key])->update($priceData);
        } else {
          ProductPrice::create($priceData);
        }
      }
    endif;
  }

  function updateVariantDetails($request, $id, $type)
  {
    // dd($request->all());
    try {

      if ($type === 'wholesale') {
        $productPrice = ProductPrice::find($id);
        ProductPrice::find($id)->update($request->except('_token', '_method', 'product_images'));
      } else {
        $productPrice = Product::find($id);
        Product::find($id)->update($request->except('_token', '_method', 'product_images'));
      }


      if ($request->hasfile('product_images')) {
        $images = $this->handleMultiFileUpload($request, 'product_images', 'uploads/products', 6);
        $imageData = [];
        foreach ($images as $image) {
          $imageData[] = [
            'product_id' => $productPrice->id,
            'image' => $image
          ];
        }
        ProductImage::insert($imageData);
      }
    } catch (\Throwable $th) {
      dd($th);
    }
  }


  public function mapProductcategories($request, $productId)
  {
    ProductMappedCategory::where('product_id', '=', $productId)->delete();
    if (is_array($request->category)) :
      foreach ($request->category as $value) {
        if (isset($value)) {
          $categoryData[] = [
            'product_id' => $productId,
            'category_id' => $value,
          ];
        }
      }
      ProductMappedCategory::insert($categoryData);
    endif;
  }

  public function toggleStatus($id, $status)
  {
    Product::whereIn('sku', Product::where('id', '=', $id)->pluck('sku')->toArray())->update(['status' => $status]);
  }

  public function makeSearchKeyword($request, $product)
  {
    return $product->update([
      'front_end_search_keyword' => $request->name . ' ' . $request->sku
    ]);
  }

  public function updateImageSort($request)
  {
    try {
      ProductImage::where('image', '=', $request->imageName)->update(['sort' => $request->sort]);
    } catch (\Throwable $th) {
      dd($th);
    }
    return true;
  }
}
