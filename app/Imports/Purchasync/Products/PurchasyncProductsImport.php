<?php

namespace App\Imports\Purchasync\Products;

use App\Models\ParentUser;
use App\Models\Child;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;


use Illuminate\Support\Str;
use App\Models\Ecommerce\Brand;
use App\Models\Ecommerce\Product;
use App\Models\Supplier\Supplier;
use App\Models\Ecommerce\Category;
use App\Models\Ecommerce\ProductTypeValue;

class PurchasyncProductsImport implements ToModel, WithHeadingRow
{
    /**
     * Specify the row where headings start.
     */
    public function startRow(): int
    {
        return 2; // Skip the first row and start from the second row (headings)
    }

    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        
         $product = $this->saveProduct($row);
         
        $main_category =  Category::where('category_name',$row['main_category'])->first();
        if (!empty($main_category)) {
          $product->mappedCategories()->attach($main_category->id);
          $parent = Category::find($main_category->id);
          if (isset($parent->parent))
            $product->mappedCategories()->attach($parent->parent->id);
    
          if (isset($parent->parent->parent))
            $product->mappedCategories()->attach($parent->parent->parent);
        }
        
        $sub_category =  Category::where('category_name',$row['sub_category'])->first();
        if (!empty($sub_category)) {
          $product->mappedCategories()->attach($sub_category->id);
          $parent = Category::find($sub_category->id);
          if (isset($parent->parent))
            $product->mappedCategories()->attach($parent->parent->id);
    
          if (isset($parent->parent->parent))
            $product->mappedCategories()->attach($parent->parent->parent);
        }
        
        $sub_sub_category =  Category::where('category_name',$row['sub_sub_category'])->first();
        if (!empty($sub_sub_category)) {
          $product->mappedCategories()->attach($sub_sub_category->id);
          $parent = Category::find($sub_sub_category->id);
          if (isset($parent->parent))
            $product->mappedCategories()->attach($parent->parent->id);
    
          if (isset($parent->parent->parent))
            $product->mappedCategories()->attach($parent->parent->parent);
        }
    
       return $product ;
       
       
       
       
       
       
        // dd($row);
        // Debugging to check row data
        // dd($row);
        
        
        
        // array:21 [ // app/Imports/Purchasync/Products/PurchasyncProductsImport.php:29
        //       "seller_id" => 8
        //       "main_category" => "OPERATING SUPPLIES"
        //       "sub_category" => "Kitchen & Bar Utensils"
        //       "sub_sub_category" => "Bar accessories"
        //       "sku" => "SKU001"
        //       "product_description" => "Wine Glass 200 ML"
        //       "brand" => "IQF"
        //       "country_of_origin" => "Canada"
        //       "packing_type" => "Packet"
        //       "pack_size" => "1x12pcs"
        
        //       "warranty" => "No"
        //       "lead_time" => "Not applicable"
        //       "moq" => 1
        //       "material" => "Chrome "
        //       "size" => "200ML"
        //       "color" => "White"
        //       "attribute" => null
        //       "quality_safety_certificate" => "TÜV"
        //       "health_hygiene_certificate" => "Greenguard"
        //       "environmental_certificate" => "Energy Star"
        //       "label" => "Biodegradable"
        //     ]

        // Check if a ParentUser with the same email or mobile already exists
        
        

        return true; // Return the parent model
    }

    // /**
    //  * Define the validation rules for the import data.
    //  */
    // public function rules(): array
    // {
    //     return [
    //         'parent_email' => 'required|email|unique:parent_users,email',
    //         'parent_mobile' => 'required|numeric|unique:parent_users,mobile',
    //         'parent_name' => 'required|string|max:255',
    //         'child_name' => 'required|string|max:255',
    //         'institute_id' => 'required|integer',
    //         'parent_password' => 'required|string|min:6',
    //     ];
    // }

    // /**
    //  * Custom validation messages for the import.
    //  */
    // public function customValidationMessages()
    // {
    //     return [
    //         'parent_email.required' => 'Parent Email is required.',
    //         'parent_email.email' => 'Parent Email must be a valid email.',
    //         'parent_mobile.required' => 'Parent Mobile is required.',
    //         'parent_mobile.numeric' => 'Parent Mobile must be a valid number.',
    //         'parent_name.required' => 'Parent Name is required.',
    //         'child_name.required' => 'Child Name is required.',
    //         'institute_id.required' => 'Institute ID is required.',
    //         'parent_password.required' => 'Parent Password is required.',
    //     ];
    // }
    
    
    private  function getBrandId(string $brandName): int
    {
        return Brand::where('brand_name', $brandName)->value('id') ?? 0;
    }
    
    private function getColorId(string $color): int
   {
    return ProductTypeValue::where('type_value', $color)->where('type_id', 1)->value('id') ?? 0;
   }

   private function getSizeId(string $size)
