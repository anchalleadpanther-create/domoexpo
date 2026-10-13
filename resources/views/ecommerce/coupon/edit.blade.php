@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <section class="content">

        <div class="row">
          <div class="col-sm-8">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">Edit Coupon</h4>
              </div>
              <div class="box-body">
                <!-- Tab panes -->
                <form action="{{ route('admin.coupon.update', $coupon->id) }}" method="post" id="coupon"
                  enctype="multipart/form-data">
                  @csrf
                  @method('PATCH')
                  <div class="tab-content">
                    <div class="tab-pane active" id="home4" role="tabpanel">
                      <div class="col-sm-12">
                        <div class="row grey-bg-clr">
                          <h5 class="mb-0">Coupon Info</h5>
                          <div class="col-md-12">
                            <hr>
                          </div>
                          <div class="clearfix"></div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Coupon Name *</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" name="name" id="name" maxlength="100"
                                  value="{{ $coupon->name }}" placeholder="" required>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Coupon Code</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" placeholder="" name="code" maxlength="500"
                                  id="metakeyword" value="{{ $coupon->code }}" required>
                              </div>
                            </div>
                          </div>
                          
                          
                          <div class="col-md-6 ">
                            <div class="form-group">
                              <label class="form-label">Coupon Type</label>
                              <div class="input-group mb-3">
                                <select class="form-control bg-white" name="coupon_type">
                                    <option value="Discount" @selected($coupon->coupon_type == 'Discount')>Discount</option>
                                    <option value="Add Duration In Subscriptions" @selected($coupon->coupon_type == 'Add Duration In Subscriptions')>Add Duration In Subscriptions</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          
                          
                          
                           <div class="col-md-6 couponPercentageDiv {{ empty($coupon->coupon_type) || $coupon->coupon_type == 'Discount' ? ''  : 'd-none' }}">
                            <div class="form-group">
                              <label class="form-label">Coupon Percentage Discount</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="number" min="1" max="100" class="form-control" placeholder=""
                                  name="percent" maxlength="500" id="metakeyword" value="{{ $coupon->percent ?? '' }}" required>
                              </div>
                            </div>
                          </div>
                          
                          <div class="col-md-6 couponDurationDiv  {{ $coupon->coupon_type == 'Add Duration In Subscriptions' ? ''  : 'd-none' }}">
                            <div class="form-group">
                              <label class="form-label">Add duration in months</label>
                              <div class="input-group mb-3">
                                <input type="number" name="duration" value="{{ $coupon->duration ?? '' }}" class="form-control">
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="row">
                              <div class="col">
                                <label class="form-label">Date From</label>
                                <input type="date" min="{{ date('Y-m-d') }}"
                                  value="{{ $coupon->date_from->format('Y-m-d') }}" name="date_from" class="form-control"
                                  required>
                              </div>
                              <div class="col">
                                <label class="form-label">Date Till</label>
                                <input type="date" min="{{ date('Y-m-d') }}"
                                  value="{{ $coupon->date_till->format('Y-m-d') }}" name="date_till" class="form-control"
                                  required>
                              </div>
                            </div>
                          </div>
                          
                          <div class="col-md-6">
                            <div class="form-group mt-3">
                                <input type="checkbox" id="is_one_time_use" name="is_one_time_use" value="1" {{ $coupon->is_one_time_use == 1  ? 'checked' : '' }}  class="form-checkbox">
                                <label class="form-label" for="is_one_time_use">Is one time use coupon?</label>
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
    $(document).ready(function () {
        $('select[name="coupon_type"]').on('change', function () {
            let coupon_type = $(this).val();
    
            if (coupon_type == 'Add Duration In Subscriptions') {
                $('.couponPercentageDiv').addClass('d-none');
                $('.couponDurationDiv').removeClass('d-none');
            } else {
                $('.couponPercentageDiv').removeClass('d-none');
                $('.couponDurationDiv').addClass('d-none');
            }
    
            // console.log(coupon_type);
        }).trigger('change'); 
    });
  </script>

  <!--<script type="text/javascript" src="{{ asset('allUsers/user/coupon.js') }}"></script>-->
@endsection
