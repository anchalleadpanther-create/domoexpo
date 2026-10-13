@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <div class="content-header">
        <div class="d-flex align-items-center">
          <div class="me-auto">
            <h3 class="page-title">Custom Tailored Enquiries</h3>
          </div>
        </div>
      </div>
      <!-- Main content -->
      <section class="content">

        <div class="row">
          <div class="col-12">
            <div class="box">
              {{-- 
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
              --}}
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
                            <th width="2%">#</th>
                            <th width="15%">Product</th>
                            <th width="15%">Product Image</th>
                            <th width="15%">Enquiry Customer Details</th>
                            <th>Enquiry Details</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($enquiries as $key => $enquiry)
                            <tr class="hover-primary odd" role="row">
                              <td> {{ ++$key }} </td>
                              <td align="left">
                                <span>PID: {{ $enquiry?->product?->id }}</span><br />
                                <span>Name: {{ $enquiry?->product?->name }}</span><br />
                                <span>SKU: {{ $enquiry?->product?->sku }}</span><br />
                                <span>Brand: {{ $enquiry?->product?->brand?->brand_name }}</span>
                              </td>
                              <td>
                                <div class="avatar-md profile-user-wid mt-1">
                                  <img
                                    src="{{ !$enquiry?->product?->images->isEmpty() ? asset('uploads/products') . '/' . $enquiry?->product?->images[0]->image : asset('allUsers/icon-thumb.png') }}"
                                    class="" style="height: 60px; width: 60px;" />
                                </div>
                              </td>
                              <td align="left">
                                <span>Name: {{ $enquiry->name }}</span><br />
                                <span>Email: {{ $enquiry->email }}</span><br />
                                <span>Phone: {{ $enquiry->phone }}</span><br />
                                <span>Type: {{ $enquiry->query_type }}</span><br />
                                <span>Unit Type: {{ $enquiry->unit_type }}</span><br />
                                <span>Enquiry Date/Time: {{ $enquiry->created_at->format('d M, Y h:i A') }}</span><br />
                                <span>Message: {{ $enquiry->message }}</span>
                              </td>
                              <td align="left">
                                <div class="row">
                                  <div class="col">
                                    <div class="row">
                                      <div class="col-md-3">
                                        <span>Height:</span><br />
                                        <span>Stomach:</span><br />
                                        <span>Trouser Waist:</span><br />
                                        <span>Kurta Length:</span><br />
                                        <span>Sherwani Length:</span><br />
                                        <span>Upper Bust:</span><br />
                                        <span>Apex to Apex:</span><br />
                                        <span>Bust:</span><br />
                                        <span>Full Karte Legth:</span><br />
                                        <span>Under Bust:</span><br />
                                        <span>Armhole:</span><br />
                                        <span>Mid Waist:</span><br />
                                        <span>Bicep:</span><br />
                                        <span>Tummy:</span><br />
                                        <span>Elbow Round:</span><br />
                                        <span>Low Waist:</span><br />
                                        <span>Forearm:</span><br />
                                        <span>Hips:</span><br />
                                        <span>Sleeves Mori:</span><br />
                                        <span>Shoulder to Under Bust:</span><br />
                                        <span>Sleeves Length:</span><br />
                                        <span>Shoulder Slope:</span><br />
                                        <span>Neck Round:</span><br />
                                        <span>Shoulder:</span><br />
                                        <span>Front Neck Depth:</span><br />
                                        <span>Cross Front:</span><br />
                                        <span>Back Neck Depth:</span><br />
                                        <span>Cross Back:</span><br />
                                        <span>Waist Till Mid Thigh:</span><br />
                                        <span>Shoulder to Apex:</span><br />
                                      </div>
                                      <div class="col-md-9">
                                        <span>{{ $enquiry->height }}</span><br />
                                        <span>{{ $enquiry->stomach }}</span><br />
                                        <span>{{ $enquiry->trouser_waist }}</span><br />
                                        <span>{{ $enquiry->kurta_length }}</span><br />
                                        <span>{{ $enquiry->sherwani_length }}</span><br />
                                        <span>{{ $enquiry->upper_bust }}</span><br />
                                        <span>{{ $enquiry->apex_apex }}</span><br />
                                        <span>{{ $enquiry->bust }}</span><br />
                                        <span>{{ $enquiry->full_karte_legth }}</span><br />
                                        <span>{{ $enquiry->under_bust }}</span><br />
                                        <span>{{ $enquiry->arm_hole }}</span><br />
                                        <span>{{ $enquiry->mid_waist }}</span><br />
                                        <span>{{ $enquiry->bicep }}</span><br />
                                        <span>{{ $enquiry->tummy }}</span><br />
                                        <span>{{ $enquiry->elbow }}</span><br />
                                        <span>{{ $enquiry->low_waist }}</span><br />
                                        <span>{{ $enquiry->forearm }}</span><br />
                                        <span>{{ $enquiry->hip }}</span><br />
                                        <span>{{ $enquiry->sleeve_mori }}</span><br />
                                        <span>{{ $enquiry->shoulder_to_under_bust }}</span><br />
                                        <span>{{ $enquiry->sleeve_length }}</span><br />
                                        <span>{{ $enquiry->shoulder_slope }}</span><br />
                                        <span>{{ $enquiry->neck_round }}</span><br />
                                        <span>{{ $enquiry->shoulder }}</span><br />
                                        <span>{{ $enquiry->front_neck_depth }}</span><br />
                                        <span>{{ $enquiry->across_front }}</span><br />
                                        <span>{{ $enquiry->back_neck_depth }}</span><br />
                                        <span>{{ $enquiry->cross_back }}</span><br />
                                        <span>{{ $enquiry->waist_till_mid_thigh }}</span><br />
                                        <span>{{ $enquiry->shoulder_to_apex }}</span><br />
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col">
                                    <div class="row">
                                      <div class="col-md-4">
                                        <span>Trouser Length:</span><br />
                                        <span>Inseam Length:</span><br />
                                        <span>Thighs:</span><br />
                                        <span>Ankle:</span><br />
                                        <span>Skirt Length:</span><br />
                                        <span>Bottom:</span><br />
                                        <span>Mid Thighs:</span><br />
                                        <span>Pant Waist:</span><br />
                                        <span>Knees:</span><br />
                                        <span>Calf:</span><br />
                                        <span>Crotch Length:</span><br />
                                        <span>Pant Length:</span><br />
                                        <span>Upper Thighs:</span><br />
                                        <span>Pant Mori:</span><br />
                                      </div>
                                      <div class="col-md-8">
                                        <span>{{ $enquiry->trouser_length }}</span><br />
                                        <span>{{ $enquiry->inseam_length }}</span><br />
                                        <span>{{ $enquiry->thigh }}</span><br />
                                        <span>{{ $enquiry->ankle }}</span><br />
                                        <span>{{ $enquiry->skirt_length }}</span><br />
                                        <span>{{ $enquiry->bottom }}</span><br />
                                        <span>{{ $enquiry->mid_thigh }}</span><br />
                                        <span>{{ $enquiry->pant_waist }}</span><br />
                                        <span>{{ $enquiry->knee }}</span><br />
                                        <span>{{ $enquiry->calf }}</span><br />
                                        <span>{{ $enquiry->crotch_length }}</span><br />
                                        <span>{{ $enquiry->pant_length }}</span><br />
                                        <span>{{ $enquiry->upper_thigh }}</span><br />
                                        <span>{{ $enquiry->pant_mori }}</span><br />
                                      </div>
                                    </div>

                                  </div>
                                </div>
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
