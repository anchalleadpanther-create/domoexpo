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
                    <h4 class="title mb0">Supplier Support <a href="{{ route('admin.tickets.index') }}"
                        class="pull-right btn btn-basic btn-basic-color ">Raise A Ticket</a></h4>
                  </div>

                  <!-- Bootstrap core JavaScript
      ================================================== -->
                  <!-- Placed at the end of the document so the pages load faster -->


                  <div class="box-body">

                    <div class="clearfix"></div>
                    <div class="col-sm-12">
                      <div class="row mb30 account-filters">

                        <div class="col-sm-4 plr5">
                          <input type="text" placeholder="Search" class="form-control">
                        </div>
                        <div class="col-sm-3 plr5">
                          <select class="form-select" id="intType3" data-placeholder="Type to search cities"
                            name="intType3">
                            <option>Select Filter</option>
                            <option> Filter 1</option>
                            <option> Filter 2</option>
                          </select>

                        </div>
                        <div class="col-sm-3 plr5">
                          <select class="form-select" id="intType3" data-placeholder="Type to search cities"
                            name="intType3">
                            <option value="php">PHP</option>
                            <option value="javascript">JavaScript</option>
                            <option value="java">Java</option>
                            <option value="sql">SQL</option>
                            <option value="jquery">Jquery</option>
                            <option value=".net">.Net</option>
                          </select>

                        </div>
                        <div class="col-sm-2 plr5"><a href="" class="btn btn-basic-color btn-block"
                            style="width:100%">Filter</a></div>
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
                                      data-toggle="tooltip"
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
