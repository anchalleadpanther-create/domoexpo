@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <div class="content-header">
        <div class="d-flex align-items-center">
          <div class="me-auto">
            <h3 class="page-title">Coupons</h3>
            <div class="d-inline-block align-items-center">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">Ecommerce</li>
                  <li class="breadcrumb-item active" aria-current="page"><a
                      href="{{ route('admin.coupon.index') }}">Coupons</a></li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="box">
              <div class="box-header with-border">
                <div class="pull-right col-sm-12 col-md-12">
                  <div class="row">
                    <div class="col-md-12 text-right">
                      <a href="{{ route('admin.coupon.create') }}"
                        class="waves-effect waves-light btn mb-5 bg-gradient-primary pull-right">
                        Add Coupon
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-body py-0 px-1">
                <div class="table-responsive rounded card-table">

                  <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    <table class="table border-no no-footer table-sm" id="example1" role="grid"
                      aria-describedby="example1_info">
                      <thead>
                        <tr role="row">
                          <th>#</th>
                          <th>Name</th>
                          <th>Code</th>
                          <th>Create By</th>
                          <th>Coupon Type</th> 
                          <th>Valid From</th>
                          <th>Valid Till</th>
                          <th>Status</th>
                          <th @class([
                              'text-center',
                              'd-none' => Auth::user()->permission?->permission_type === 'view',
                          ]) width='20%'>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($coupons as $key => $coupon)
                          <tr class="hover-primary odd" role="row">
                            <td> {{ ++$key }} </td>
                            <td>
                              {{ $coupon->name }}
                            </td>
                            
                            <td>
                              {{ $coupon->code ?? '' }}
                            </td>

                            <td>
                              <span>Name: {{ $coupon->user?->name }}</span><br />
                              <span>Email: {{ $coupon->user?->email }}</span><br />
                              <span>At: {{ $coupon->created_at->format('d M, Y') }}</span>
                            </td>

                            <td>
                                <span>Type : {{ $coupon->coupon_type ?? '' }}</span><br />
                                <span>Value : {{ $coupon->coupon_type  == 'Discount' ? $coupon->percent . '%' : $coupon->duration }}</span><br /> 
                              
                            </td>

                            <td>
                              {{ $coupon->date_from->format('d M, Y') }}
                            </td>

                            <td>
                              {{ $coupon->date_till->format('d M, Y') }}
                            </td>


                            <td>
                              @if ($coupon->status == 1)
                                <span class="badge badge-success">Active</span>
                              @else
                                <span class="badge badge-danger">Inactive</span>
                              @endif
                            </td>

                            <td @class([
                                'text-center',
                                'd-none' => Auth::user()->permission?->permission_type === 'view',
                            ])>
                              <!-- Button trigger modal -->
                              <a href="{{ route('admin.coupon.edit', $coupon->id) }}" title="Edit category"
                                type="button" class="badge badge-pill badge-primary"> <i class="fa fa-pencil"></i></a>
                              <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#modal-delete"
                                title="Delete category" onclick="destroyUrlUpdate(this)"
                                data-destroy-url="{{ route('admin.coupon.destroy', $coupon->id) }}" type="button"
                                class="badge badge-pill badge-danger delete" href="JavaScript:void(0);"><i
                                  class="fa fa-trash"></i></a>
                              <a href="{{ route('admin.coupon.status', [$coupon->id, $coupon->status === 1 ? 0 : 1]) }}"
                                title="{{ $coupon->status === 1 ? 'Tap to Disable' : 'Tap to Enable' }}"
                                class="badge badge-pill badge-success disable" catid="0011-0">
                                @if ($coupon->status === 1)
                                  <i class="fa fa-toggle-on"></i>
                                @else
                                  <i class="fa fa-toggle-off"></i>
                                @endif
                              </a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
