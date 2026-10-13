@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <section class="content">
        
        <div class="row">
          <div class="col-sm-8">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">{{ isset($shipping) ? 'Edit' : 'Add' }} Tax</h4>
              </div>
              <div class="box-body">
                <!-- Tab panes -->
                <form
                  action="{{ isset($shipping) ? route('admin.shipping.update', $shipping->id) : route('admin.shipping.store') }}"
                  method="post" id="category" enctype="multipart/form-data">
                  @csrf
                  @if (isset($shipping)) @method('PATCH') @endif
                  <div class="tab-content">
                    <div class="tab-pane active" id="home4" role="tabpanel">
                      <div class="col-sm-12">
                        <div class="row grey-bg-clr">
                          <h5 class="mb-0">Shipping Info</h5>
                          <div class="col-md-12">
                            <hr>
                          </div>
                          <div class="clearfix"></div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="form-label">Country</label>
                              <select class="form-select" name="country_id">
                                <option
                                  @if (isset($shipping)) @if ($shipping->country_id === 0) {{ 'selected' }} @endif
                                  @else{{ old('country_id') == 0 ? 'selected' : '' }} @endif
                                  value="0">All Countries</option>
                                @foreach (getCountries() as $country)
                                  <option
                                    @if (isset($shipping)) @if ($shipping->country_id === $country->id) selected @endif
                                    @else{{ old('country_id') == $country->id ? selected : '' }} @endif value="{{ $country->id }}">{{ $country->name }}
                                    {{ $country->emoji }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Name of shipping rule</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" placeholder="" maxlength='200' name="name"
                                  value="@if (isset($shipping)) {{ $shipping->name }}@else{{ old('name') }} @endif">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Type</label>
                              <select name="type" class="form-select" required onchange="shippingType(this)">
                                <option value="">Select</option>
                                <option
                                  @if (isset($shipping)) @if ($shipping->type === 'price') selected @endif
                                @else @if (old('type') === 'price') selected @endif @endif
                                  value="price">Based on product's price</option>
                                <option
                                  @if (isset($shipping)) @if ($shipping->type === 'weight') selected @endif
                                @else @if (old('type') === 'weight') selected @endif @endif
                                  value="weight">Based on weight (g)</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-8" id="price"
                            @if (isset($shipping)) @if ($shipping->type != 'price') style="display:none;" @endif
                          @else @if (old('type') != 'price') style="display:none;" @endif @endif >
                            <div class="form-group">
                              <label class="form-label">Based on product's price</label>
                              <div class="input-group">
                                <span class="input-group-text">Price From / To</span>
                                <input type="number"
                                  @if (isset($shipping)) value="{{ $shipping->price_from }}" @else value="{{ old('price_from') }}"" @endif
                                  min="0" step="0.01" aria-label="Price From" name="price_from"
                                  placeholder="Price From" class="form-control price-from">
                                <input type="number"
                                  @if (isset($shipping)) value="{{ $shipping->price_to }}" @else value="{{ old('price_to') }}"" @endif
                                  min="0" step="0.01" aria-label="Price To" name="price_to"
                                  placeholder="Price To" class="form-control price-to">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-8" id="weight"
                            @if (isset($shipping)) @if ($shipping->type != 'weight') style="display:none;" @endif
                          @else @if (old('type') != 'weight') style="display:none;" @endif @endif>
                            <div class="form-group">
                              <label class="form-label">Based on product's weight (g)</label>
                              <div class="input-group">
                                <span class="input-group-text">Weight From / To</span>
                                <input type="number"
                                  @if (isset($shipping)) value="{{ $shipping->weight_from }}" @else value="{{ old('weight_from') }}" @endif
                                  min="0" step="0.01" aria-label="Weight From" name="weight_from"
                                  placeholder="Weight From" class="form-control weight-from">
                                <input type="number"
                                  @if (isset($shipping)) value="{{ $shipping->weight_to }}" @else value="{{ old('weight_to') }}" @endif
                                  min="0" step="0.01" aria-label="Weight To" name="weight_to"
                                  placeholder="Weight To" class="form-control weight-to">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="form-label">Shipping fee</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="number" step="0.01" class="form-control" placeholder="" min='0'
                                  name="shipping_cost"
                                  value="@if (isset($shipping)) {{ $shipping->shipping_cost }}@else{{ old('shipping_cost') }} @endif" />
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-20">
                        <hr>
                        <div class="col-md-12 pull-right">
                          <div class="clearfix">
                            <button type="submit" class="waves-effect waves-light btn btn-dark mb-5 category"><i
                                class="fa fa-check"></i> Save</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.box -->
          </div>
        </div>
      </section>
    </div>
  </div>
  <script>
    function shippingType(e) {
      if (e.value === 'price') {
        $('#price').show();
        $('#weight').hide();
        document.getElementByClassName('price-from').setAttribute('required', true);
        document.getElementByClassName('price-to').setAttribute('required', true);
        document.getElementByClassName('weight-from').removeAttribute('required');
        document.getElementByClassName('weight-to').removeAttribute('required');
      } else if (e.value === 'weight') {
        $('#price').hide();
        $('#weight').show();
        document.getElementByClassName('weight-from').setAttribute('required', true);
        document.getElementByClassName('weight-to').setAttribute('required', true);
        document.getElementByClassName('price-from').removeAttribute('required');
        document.getElementByClassName('price-to').removeAttribute('required');
      } else {
        $('#price').hide();
        $('#weight').hide();
      }
    }
  </script>
@endsection
