@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <div class="content-header">
        <div class="d-flex align-items-center">
          <div class="me-auto">
            <h3 class="page-title">Product Enquiries</h3>
            <div class="d-inline-block align-items-center">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">Products</li>
                  <li class="breadcrumb-item active" aria-current="page">Product Enquiries</li>
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
                    <div class="col-md-3">
                      <h4 class="box-title">Product Enquiries</h4>
                    </div>
                    <div class="col-sm-6" style="padding-top: 10px;">
                    </div>
                    <div class="col-md-3 text-right">
                    </div>
                  </div>
                </div>
              </div>
              <div class="box">
                <div class="box-body">
                  <div class="table-responsive rounded card-table">

                    <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                      <div class="row">
                        <div class="col-sm-12 col-md-6"></div>
                        <div class="col-sm-12 col-md-6"></div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                        </div>
                      </div>
                      <table class="table border-no dataTable no-footer" id="example1" role="grid"
                        aria-describedby="example1_info">
                        <thead>
                          <tr role="row">
                            <th>#</th>
                            <th width="30%">Product</th>
                            <th>Product Image</th>
                            <th>Customer Details</th>
                            <!--<th>Enquiry Subject</th>-->
                            <th>Enquiry Message</th>
                            <th>Enquiry Date/Time</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($enquiries as $key => $enquiry)
                            <tr class=" odd" role="row">
                              <td> {{ ++$key }} </td>
                              <td align="left">
                                PID: {{ $enquiry->product->id }}<br />
                                Name: {{ $enquiry->product->name }}<br />
                                SKU: {{ $enquiry->product->sku }}<br />
                                Brand: {{ $enquiry->product->brand?->brand_name }}
                              </td>
                              <td>
                                <div class="avatar-md profile-user-wid mt-1">
                                  {{-- $product->images[0]->image --}}

                                  <img
                                    src="{{ !$enquiry->product->images->isEmpty() ? asset('uploads/products') . '/' . $enquiry->product->images[0]->image : asset('allUsers/icon-thumb.png') }}"
                                    class=" " style="height: 60px; width: 60px;">
                                </div>
                              </td>
                              <td align="left">
                                Name: {{ $enquiry->first_name ?? '' }} {{ $enquiry->last_name ?? '' }}<br />
                                Email: {{ $enquiry->email }}<br />
                                Phone: {{ $enquiry->phone }}
                              </td>
                              <!--<td>-->
                              <!--  {{ $enquiry->subject }}-->
                              <!--</td>-->
                              <td>
                                {{ $enquiry->message }}
                              </td>
                              <td>
                                {{ $enquiry->created_at->format('d M, Y h:i A') }}
                              </td>
                            </tr>
                          @endforeach

                        </tbody>
                      </table>
                    </div>
                  </div>
                  {{ $enquiries->links() }}
                </div>
              </div>
            </div>
          </div>
      </section>
    </div>
  </div>
@endsection
