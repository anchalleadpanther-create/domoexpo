<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray($request)
  {
    return [
      'id' => $this->id,
      'uuid' => $this->uuid,
      'name' => $this->name ?? '',
      'slug' => $this->slug ?? '',
      'sku' => $this->sku ?? '',
      'categorySlug' => $this->mappedCategories->isEmpty() ? '' : $this->mappedCategories->last()->category_slug,
      'color' => $this->color ?? '',
      'size' => $this->size ?? '',
      'barcode' => $this->barcode ?? '',
      'description' => $this->description ?? '',
      'shortDesc' => $this->short_desc ?? '',
      'mrp' => $this->rrp ?? 0,
      'discount' => $this->discount ?? 0,
      'unit' => $this->unit ?? '',
      'sellingPrice' => $this->price_unit ?? 0,
      'stock' => $this->stock ?? 0,
      'cartQuantity' => $this->quantity ?? 0,
      'viewCount' => $this->view_count ?? 0,
      'createdAt' => $this->created_at?->format('d M, Y') ?? '',
      'images' => isset($this->images) ?  ProductImagesResource::collection($this->whenLoaded('images')) : [],
      'brand' => isset($this->brand) ? $this->whenLoaded('brand') : (object)[],
      'seller' => isset($this->seller_id) ? $this->whenLoaded('seller_id') : (object)[],
      'typeOne' => isset($this->type_value_id_1) ? $this->whenLoaded('type_value_id_1') : (object)[],
      'typeTwo' => isset($this->type_value_id_2) ? $this->whenLoaded('type_value_id_2') : (object)[],
    ];
  }
}
