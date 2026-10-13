@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 887px;">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      @include('extensions.alerts')
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-12">
            <div class="box">

              <div class="box-header with-border">
                <h4 class="box-title">Home-Page Testimonial</h4>
                <a class="btn btn-sm btn-bold btn-primary float-end" href="{{ route('admin.testimonials.create') }}">+
                  New Testimonial</a>
              </div>

              <div class="box-body">
                <div class="table-responsive">
                  <div id="example2_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    <div class="row">
                      <div class="col-sm-12 col-md-6"></div>
                      <div class="col-sm-12 col-md-6"></div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <table id="example2" class="table table-lg invoice-archive tr-odd_clr dataTable no-footer"
                          role="grid" aria-describedby="example2_info">
                          <thead>
                            <tr role="row">

                              <th width="2%" class="sorting_asc" tabindex="0" aria-controls="example2"
                                rowspan="1" colspan="1" aria-sort="ascending"
                                aria-label="Sl#: activate to sort column descending">Sl#
                              </th>

                              <th width="18%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" aria-label="Name: activate to sort column ascending">Name</th>

                              <th width="12%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" aria-label="Client Address: activate to sort column ascending">Occupation
                              </th>

                              <th width="10%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" aria-label="Next Call: activate to sort column ascending">Testimonial Sort
                              </th>

                              <th width="10%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" aria-label="Next Call: activate to sort column ascending">Photo</th>

                              <th width="15%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" aria-label="Client Followup: activate to sort column ascending">Testimonial
                                Status</th>

                              <th width="15%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" aria-label="Action: activate to sort column ascending">Action</th>

                            </tr>
                          </thead>
                          <tbody>
                            <form id="sorting-form" method="post"
                              action="{{ route('admin.home-testimonial-sort-update') }}">
                              @csrf
                              @foreach ($sliders as $key => $slider)
                                <input type="hidden" name="id[]" value="{{ $slider->id }}">
                                <tr role="row" class="odd">
                                  <td align="left" class="sorting_1">
                                    {{-- <input type="checkbox" id="md_checkbox_21" class="filled-in chk-col-primary">
													<label for="md_checkbox_21"></label> --}}
                                    {{ ++$key }}
                                  </td>

                                  <td align="left">
                                    {{ $slider->patient_name }}
                                  </td>

                                  <td align="left">
                                    {{ $slider->patient_occupation }}
                                  </td>

                                  <td align="left">
                                    <input type="number" min="0" name="sort[{{ $slider->id }}]"
                                      class="form-control w-auto" value="{{ $slider->sort }}">
                                  </td>

                                  <td align="left">
                                    <div class="row">
                                      <div class="col-md-4">
                                        <img src="{{ asset('/uploads/sliders') }}/{{ $slider->patient_photo }}"
                                          class="img-fluid">
                                      </div>
                                    </div>
                                  </td>

                                  <td align="left">
                                    @if ($slider->status === 1)
                                      {{ 'Active' }}
                                    @else
                                      {{ 'In-Active' }}
                                    @endif
                                  </td>

                                  <td>
                                    <a href="{{ route('admin.testimonials.edit', $slider->id) }}"
                                      class="waves-effect waves-light btn btn-default btn-flat mb-5 d-block"
                                      style="width:100%;font-size:12px;background:#989898 !important;color:#fff !important">
                                      Edit</a>
                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#modal-delete"
                                      onclick="destroyUrlUpdate(this)"
                                      data-destroy-url="{{ route('admin.testimonials.destroy', $slider->id) }}"
                                      class="waves-effect waves-light btn btn-default btn-flat mb-5"
                                      style="width:100%;font-size:12px;background:#989898 !important;color:#fff !important">
                                      Delete</a>
                                  </td>

                                </tr>
                              @endforeach
                            </form>
                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td><button form="sorting-form" class="btn btn-sm btn-success text-nowrap">Update
                                  Testimonials Sorting</button></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
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
