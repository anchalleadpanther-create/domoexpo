<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartProductResource extends JsonResource
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
      'uuid' => $this->product->uuid,
      'cartId' => $this->cart_id,
      'buyerId' => $this->buyer_id,
      'productId' => $this->product_id,
      'name' => $this->name ?? '',
      'sku' => $this->sku ?? '',
      'slug' => $this->slug ?? '',
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
      'customName' => $this->custom_name ?? '',
      'is_gift' => $this->is_gift,
      'lastCategorySlug' => $this->product->mappedCategories->last()->category_slug ?? '',
      'createdAt' => $this->created_at?->format('d M, Y') ?? '',
      'productImage' => isset($this->product_image) ? asset('uploads/products') . '/' . $this->product_image : '',
      'images' => isset($this->images) ? $this->whenLoaded('images') : (object)[],
      'brand' => isset($this->brand) ? $this->whenLoaded('brand') : (object)[],
      'seller' => isset($this->seller_id) ? $this->whenLoaded('seller_id') : (object)[],
      'typeOne' => isset($this->type_value_id_1) ? $this->whenLoaded('type_value_id_1') : (object)[],
      'typeTwo' => isset($this->type_value_id_2) ? $this->whenLoaded('type_value_id_2') : (object)[],
      'couponUsed' => $this->coupon_used,
      'couponAmount' => $this->coupon_amount,
      'couponAmount' => $this->coupon_amount,
      'couponCode' => $this->coupon_code ?? '',
      'couponPercent' => $this->coupon_percent ?? 0,
    ];
  }
}
