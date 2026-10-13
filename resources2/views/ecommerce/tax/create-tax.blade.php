@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <section class="content">
        

        <div class="row">
          <div class="col-sm-8">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">{{ isset($taxes) ? 'Edit' : 'Add' }} Tax</h4>
              </div>
              <div class="box-body">
                <!-- Tab panes -->
                <form action="{{ isset($taxes) ? route('admin.taxes.update', $taxes->id) : route('admin.taxes.store') }}"
                  method="post" id="category" enctype="multipart/form-data">
                  @csrf
                  @if (isset($taxes)) @method('PATCH') @endif
                  <div class="tab-content">
                    <div class="tab-pane active" id="home4" role="tabpanel">
                      <div class="col-sm-12">
                        <div class="row grey-bg-clr">
                          <h5 class="mb-0">Tax Info</h5>
                          <div class="col-md-12">
                            <hr>
                          </div>
                          <div class="clearfix"></div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="form-label">Country</label>
                              <select class="form-select" name="country_id">
                                <option
                                  @if (isset($taxes)) @if ($taxes->country_id === 0) selected @endif
                                  @else{{ old('country_id') == 0 ? 'selected' : '' }} @endif
                                  value="0">All Countries</option>
                                @foreach (getCountries() as $country)
                                  <option
                                    @if (isset($taxes)) @if ($taxes->country_id === $country->id) selected @endif
                                    @else{{ old('country_id') == $country->id ? 'selected' : '' }} @endif value="{{ $country->id }}">{{ $country->name }}
                                    {{ $country->emoji }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Tax Name</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" placeholder="" maxlength='200' name="tax_name"
                                  id="metatitle"
                                  value="@if (isset($taxes)) {{ $taxes->tax_name }}@else{{ old('tax_name') }} @endif">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Tax Rate</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="number" required onKeyPress="if(this.value.length===3) return false;"
                                  min="1" max="100" class="form-control" placeholder="" name="tax_rate"
                                  id="metatitle"
                                  value="@if (isset($taxes)) {{ $taxes->tax_rate }}@else{{ old('tax_rate') }} @endif">
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
@endsection