//   : int
   {
    return ProductTypeValue::where('type_value', $size)->where('type_id', 2)->value('id') ?? 0;
   }
   
   private function getMaterial(string $material): int
   {
    return ProductTypeValue::where('type_value', $material)->where('type_id', 3)->value('id') ?? 0;
   }
    
    private function saveProduct(array $row)
    {
    $searchKeyword = $row['product_description'] . ' ' . $row['brand'] . ' ' . $row['sku'] ;

    return Product::create([
      'uuid' => (string) Str::uuid(),
      'parent_id' => 0,
      'user_id' => auth()->user()->id,
      'seller_id' => $row['seller_id'],
      'brand_id' => $this->getBrandId($row['brand']),
      'brand_name' => $row['brand'],
      'type_value_id_1' => isset($row['color']) ? $this->getColorId($row['color']) : null,
      'type_value_id_2' => $this->getSizeId($row['size']),
      'type_value_id_3' =>$row['material'] ?? '',// $this->getMaterial($row['material']//),
      'packing_type' => $row['packing_type'],
      'packaging_volume' => $row['pack_size'],
      
      'warranty' => $row['warranty'],
      'lead_time' => $row['lead_time'],
     'moq'=> $row['moq'],
     'attribute'=> null,
    
     'quality_safety_certificate' => !empty($row['quality_safety_certificate']) ? json_encode(explode(',', $row['quality_safety_certificate'])) : json_encode([]),
     'health_hygiene_certificate' => !empty($row['health_hygiene_certificate']) ? json_encode(explode(',', $row['health_hygiene_certificate'])) : json_encode([]),
      'environmental_certificate' => !empty($row['environmental_certificate']) ? json_encode(explode(',', $row['environmental_certificate'])) : json_encode([]),

     'product_labels'=> $row['label'],
      
      'material' => $row['material'],
      'stock' => isset($row['inventory']) ? (int)$row['inventory'] : 1000,
      'variant_type' => 'single',
      'have_options' => 1,
      'name' => $row['product_description'],
      'slug' => !empty($row['product_description']) ?  Str::slug($row['product_description'], '-') : "",
      'sku' => $row['sku'],
      'front_end_search_keyword' => $searchKeyword,
    //   'sku_group_code' => $row['sku_group_code'],
      'product_condition' => 'New Product',
      'description' => $row['product_description'],
      'short_desc' => Str::limit(strip_tags($row['product_description'], 150)),
    //   'warranty' => $row['product_warranty'],
    //   'weight' => $row['product_weight_kg'],
    //   'gst' => $row['tax'],
    //   'hsn_code' => $row['hsn_code'],
    //   'wash_care' => $row['wash_care'],
    //   'gender' => $row['gender'] ?? '',
    //   'occasion' => $row['occasion'] ?? '',
    //   'availability' => $row['by_availability'],
    //   'youtube_url' => $row['youtue_video_url'],
    //   'meta_title' => $row['meta_title'],
    //   'meta_description' => $row['meta_desc'],
    //   'meta_keywords' => $row['searchkeyword'],
    //   'disclaimer' => $row['disclaimers'],
    //   'collection' => $row['collection'] ?? '',
    //   'components' => $row['components'] ?? '',
    //   'lining' => $row['lining'] ?? '',
    //   'print_pattern' => $row['print_pattern'] ?? '',
    //   'embroidery_work' => $row['embroidery_work'] ?? '',
    //   'fit' => $row['fit'] ?? '',
    //   'neck_type' => $row['neck_type'] ?? '',
    //   'style_customization' => $row['style_customization'] ?? '',
    //   'how_to_use' => $row['how_to_use'] ?? '',
    //   'good_to_know' => $row['good_to_know'] ?? '',
    //   'suitable_for' => $row['suitable_for'] ?? '',
    //   'expiry' => $row['expiry'] ?? '',
    //   'imported_from' => $row['imported_from'] ?? '',
    //   'ingredients' => $row['ingredients'] ?? '',
    //   'vendor_delivery_date' => $row['vendor_delivery_date'] ?? '',
    ]);
  }
}
