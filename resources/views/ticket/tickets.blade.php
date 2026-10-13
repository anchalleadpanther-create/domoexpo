@extends('user.header')
@section('userContent')
  


  <div class="content-wrapper" style="min-height: 1019px;">
    <div class="container-full">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-12">
            <div class="row">
              <div class="col-xl-2 col-12">
                <div class="box listing_menu">
                  <div class="box-header">
                    <h4 class="box-title">Manage Orders</h4>
                  </div>

                  <div class="box-body">
                    <div class="inner-user-div4">
                      <ul>
                        <li><a href="{{ route('admin.new-tickets') }}"> New Tickets (22)</a></li>
                        <li><a href="{{ route('admin.open-tickets') }}">Open Tickets (17)</a></li>
                        <li><a href="#">In Process Tickets (2)</a></li>
                        <li><a href="{{ route('admin.close-tickets') }}">Closed Tickets (12)</a></li>
                        <li><a href="{{ route('admin.tickets.index') }}">Add New Ticket</a></li>

                      </ul>

                    </div>

                  </div>
                </div>
              </div>
              <div class="col-xl-10 col-12">
                <div class="box">
                  <div class="box-header with-border">
                    <h4 class="title mb0">Add Ticket </h4>
                  </div>

                  <div class="box-body">

                    <form method="post" action="@if(isset($ticket)){{ route('admin.tickets.update', $ticket->id) }}@else{{ route('admin.tickets.store') }}@endif" enctype="multipart/form-data">
                      @csrf
                      @if(isset($ticket)) @method('PATCH') @endif
                      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                          <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                <i class="fa fa-angle-right"></i> Raise A Ticket
                              </a>
                            </h4>
                          </div>
                          <div id="collapseOne" class="panel-collapse collapse in show" role="tabpanel"
                            aria-labelledby="headingOne">
                            <div class="panel-body" style="border: 1px solid #d1d3e0 !important;">
                              <fieldset id="personal-details">
                                <div class="row">
                                  <div class="col-sm-4">
                                    <div class="form-group required">
                                      <label for="input-firstname" class="control-label">Related to</label>
                                      <select class="form-select" id="input-firstname"
                                        data-placeholder="Type to search cities" name="related_to" required>
                                        <option value="">Select</option>
                                        <option @if (isset($ticket)) @if ($ticket->related_to === 'Listing') selected @endif @else @if (old('related_to') === 'Listing') selected @endif @endif value="Listing">Listing</option>
                                        <option @if (isset($ticket)) @if ($ticket->related_to === 'RFQ') selected @endif @else @if (old('related_to') === 'RFQ') selected @endif @endif value="RFQ">RFQ</option>
                                        <option @if (isset($ticket)) @if ($ticket->related_to === 'RFI') selected @endif @else @if (old('related_to') === 'RFI') selected @endif @endif value="RFI">RFI</option>
                                        <option @if (isset($ticket)) @if ($ticket->related_to === 'PO') selected @endif @else @if (old('related_to') === 'PO') selected @endif @endif value="PO">PO</option>
                                        <option @if (isset($ticket)) @if ($ticket->related_to === 'Order') selected @endif @else @if (old('related_to') === 'Order') selected @endif @endif value="Order">Order</option>
                                      </select>

                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="form-group required">
                                      <label for="input-firstname" class="control-label">Select Category</label>
                                      <select class="form-select" id="input-firstname"
                                        data-placeholder="Type to search cities" name="category">
                                        <option value="">Select</option>

                                        <option @if (isset($ticket)) @if ($ticket->category === 'Category A') selected @endif @else @if (old('category') === 'Category A') selected @endif @endif value="Category A">Category A</option>
                                        <option @if (isset($ticket)) @if ($ticket->category === 'Category B') selected @endif @else @if (old('category') === 'Category B') selected @endif @endif value="Category B">Category B</option>
                                        <option @if (isset($ticket)) @if ($ticket->category === 'Category C') selected @endif @else @if (old('category') === 'Category C') selected @endif @endif value="Category C">Category C</option>
                                      </select>

                                    </div>
                                  </div>
                                  {{-- <div class="col-sm-4">
                                    <div class="form-group required">
                                      <label for="input-firstname" class="control-label">Select Sub Category</label>
                                      <select class="form-select" id="input-firstname"
                                        data-placeholder="Type to search cities" name="sub_category">
                                        <option value="">Select</option>

                                        <option @if (isset($ticket)) @if ($ticket->sub_category === 'Category A') selected @endif @else @if (old('sub_category') === 'Category A') selected @endif @endif value="Category A">Category A</option>
                                        <option @if (isset($ticket)) @if ($ticket->sub_category === 'Category B') selected @endif @else @if (old('sub_category') === 'Category B') selected @endif @endif value="Category B">Category B</option>
                                        <option @if (isset($ticket)) @if ($ticket->sub_category === 'Category C') selected @endif @else @if (old('sub_category') === 'Category C') selected @endif @endif value="Category C">Category C</option>
                                      </select>

                                    </div>
                                  </div> --}}

                                  <div class="col-sm-4">
                                    <div class="form-group required">
                                      <label for="input-firstname" class="control-label">Upload File </label>
                                      <input type="file" class="form-control" id="input-firstname" placeholder="Enter "
                                        value="" name="ticket_file[]" multiple>
                                    </div>
                                  </div>

                                  <div class="col-sm-4">
                                    <div class="form-group required">
                                      <label for="input-firstname" class="control-label">Against </label>
                                      <select class="form-select" id="input-firstname"
                                        data-placeholder="Type to search cities" name="against">
                                        <option value="">Select</option>
                                        <option @if (isset($ticket)) @if ($ticket->against === 'Buyer') selected @endif @else @if (old('against') === 'Buyer') selected @endif @endif value="Buyer">Buyer</option>
                                        <option @if (isset($ticket)) @if ($ticket->against === 'Admin') selected @endif @else @if (old('against') === 'Admin') selected @endif @endif value="Admin"> Admin</option>
                                        <option @if (isset($ticket)) @if ($ticket->against === 'Other Supplier') selected @endif @else @if (old('against') === 'Other Supplier') selected @endif @endif value="Other Supplier"> Other Supplier</option>
                                      </select>

                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="form-group required">
                                      <label for="input-firstname" class="control-label">Select </label>
                                      <select class="form-select" id="input-firstname"
                                        data-placeholder="Type to search cities" name="select_t">
                                        <option value="">Select</option>
                                        <option @if (isset($ticket)) @if ($ticket->select_t === 'A') selected @endif @else @if (old('select_t') === 'A') selected @endif @endif value="A">A</option>
                                        <option @if (isset($ticket)) @if ($ticket->select_t === 'B') selected @endif @else @if (old('select_t') === 'B') selected @endif @endif value="B">B</option>
                                        <option @if (isset($ticket)) @if ($ticket->select_t === 'C') selected @endif @else @if (old('select_t') === 'C') selected @endif @endif value="C">C</option>
                                      </select>

                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group required">
                                      <label for="input-firstname" class="control-label">Issue Title</label>
                                      <input type="text" class="form-control" id="input-firstname" placeholder="Enter" required
                                        value="@if (isset($ticket)){{ $ticket->issue_title }}@else{{ old('issue_title') }}@endif" maxlength="250" name="issue_title">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group required">
                                      <label for="input-firstname" class="control-label">Issue Description </label>
                                      <input type="text" class="form-control" id="input-firstname" placeholder="Enter "
                                        value="@if (isset($ticket)){{ $ticket->issue_description }}@else{{ old('issue_description') }}@endif" maxlength="250" name="issue_description">
                                    </div>
                                  </div>
                                  <div class="col-sm-12">
                                    <button type="submit" class="waves-effect waves-light btn btn-dark mb-5"><i
                                        class="fa fa-check"></i> Save</button>
                                  </div>
                                </div>

                              </fieldset>

                            </div>
                          </div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="table-responsive">
                          <table class="table table-bordered table-hover wishlist">
                            <thead>
                              <tr>
                            <td class="text-center"><input type="checkbox" id="md_checkbox_20"
                                class="filled-in chk-col-primary">
                              <label for="md_checkbox_20"></label>
                            </td>
                            <td class="text-left">COMPLAIN DETAILS</td>
                            <td class="text-center" width="40%">TICKET DETAILS</td>
                            <td class="text-left">ASSIGNED TO</td>
                            <td class="text-left">ACTION</td>
                          </tr>
                            </thead>
                            <tbody>
                              @foreach($tickets as $ticket)
                              <tr>
                                <td class="text-center"><input type="checkbox" id="md_checkbox_21"
                                    class="filled-in chk-col-primary">
                                  <label for="md_checkbox_21"></label>
                                </td>
                                <td class="text-left">
                                  <p class="no-margin">Date : {{ $ticket->created_at->format('Y-M-d') }}<br>
                                    Category: <a href="javascript:;" style="color:#2677e7">{{ $ticket->category }}</a><br>
                                    Related: {{ $ticket->related_to }}<br>
                                    By : Webkype <br/>
                                    Against : {{ $ticket->against }} 
                                  </p>
                                </td>

                                <td class="text-left">
                                  <p class="no-margin">Title : {{ $ticket->issue_title }}<br>
                                    Description: {{ $ticket->issue_description }}<br>
                                  </p>
                                </td>
                                <td align="left">
                                <div class="row">
                                  <div class="col-sm-3"> <a class="avatar avatar-md " href="#" style="margin-top:3px">
                                      <img src="{{ asset('allUsers/user/images/avatar/avatar-1.png') }}" class="bg-success-light" alt="...">
                                    </a></div>
                                  <div class="col-sm-9" style="padding:0">
                                    <a href="#">Admin Manager</a>
                                    <span class="d-block text-muted">{{ $ticket->created_at->format('Y-M-d') }}</span>
                                  </div>
                                </div>


                              </td>
                                <td class="text-left">
                                  <a href="{{ route('admin.tickets.show', $ticket->id) }}" class="btn btn-basic btn-basic-color" data-toggle="tooltip"
                                    data-original-title="Respond"> View</a>
                                     <a href="{{ route('admin.tickets.show', $ticket->id) }}" 
                                      @if($ticket->status === 0)
                                      class="btn btn-basic btn-git"
                                      @elseif($ticket->status === 1)
                                      class="btn btn-basic btn-primary"
                                      @elseif($ticket->status === 2)
                                      class="btn btn-basic btn-danger"
                                      @elseif($ticket->status === 3)
                                      class="btn btn-basic btn-warning"
                                      @endif
                                    data-original-title="Respond">
                                      @if($ticket->status === 0)
                                      {{ "New" }}
                                      @elseif($ticket->status === 1)
                                      {{ "Open" }}
                                      @elseif($ticket->status === 2)
                                      {{ "Closed" }}
                                      @elseif($ticket->status === 3)
                                      {{ "Hold" }}
                                      @endif
                                  </a>
                                  {{-- <a href="#" class="btn  btn-basic btn-basic-color" data-toggle="tooltip"
                                    data-original-title="Junk"><i class="fa fa-trash"></i></a> --}}
                                  {{-- <a href="{{ route('admin.tickets.edit', $ticket->id) }}" class="btn  btn-basic btn-basic-color" data-toggle="tooltip"
                                    data-original-title="Re-Open"><i class="fa fa-pencil-square-o"></i></a> --}}

                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>



                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>

      </section>
    </div>

    <!-- /.content -->
  </div>

@endsection
