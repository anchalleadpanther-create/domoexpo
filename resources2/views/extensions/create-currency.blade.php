@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <section class="content">

        <div class="row">
          <div class="col-sm-8">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">{{ isset($currency) ? 'Edit' : 'Add' }} Currency</h4>
              </div>
              <div class="box-body">
                <!-- Tab panes -->
                <form
                  action="{{ isset($currency) ? route('admin.currencies.update', $currency->id) : route('admin.currencies.store') }}"
                  method="post" id="category" enctype="multipart/form-data">
                  @csrf
                  @if (isset($currency))
                    @method('PATCH')
                  @endif
                  <div class="tab-content">
                    <div class="tab-pane active" id="home4" role="tabpanel">
                      <div class="col-sm-12">
                        <div class="row grey-bg-clr">
                          <h5 class="mb-0">Currency Info</h5>
                          <div class="col-md-12">
                            <hr>
                          </div>
                          <div class="clearfix"></div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Currency *</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" name="currency" id="currency" maxlength="20"
                                  value="@if (isset($currency)) {{ $currency->currency }}@else{{ old('currency') }} @endif"
                                  placeholder="" required>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Conversion Ratio *</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="number" step="0.001" class="form-control" name="con_ratio" id="con_ratio"
                                  value="@if (isset($currency)) {{ $currency->con_ratio }}@else{{ old('con_ratio') }} @endif"
                                  placeholder="" required>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="form-label">Currency Code *</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" placeholder="" maxlength='20'
                                  name="currency_code" maxlength="500" id="metatitle"
                                  value="@if (isset($currency)) {{ $currency->currency_code }}@else{{ old('currency_code') }} @endif"
                                  required>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="form-label">Currency Display Code *</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" placeholder="" maxlength="10"
                                  name="currency_display_code" maxlength="500" id="metatitle"
                                  value="@if (isset($currency)) {{ $currency->currency_display_code }}@else{{ old('currency_display_code') }} @endif"
                                  required>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="form-label">Country *</label>
                              <select class="form-select" name="country_id" required>
                                <option
                                  @if (isset($currency)) @if ($currency->country_id === 0) selected @endif
                                  @else{{ old('country_id') == 0 ? 'selected' : '' }} @endif
                                  value="0">All Countries</option>
                                @foreach (getCountries() as $country)
                                  <option
                                    @if (isset($currency)) @if ($currency->country_id === $country->id) selected @endif
                                    @else{{ old('country_id') == $country->id ? 'selected' : '' }} @endif value="{{ $country->id }}">{{ $country->name }}
                                    {{ $country->emoji }}</option>
                                @endforeach
                              </select>
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
@endsection
