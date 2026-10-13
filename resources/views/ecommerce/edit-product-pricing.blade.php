@extends('user.header')
@section('userContent')
  

  <div class="content-wrapper" style="min-height: 1019px;">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <!-- Main content -->
      <section class="content">
        <form action="{{ route('admin.product-pricing.update', [$productPrice->id, $product->variant_type]) }}"
          method="post" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
          <div class="row">
            <div class="col-12">

              <div class="row">
                <div class="col-xl-9 col-12">

                  <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                      <div class="tab-content">
                        <div class="tab-pane active" id="home4" role="tabpanel">
                          <div class="col-sm-12">

                            <div class="row grey-bg-clr">
                              <h5 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                  <circle cx="12" cy="7" r="4"></circle>
                                </svg>Project Info</h5>
                              <div class="col-md-12">
                                <hr>
                              </div>
                              <div class="clearfix"></div>

                              <div class="row border-bottom mb-2">
                                @if ($type === 'wholesale')
                                  <div class="col-md-6">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label class="form-label">Slot Range Qty *</label>
                                          <div class="input-group mb-3">
                                            <input type="number" min="0"
                                              onKeyPress="if(this.value.length===7) return false;" class="form-control"
                                              name="min_qty" value="{{ $productPrice->min_qty }}" placeholder="Min Qty">
                                            <input type="number" min="0"
                                              onKeyPress="if(this.value.length===7) return false;" class="form-control"
                                              name="max_qty" value="{{ $productPrice->max_qty }}" placeholder="Max Qty">
                                          </div>
                                        </div>
                                      </div>
                                      @if (getDropdowns('Slot Unit')->displayflag === 1)
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="intType3"
                                              class="form-label">{{ getDropdowns('Slot Unit')->dropdown_name }}</label>
                                            <select class="form-select" name="unit"
                                              @if (getDropdowns('Slot Unit')->dropdown_type === 'multiple') multiple @endif>
                                              <option value="">Select</option>
                                              @foreach (getDropdowns('Slot Unit')->dropdownValues as $dropdown)
                                                <option @if ($productPrice->unit === $dropdown->dropdown_value) selected @endif
                                                  value="{{ $dropdown->dropdown_value }}">
                                                  {{ $dropdown->dropdown_value }}</option>
                                              @endforeach
                                            </select>
                                          </div>
                                        </div>
                                      @endif
                                    </div>
                                  </div>
                                @endif
                                @if ($product->have_options === 1 && !$productTypes->isEmpty())
                                  @foreach ($productTypes as $typeKey => $type)
                                    @if ($typeKey <= 1)
                                      @php
                                        if ($typeKey % 2 === 0):
                                            $typeId = $productPrice->type_value_id_1;
                                        else:
                                            $typeId = $productPrice->type_value_id_2;
                                        endif;
                                      @endphp
                                      <div class="col-md-3">
                                        <div class="form-group">
                                          <label class="form-label">{{ $type->type }}</label>
                                          <div class="input-group mb-3">
                                            <select class="form-control" name="type_value_id{{ $typeKey }}">
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

                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label class="form-label">SKU</label>
                                    <div class="input-group mb-3">
                                      <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                      <input type="text" maxlength="100" required class="form-control" name="sku"
                                        value="{{ $productPrice->sku }}" placeholder="SKU">
                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label class="form-label">Barcode</label>
                                    <div class="input-group mb-3">
                                      <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                      <input type="text" maxlength="100" class="form-control" name="barcode"
                                        value="{{ $productPrice->barcode }}" placeholder="Barcode">
                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label class="form-label">RRP</label>
                                    <div class="input-group mb-3">
                                      <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                      <input type="number" min="0" step="0.01"
                                        onKeyPress="if(this.value.length===10) return false;" class="form-control"
                                        name="rrp" value="{{ $productPrice->rrp }}" placeholder="RRP"
                                        onkeyup="disptachDiscountFunction(this)">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label class="form-label">Discount</label>
                                    <div class="input-group mb-3">
                                      <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                      <input type="number" min="0" step="0.01"
                                        onKeyPress="if(this.value.length===10) return false;" class="form-control"
                                        name="discount" value="{{ $productPrice->discount }}" placeholder="Discount"
                                        onkeyup="calculateDiscount(this)">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label class="form-label">Price/Unit</label>
                                    <div class="input-group mb-3">
                                      <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                      <input type="number" min="0" step="0.01"
                                        onKeyPress="if(this.value.length===10) return false;" readonly
                                        class="form-control" name="price_unit" value="{{ $productPrice->price_unit }}"
                                        placeholder="Price/Unit">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label class="form-label">Stock</label>
                                    <div class="input-group mb-3">
                                      <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                      <input type="number" min="0"
                                        onKeyPress="if(this.value.length===10) return false;" class="form-control"
                                        name="stock" value="{{ $productPrice->stock }}" placeholder="Stock">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              @if ($product->variant_type != 'wholesale')
                                <div class="row mt-30">
                                  <h5 class="mb-0"><i data-feather='image'></i> IMAGES</h5>
                                </div>
                                <div class="row mt-30">
                                  <div class="col-md-6">
                                    <div class=" img-upload-form">
                                      <p style="margin:0">
                                        <label for="upload_imgs" class="button hollow text-center">
                                          <img style="cursor:pointer;"
                                            onclick="document.querySelector('.product-images').click()"
                                            src="{{ asset('allUsers/img-upload-thumbnail.png') }}"> <br>Upload up to 5
                                          photos</label>
                                        <input class="product-images d-none" type="file" name="product_images[]"
                                          accept="image/png, image/gif, image/jpeg, image/jpg, image/webp, image/svg"
                                          multiple>
                                      </p>
                                    </div>
                                  </div>
                                  <div class="row" id='myImg'>

                                  </div>
                                  <div class="row" id='myImg2'>
                                    @foreach ($productPrice->images as $image)
                                      <div class='col-md-3 my-2'>
                                        <img src='{{ asset('uploads/products') . '/' . $image->image }}' />
                                        <div class="row mt-2">
                                          <div class="col-6">
                                            <a href="javascript:;" data-bs-toggle="modal"
                                              data-bs-target="#modal-delete" title="Delete category"
                                              onclick="destroyUrlUpdate(this)"
                                              data-destroy-url="{{ route('admin.delete-product-image', $image->id) }}"
                                              type="button" class="btn btn-danger btn-sm ">Delete <i
                                                class="fa fa-trash"></i></a>
                                          </div>
                                          <div class="col-6">
                                            <input type="number" class="form-control" min="0"
                                              value="{{ $image->sort }}" placeholder="Sort"
                                              oninput="changeProductImageSort(this)" data-id="{{ $image->id }}" />
                                          </div>
                                        </div>
                                      </div>
                                    @endforeach
                                  </div>
                                </div>
                              @endif

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

                <div class="col-xl-3 col-12">
                  <div class="box">
                    <div class="box-header">
                      <h4 class="box-title">All Product Pricing Variants</h4>
                    </div>

                    <div class="box-body">
                      <div class="inner-user-div4">
                        {{-- loop starts --}}
                        @foreach ($allProductPricing as $key => $pricing)
                          <div class="border-bottom mb-3">
                            <div class="d-flex align-items-center mb-10">
                              <div class="d-flex flex-column flex-grow-1 fw-500">
                                <p
                                  class="hover-primary @if ($pricing->id === $productPrice->id) text-dark @else text-fade @endif mb-1 fs-14">
                                  {{ ++$key }} :
                                  @if (isset($pricing->productTypeValueOne))
                                    {{ $pricing->productTypeValueOne->type_value }} @if (isset($pricing->productTypeValueTwo))
                                      / {{ $pricing->productTypeValueTwo->type_value }}
                                    @endif
                                    @endif @if (!isset($pricing->productTypeValueOne) && !isset($pricing->productTypeValueTwo))
                                      Variant {{ $key }}
                                    @endif
                                </p>
                                {{-- <span class="text-dark fs-16">{{ Emergency appointment }}</span> --}}
                              </div>
                              <div class="">
                                <a href="{{ route('admin.product-pricing.edit', [$pricing->id, $product->variant_type]) }}"
                                  class="waves-effect waves-circle btn btn-circle btn-primary-light btn-sm d-flex align-items-center mx-auto"><i
                                    class="fa fa-pencil"></i></a>
                              </div>
                            </div>
                          </div>
                        @endforeach
                        {{-- loop ends --}}
                      </div>
                    </div>
                  </div>

                </div>

              </div>
              <!-- /.box -->
            </div>
            <!-- /.col-->
          </div>
          <!-- ./row -->

        </form>
      </section>

      <!-- /.content -->
    </div>
  </div>

  <script>
    $(function() {
      $(".product-images").change(function() {
        if (this.files && this.files[0]) {
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

    function setTypeValue(e) {
      let type_id = e.value;
      $.ajax({
        async: false,
        method: "get",
        url: route('get-product-type-values'),
        data: {
          type_id,
        },
        dataType: 'json',
        success: function(data) {
          let typeValueTemplate = ``;
          data.data.productTypeValues.forEach(productTypeValue => {
            typeValueTemplate +=
              `<option value='${productTypeValue.id}'>${productTypeValue.type_value}</option>`;
          });

          document.querySelector('.set-product-type-values').innerHTML = typeValueTemplate;

        }
      });

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
