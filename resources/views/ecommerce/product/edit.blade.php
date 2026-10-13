@extends('user.header')
@section('userContent')

  <div class="content-wrapper" style="min-height: 1019px;">
    <div class="container-full">
      <section class="content">
        <form action="{{ route('admin.products.update', $product->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
          <div class="row">
            <div class="col-sm-12">
              <div class="box">
                <div class="row">
                  <div class="col-md-12">
                    <div class="box-header with-border">
                      <div class="row">
                        <div class="col-md-6">
                          <h4 class="box-title"><i data-feather='package'></i> PRODUCT BASIC INFO</h4>
                        </div>
                        <div class="col-md-6 text-right">
                          <div class="d-grid gap-2 d-md-block">
                            <a href="{{ route('admin.products.index', 'single-with-variant') }}"
                              class="btn btn-primary rounded-0 btn-sm btn-block">All Product</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="box-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="home4" role="tabpanel">
                      <div class="col-sm-12">
                        <div class="row grey-bg-clr">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="form-label">Product Title *</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" name="name" value="{{ $product->name }}"
                                  placeholder="Product Title" required maxlength="200">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label class="form-label">Product SKU *</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" name="sku" value="{{ $product->sku }}"
                                  placeholder="Product SKU" required>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label class="form-label">Product Barcode</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" name="barcode" value="{{ $product->barcode }}"
                                  placeholder="Product Barcode" maxlength="100">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="intType3" class="form-label">Product Seller *</label>
                              <select class="form-select" name="seller_id" required>
                                <option value="">Select
                                </option>
                                @foreach ($sellers as $seller)
                                  <option @if ($product->seller_id === $seller->id) selected @endif value="{{ $seller->id }}">
                                    {{ $seller->biz_name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          @if (getDropdowns('Product Condition')->displayflag === 1)
                            <div class="col-md-2">
                              <div class="form-group">
                                <label for="intType3"
                                  class="form-label">{{ getDropdowns('Product Condition')->dropdown_name }}</label>
                                <select class="form-select" name="product_condition"
                                  @if (getDropdowns('Product Condition')->dropdown_type === 'multiple') multiple @endif>
                                  <option value="">Select
                                  </option>
                                  @foreach (getDropdowns('Product Condition')->dropdownValues as $dropdown)
                                    <option @if ($product->product_condition === $dropdown->dropdown_value) selected @endif
                                      value="{{ $dropdown->dropdown_value }}">
                                      {{ $dropdown->dropdown_value }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          @endif

                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="intType3" class="form-label">Product Material</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" name="material"
                                  value="{{ $product->material }}" placeholder="Product Material" maxlength="1000">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="intType3" class="form-label">Product TAX</label>
                              <select class="form-select" name="gst">
                                <option value="">Select</option>
                                <option @selected($product->gst === '3') value="3">3%</option>
                                <option @selected($product->gst === '5') value="5">5%</option>
                                <option @selected($product->gst === '12') value="12">12%</option>
                                <option @selected($product->gst === '18') value="18">18%</option>
                                <option @selected($product->gst === '28') value="28">28%</option>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-2 d-none">
                            <div class="form-group">
                              <label class="form-label">Product Hsn Code</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" name="hsn_code"
                                  value="{{ $product->hsn_code }}" placeholder="Product Hsn Code" maxlength="20">
                              </div>
                            </div>
                          </div>

                          <div class="col-md-2">
                            <div class="form-group">
                              <label class="form-label">Product Wash Care</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" name="wash_care"
                                  value="{{ $product->wash_care }}" placeholder="Product Wash Care" maxlength="1000">
                              </div>
                            </div>
                          </div>

                          @if (getDropdowns('Gender')->displayflag === 1)
                            <div class="col-md-2">
                              <div class="form-group">
                                <label for="intType3"
                                  class="form-label">{{ getDropdowns('Gender')->dropdown_name }}</label>
                                <select class="form-select" name="product_gender[]" multiple>
                                  <option value="">Select</option>
                                  @foreach (getDropdowns('Gender')->dropdownValues as $dropdown)
                                    <option @if (in_array(
                                            $dropdown->dropdown_value,
                                            Str::of($product->gender)->explode(',')->toArray())) selected @endif
                                      value="{{ $dropdown->dropdown_value }}">
                                      {{ $dropdown->dropdown_value }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          @endif

                          @if (getDropdowns('Occasion')->displayflag === 1)
                            <div class="col-md-2">
                              <div class="form-group">
                                <label for="intType3"
                                  class="form-label">{{ getDropdowns('Occasion')->dropdown_name }}</label>
                                <select class="form-select" name="product_occasion[]" multiple>
                                  <option value="">Select</option>
                                  @foreach (getDropdowns('Occasion')->dropdownValues as $dropdown)
                                    <option @if (in_array(
                                            $dropdown->dropdown_value,
                                            Str::of($product->occasion)->explode(',')->toArray())) selected @endif
                                      value="{{ $dropdown->dropdown_value }}">
                                      {{ $dropdown->dropdown_value }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          @endif

                          @if (getDropdowns('By Availability')->displayflag === 1)
                            <div class="col-md-2">
                              <div class="form-group">
                                <label for="intType3"
                                  class="form-label">{{ getDropdowns('By Availability')->dropdown_name }}</label>
                                <select class="form-select" data-placeholder="Type to search availability"
                                  name="availability">
                                  <option value="">Select</option>
                                  @foreach (getDropdowns('By Availability')->dropdownValues as $dropdown)
                                    <option @if ($product->availability === $dropdown->dropdown_value) selected @endif
                                      value="{{ $dropdown->dropdown_value }}">
                                      {{ $dropdown->dropdown_value }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          @endif

                          <div class="col-md-2">
                            <div class="form-group">
                              <label class="form-label">Product Youtube URL</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="url" placeholder="http://www.example.com" class="form-control"
                                  name="youtube_url" value="{{ $product->youtube_url }}" maxlength="500">
                              </div>
                            </div>
                          </div>

                          <div class="col-md-2">
                            <div class="form-group">
                              <label class="form-label">Vendor Delivery Date</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" placeholder="Ex: 2 to 3 Weeks" class="form-control"
                                  name="vendor_delivery_date" value="{{ $product->vendor_delivery_date }}"
                                  maxlength="100">
                              </div>
                            </div>
                          </div>

                          <div class="col-md-2">
                            <div class="form-group">
                              <label class="form-label">Product Tag</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" placeholder="Product Tag" class="form-control"
                                  name="product_tag" value="{{ $product->product_tag }}" maxlength="500">
                              </div>
                            </div>
                          </div>

                          {{-- <div class="col-md-2 d-none">
                            <div class="form-group">
                              <label class="form-label">Product Category *</label>
                              <select data-type='sub-category' class="form-select category"
                                data-placeholder="Type to search category" name="category[]" required
                                onchange="getMoreCategories(this)" disabled>
                                <option value="">Select *</option>
                                @foreach ($productData['pCategories'] as $category)
                                  <option
                                    @foreach ($product->mappedCategories as $mappedCategory) @if ($mappedCategory->id === $category->id) selected @endif @endforeach
                                    value="{{ $category->id }}">
                                    {{ $category->category_name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="sub-categories col-md-3 d-none">
                            @if (isset($product->mappedCategories[1]))
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label class="form-label">Product sub-category</label>
                                  <select data-type='sub-sub-category' class="form-select"
                                    data-placeholder="Type to search category" name="category[]" required
                                    onchange="getMoreCategories(this)">
                                    <option value="">Product sub-category</option>
                                    @foreach ($productData['pSubCategories'] as $category)
                                      <option
                                        @foreach ($product->mappedCategories as $mappedCategory) @if ($mappedCategory->id === $category->id) selected @endif @endforeach
                                        value="{{ $category->id }}">
                                        {{ $category->category_name }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                            @endif
                          </div>
                          <div class="sub-sub-categories col-md-3 d-none">
                            @if (isset($product->mappedCategories[2]))
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label class="form-label">Product sub-sub-category</label>
                                  <select data-type='sub-sub-sub-category' class="form-select"
                                    data-placeholder="Type to search category" name="category[]" required
                                    onchange="getMoreCategories(this)">
                                    <option value="">Product sub-sub-category</option>
                                    @foreach ($productData['pSubSubCategories'] as $category)
                                      <option
                                        @foreach ($product->mappedCategories as $mappedCategory) @if ($mappedCategory->id === $category->id) selected @endif @endforeach
                                        value="{{ $category->id }}">
                                        {{ $category->category_name }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                            @endif
                          </div> --}}

                        </div>
                        <div class='row grey-bg-clr'>
                          <h5 class="mb-0"><i data-feather="git-commit"></i> PRODUCT ATTRIBUTES</h5>
                          <div class="col-md-12">
                            <hr>
                          </div>
                          <div class="clearfix"></div>
                          <div class="col-12">
                            <div class="row">
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="form-label">Product Brand</label>
                                  <select class="form-select" data-actions-box="false"
                                    aria-label="size 3 select example" data-placeholder="Type to search brands"
                                    name="brand_id">
                                    @foreach ($brands as $brand)
                                      <option @if ($brand->id === $product->brand_id) selected @endif
                                        value="{{ $brand->id }}">
                                        {{ $brand->brand_name }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="row more-filters">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title"><i data-feather='at-sign'></i> PRICING & IMAGES</h4>
                </div>
                <div class="box-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="home4" role="tabpanel">
                      <div class="col-sm-12">
                        <div class="row mb-20 mt-2">
                        </div>
                        <div class="row grey-bg-clr">
                          <h5 class="mb-0"> <i data-feather="dollar-sign"></i>PRICING & STOCK</h5>
                          <div class="col-md-12">
                            <hr>
                          </div>
                          <div class="clearfix"></div>
                          <div class="more-pricing">
                            @foreach ($productData['pricing'] as $key => $price)
                              <div class="row border-bottom mb-2 pricing-templates">
                                <input type="hidden" name="uuid[]" value="{{ $price->uuid }}">
                                <input type="hidden" name="price_id[]" value="{{ $price->id }}">

                                @if ($product->have_options === 1 && !$productData['productTypes']->isEmpty())
                                  @foreach ($productData['productTypes'] as $typeKey => $type)
                                    @if ($typeKey <= 1)
                                      @php
                                        if ($typeKey % 2 === 0):
                                            $typeId = $price->type_value_id_1;
                                        else:
                                            $typeId = $price->type_value_id_2;
                                        endif;
                                      @endphp
                                      <div class="col">
                                        <div class="form-group">
                                          <label class="form-label">{{ $type->type }}</label>
                                          <div class="input-group mb-3">
                                            <select class="form-select" name="type_value_id{{ $typeKey }}[]">
                                              <option value="" selected disabled>Select</option>

                                              @foreach ($type->mappedProductTypeValues as $productTypeValue)
                                                <option @if ($productTypeValue->id == $typeId) selected @endif
                                                  value="{{ $productTypeValue->id }}">
                                                  {{ $productTypeValue->type_value }}</option>
                                              @endforeach

                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                    @endif
                                  @endforeach
                                @endif

                                {{-- <div class="col">
                                  <div class="form-group">
                                    <label class="form-label">SKU</label>
                                    <div class="input-group mb-3">
                                      <input type="text" maxlength="100" class="form-control" name="variant_sku[]"
                                        value="{{ $price->sku }}" placeholder="SKU">
                                    </div>
                                  </div>
                                </div> --}}

                                {{-- <div class="col">
                                  <div class="form-group">
                                    <label class="form-label">Barcode</label>
                                    <div class="input-group mb-3">
                                      <input type="text" maxlength="100" class="form-control"
                                        name="variant_barcode[]" value="{{ $price->barcode }}" placeholder="Barcode">
                                    </div>
                                  </div>
                                </div> --}}

                                <div class="col">
                                  <div class="form-group">
                                    <label class="form-label">{{ moneyName() }}</label>
                                    <div class="input-group mb-3">
                                      <input type="number" min="0" step="0.01"
                                        onKeyPress="if(this.value.length===10) return false;" class="form-control"
                                        name="rrp[]" value="{{ $price->rrp }}" placeholder="{{ moneyName() }}"
                                        onkeyup="disptachDiscountFunction(this)" required>
                                    </div>
                                  </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                    <label class="form-label">Discount</label>
                                    <div class="input-group mb-3">
                                      <input type="number" min="0" step="0.01"
                                        onKeyPress="if(this.value.length===10) return false;" class="form-control"
                                        name="discount[]" value="{{ $price->discount }}" placeholder="Discount"
                                        onkeyup="calculateDiscount(this)">
                                    </div>
                                  </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                    <label class="form-label">Price/Unit</label>
                                    <div class="input-group mb-3">
                                      <input type="number" min="0" step="0.01"
                                        onKeyPress="if(this.value.length===10) return false;" readonly
                                        class="form-control" name="price_unit[]" value="{{ $price->price_unit }}"
                                        placeholder="Price/Unit">
                                    </div>
                                  </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                    <label class="form-label">Stock</label>
                                    <div class="input-group mb-3">
                                      <input type="number" min="0"
                                        onKeyPress="if(this.value.length===10) return false;" class="form-control"
                                        name="stock[]" value="{{ $price->stock }}" placeholder="Stock">
                                    </div>
                                  </div>
                                </div>
                                {{-- <div class="col d-flex align-items-center">
                                  <div class="form-group">
                                    <label class="form-label">&nbsp;</label>
                                  </div>
                                  <a href="{{ route('admin.product-pricing.edit', [$price->id, $product->variant_type]) }}"
                                    class="btn btn-primary rounded-0 btn-sm mt-3"> <i class="fa fa-pencil"></i> Edit</a>
                                </div> --}}
                                <div class="col-12 text-right mb-1">
                                  <span style="cursor:pointer;" onclick="removePricingTemplate(this)"
                                    class='text-danger' title='Remove'><i class='fa fa-times'></i></span>
                                </div>
                              </div>
                            @endforeach
                          </div>
                          <div class="col-12 my-2 text-right more-pricing-btn">
                            <span class='text-dark' style="cursor: pointer;" onclick="morePricingTemplate()"
                              title="Add more"><i class="fa fa-plus"></i></span>
                          </div>
                        </div>

                        <div class="row mt-30">
                          <h5 class="mb-0"><i data-feather='image'></i> IMAGES</h5>
                        </div>
                        <div class="row mt-30 grey-bg-clr">
                          <div class="col-md-6">
                            <div class=" img-upload-form">
                              <p style="margin:0">
                                <label for="upload_imgs" class="button hollow text-center">
                                  <img style="cursor:pointer;"
                                    onclick="document.querySelector('.product-images').click()"
                                    src="{{ asset('allUsers/img-upload-thumbnail.png') }}"> <br>Upload up to 5
                                  photos</label>
                                <input class="product-images d-none" type="file" name="product_images[]"
                                  accept="image/png, image/gif, image/jpeg, image/jpg, image/webp, image/svg" multiple>
                              </p>
                            </div>
                          </div>
                          <div class="row" id='myImg'>

                          </div>
                          <div class="row" id='myImg2'>
                            @foreach ($product->images as $image)
                              <div class='col-md-3 my-2'>
                                <img src='{{ asset('uploads/products') . '/' . $image->image }}' />
                                <div class="row mt-2">
                                  <div class="col-6">
                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#modal-delete"
                                      title="Delete category" onclick="destroyUrlUpdate(this)"
                                      data-destroy-url="{{ route('admin.delete-product-image', $image->id) }}"
                                      type="button" class="btn btn-danger btn-sm ">
                                      Delete
                                      <i class="fa fa-trash"></i>
                                    </a>
                                  </div>
                                  <div class="col-6">
                                    <input type="number" class="form-control" value="{{ $image->sort }}"
                                      placeholder="Sort" oninput="changeProductImageSort(this)"
                                      data-image-name="{{ $image->image }}" />
                                  </div>
                                </div>
                              </div>
                            @endforeach
                          </div>
                        </div>
                        <div class="row mt-30 grey-bg-clr">
                          <h5 class="mb-0"><i data-feather='edit-3'></i> DESCRIPTION & TERMS</h5>
                          <div class="col-md-12">
                            <hr />
                          </div>
                        </div>
                        <div class="row grey-bg-clr">
                          <div class="col-md-12">
                            <label class="form-label">Description (2500 Character)</label>
                            <textarea name="description" id="summernote">{{ $product->description }}</textarea>
                          </div>
                          <div class="col-md-12 mt-4">
                            <label class="form-label">Size Chart</label>
                            <textarea name="size_chart" id="summernote3">{{ $product->size_chart }}</textarea>
                          </div>
                          <div class="col-md-12 mt-3"></div>

                        </div>

                        <div class="box mt-4">
                          <h5 class="mb-0"><i data-feather='truck'></i> SHIPPING & DELIVERY</h5>
                          <div class="col-md-12">
                            <hr>
                          </div>
                          <div class="clearfix"></div>

                          <div class="row grey-bg-clr">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="form-label">Product Weight(Gm/Kg)</label>
                                <div class="input-group mb-3">
                                  <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                  <input type="text" class="form-control" maxlength="100" name="weight"
                                    value="{{ $product->weight }}" placeholder="Product Weight(Gm/Kg)">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="form-label">L X B X H</label>
                                <div class="input-group mb-3">
                                  <input type="number" min="0" steps='0.01'
                                    onKeyPress="if(this.value.length===7) return false;" class="form-control"
                                    name="length" value="{{ $product->length }}" placeholder="L">
                                  <input type="number" min="0" steps='0.01'
                                    onKeyPress="if(this.value.length===7) return false;" class="form-control"
                                    name="breadth" value="{{ $product->breadth }}" placeholder="B">
                                  <input type="number" min="0" steps='0.01'
                                    onKeyPress="if(this.value.length===7) return false;" class="form-control"
                                    name="height" value="{{ $product->height }}" placeholder="H">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="form-label">Warranty</label>
                                <div class="input-group mb-3">
                                  <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                  <input type="text" class="form-control" maxlength="100" name="warranty"
                                    value="{{ $product->warranty }}" placeholder="Warranty">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row grey-bg-clr">
                          <div class="clearfix"></div>

                          <h5 class="mb-0"><i data-feather='credit-card'></i> Seo & Disclaimer</h5>
                          <div class="col-md-12">
                            <hr>
                          </div>
                          <div class="clearfix"></div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="form-label">Meta Title</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" maxlength="200" name="meta_title"
                                  value="{{ $product->meta_title }}" placeholder="Meta Title">
                              </div>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="form-label">Meta Description</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" maxlength="500" name="meta_description"
                                  value="{{ $product->meta_description }}" placeholder="Meta Description">
                              </div>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="form-label">Meta Keywords</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" maxlength="200" name="meta_keywords"
                                  value="{{ $product->meta_keywords }}" placeholder="Meta Keywords">
                              </div>
                            </div>
                          </div>


                          <div class="col-md-12 mt-4">
                            <label class="form-label">Disclaimer</label>
                            <textarea name="disclaimer" id="summernote2">{{ $product->disclaimer }}</textarea>
                          </div>

                        </div>

                      </div>
                      <div class="row mt-20">
                        <hr>
                        <div class="col-md-12 pull-right">
                          <div class="clearfix">
                            <button type="submit" class="waves-effect waves-light btn btn-dark mb-5"><i
                                class="fa fa-check"></i> Save</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </section>
      <!-- /.content -->
    </div>
  </div>
  @routes
  <script>
    /* removing any previous stored option template. */
    localStorage.removeItem("types-template");

    // setting options template for selected category 
    let productOptions = {!! json_encode($productData['productTypes']->toArray()) !!};
    let temporaryOptionsTemplate = '';

    productOptions.forEach((productTypeOption, index) => {
      console.log(productTypeOption.mapped_product_type_values);
      if (index <= 1) {
        let typeValueTemplate = '';
        productTypeOption.mapped_product_type_values.forEach((type_value) => {
          typeValueTemplate += `<option value="${type_value.id}">${type_value.type_value}</option>`;
        });
        temporaryOptionsTemplate += `
        <div class="col">
          <div class="form-group">
            <label class="form-label">${productTypeOption.type}</label>
            <div class="input-group mb-3">
              <select class="form-select" required name="type_value_id${index}[]">
                <option value="" selected disabled>Select</option>
                ${typeValueTemplate}
              </select>
            </div>
          </div>
        </div>
      `;
      }
    });

    localStorage.setItem("types-template", temporaryOptionsTemplate);

    /* this function generates pricing template */
    function pricingTemplateFun() {
      let pricingTemplate = '';
      return pricingTemplate = `
        <div class="row border-bottom mb-2 pricing-templates">
          ${localStorage.getItem('types-template')}
          {{-- <div class="col">
            <div class="form-group">
              <label class="form-label">SKU</label>
              <div class="input-group mb-3">
                <input type="text" maxlength="100" class="form-control"
                  name="variant_sku[]" value="" placeholder="SKU">
              </div>
            </div>
          </div> --}}

          {{-- <div class="col">
            <div class="form-group">
              <label class="form-label">Barcode</label>
              <div class="input-group mb-3">
                <input type="text" maxlength="100" class="form-control"
                  name="variant_barcode[]" value="" placeholder="Barcode">
              </div>
            </div>
          </div> --}}

          <div class="col">
            <div class="form-group">
              <label class="form-label">{{ moneyName() }}</label>
              <div class="input-group mb-3">
                <input type="number" min="0" step="0.01"
                  onKeyPress="if(this.value.length===10) return false;" class="form-control"
                  name="rrp[]" value="" placeholder="{{ moneyName() }}" onkeyup="disptachDiscountFunction(this)" required>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label class="form-label">Discount</label>
              <div class="input-group mb-3">
                <input type="number" min="0" step="0.01"
                  onKeyPress="if(this.value.length===10) return false;" class="form-control"
                  name="discount[]" value="" placeholder="Discount" onkeyup="calculateDiscount(this)">
              </div>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label class="form-label">Price/Unit</label>
              <div class="input-group mb-3">
                <input type="number" min="0" step="0.01"
                  onKeyPress="if(this.value.length===10) return false;" readonly class="form-control"
                  name="price_unit[]" value="" placeholder="Price/Unit">
              </div>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label class="form-label">Stock</label>
              <div class="input-group mb-3">
                <input type="number" min="0" onKeyPress="if(this.value.length===10) return false;"
                  class="form-control" name="stock[]" value="" placeholder="Stock">
              </div>
            </div>
          </div>

          <div class="col-12 text-right mb-1">
              <span style="cursor:pointer;" onclick="removePricingTemplate(this)" class='text-danger' title='Remove'><i class='fa fa-times'></i></span>
            </div>
          </div>
      `;
    }

    function removePricingTemplate(e) {
      const pricingTemplates = document.querySelectorAll('.pricing-templates');
      if (pricingTemplates.length > 1) {
        e.parentElement.parentElement.remove();
      }
    }

    // this function generates images thumbnail which are selected by the user.


    $(function() {
      $(".product-images").change(function() {
        if (this.files && this.files[0]) {
          document.querySelector('#myImg').innerHTML = '';
          for (var i = 0; i < this.files.length; i++) {
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[i]);
          }
        }
      });
    });

    function imageIsLoaded(e) {
      $('#myImg').append(`<div class='col-md-3 my-2'><img src='${e.target.result}'></div>`);
    };

    // this function generates text editors 
    $('#summernote, #summernote2, #summernote3').summernote({
      placeholder: 'Please enter your description here',
      tabsize: 2,
      height: 250,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['view', ['codeview', 'help']]
      ]
    });


    function morePricingTemplate() {
      document.querySelector('.more-pricing').insertAdjacentHTML('beforeend', pricingTemplateFun());
      $('.form-select').select2({
        width: '100%',
        dropdownCssClass: "max-z-index",
      });
    }

    function getMoreCategories(e) {
      let category_id = +e.value;
      let type = e.dataset.type;
      let setType;
      let mappedBrandTemplate = '';
      let brandTemplate = '';
      if (type === 'sub-category') {
        document.querySelector('.sub-sub-categories').innerHTML = '';

        setType = 'sub-sub-category';
      }
      if (type === 'sub-sub-category') {

        setType = 'sub-sub-sub-category';
      }
      if (type === 'sub-sub-sub-category') {
        setType = 'sub-sub-sub-sub-category';
      }
      $.ajax({
        async: false,
        method: "get",
        url: route('get-categories-filters-and-product-types'),
        data: {
          category_id
        },
        dataType: 'json',
        success: function(data) {
          let optionsTemplate = ``;
          data.data.categories.forEach(category => {
            optionsTemplate += `
              <option value="${ category.id }">${ category.category_name }</option>
            `;
          });
          let categoryTemplate = ``;

          if (data.data.categories.length > 0) {
            categoryTemplate = `
            <div class="form-group">
              <label class="form-label">Product ${ type }</label>
              <select data-type="${ setType }" class="form-select" id="intType3" name="category[]"
                onchange="getMoreCategories(this)">
                <option value="">Select</option>
                ${optionsTemplate}
              </select>
            </div>
            `;
          }

          if (type === 'sub-category') {
            document.querySelector('.sub-categories').innerHTML = categoryTemplate;
          }
          if (type === 'sub-sub-category') {
            document.querySelector('.sub-sub-categories').innerHTML = categoryTemplate;
          }
          if (type === 'sub-sub-sub-category') {

          }
          if (type === 'sub-sub-sub-sub-category') {}

          let filtersTemplate = ``;
          let filtersValueTemplate = ``;
          let filters = [];
          data.data.filters.forEach(filter => {
            filters.push(filter.filter)
          })
          filters.forEach(filter => {
            console.log('inside-loop', filter, filter.mapped_filter_values);
            filter.mapped_filter_values.forEach(filterValues => {
              console.log(filterValues);
              filtersValueTemplate +=
                `<option value="${filterValues.id}">${filterValues.filter_value}</option>`;
            });
            filtersTemplate += `
              <div class="col-md-3">
                <div class="form-group">
                  <label class="form-label">${filter.filter_name}</label>
                  <select class="form-select" data-actions-box="false" ${filter.type === 'multiple' ? 'multiple' : '' }  aria-label="size 3 select example"  name="filters[]">
                    ${filtersValueTemplate}
                  </select>
                </div>
              </div>
            `;
            filtersValueTemplate = '';
          });

          let productTypesTemplate = ``;

          data.data.productTypes.forEach((productType, index) => {
            if (index <= 1) {
              let typeValueTemplate = '';
              productType.mapped_product_type_values.forEach((type_value) => {
                typeValueTemplate += `<option value="${type_value.id}">${type_value.type_value}</option>`;
              });
              productTypesTemplate += `
              <div class="col-md-2">
                <div class="form-group">
                  <label class="form-label">${productType.type}</label>
                  <div class="input-group mb-3">
                    <select class="form-select" required name="type_value_id${index}[]">
                      <option value="" selected disabled>Select</option>
                      ${typeValueTemplate}
                    </select>
                  </div>
                </div>
              </div>
              `;
              typeValueTemplate = '';
            }
          });

          localStorage.setItem("types-template", productTypesTemplate);
          document.querySelector('.more-pricing').innerHTML = pricingTemplateFun();

          let catId = document.querySelector('.category').value;


          filtersTemplate = filtersTemplate;
          document.querySelector('.more-filters').innerHTML = filtersTemplate;
          $('.form-select').select2({
            width: '100%',
            dropdownCssClass: "max-z-index",
          });
          getVariantType();
        }
      });

    }

    // this function gets and sets the variant type of the product and changes pricing template accordingly
    function getVariantType() {
      let variantValues = [];
      document.querySelectorAll('.variant-checkbox').forEach((box) => {
        if (box.checked) {
          if (box.value === 'wholesale') {
            document.querySelector('.have-options').checked = false;
          }
          variantValues.push(box.value)
        }

      })

      if (variantValues.includes('single')) {
        document.querySelector('.variant-checkbox-div').classList.remove('d-none');
        document.querySelector('.more-pricing-btn').classList.add('d-none');
      }

      if (variantValues.includes('wholesale')) {
        document.querySelector('.variant-checkbox-div').classList.add('d-none');
        document.querySelector('.more-pricing-btn').classList.remove('d-none');
      }

      if (variantValues.includes('1')) {
        document.querySelector('.more-pricing-btn').classList.remove('d-none');
      }

      document.querySelector('.variant-type').value = variantValues;
      console.log(document.querySelector('.variant-type').value, 'yo');
      document.querySelector('.more-pricing').innerHTML = pricingTemplateFun();
    }

    function calculateDiscount(e) {
      let price = +e.parentElement.parentElement.parentElement.previousSibling.previousElementSibling.querySelector(
        'input').value;
      let discountedPriceInput = e.parentElement.parentElement.parentElement.nextElementSibling.querySelector('input');
      let discount = +e.value;
      let discountedAmount = 0;

      if (discount > 100) {
        e.value = 100;
        discount = 100;
      }

      discountedAmount = (discount / 100) * price;
      discountedAmount = price - discountedAmount;
      discountedPriceInput.value = discountedAmount.toFixed(2);

    }

    function disptachDiscountFunction(e) {
      let element = e.parentElement.parentElement.parentElement.nextElementSibling.querySelector('input');
      var event = new Event('keyup', {
        bubbles: true,
        cancelable: true,
      });

      element.dispatchEvent(event);

    }
  </script>
@endsection
