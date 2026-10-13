@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 1019px;">
    <div class="container-full">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
        <div class="row">
          <form action="{{ route('admin.buyers.update', $buyer->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="col-12">

              <div class="row">

                <div class="col-md-8 ">
                  <div class="box">
                    <div class="box-header">
                      <h4 class="box-title">Buyer Detail</h4>
                    </div>

                    <div class="box-body">
                      <div class="inner-user-div4">
                          
                            {{--  --}}
                            <div class="row grey-bg-clr">
                              <h5 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                  <circle cx="12" cy="7" r="4"></circle>
                                </svg> User Status</h5>
                              <div class="col-md-12">
                                <hr>
                              </div>
                              <div class="clearfix"></div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="form-label text-success">Select Status</label>
                                  <select class="single" name="status">
                                    <option>Select</option>
                                    <option  value="1" {{$buyer->status == 1 ? 'selected' : ''}}>Approved</option>
                                    <option  value="2" {{$buyer->status == 2 ? 'selected' : ''}}>Disapprove</option>
                                    <option  value="3" {{$buyer->status == 3 ? 'selected' : ''}}>On Hold</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="form-label text-success">Status Reason</label>
                                  <select class="single" name="status_reason">
                                    <option value="">Select</option>
                                    <option value="Document Incomplete"  @selected($buyer->status_reason == 'Document Incomplete')>
                                      Document Incomplete
                                    </option>
                                    <option value="Criteria Mismatch"  @selected($buyer->status_reason == 'Criteria Mismatch')>
                                      Criteria Mismatch</option>
                                    <option  value="Wrong Information"   @selected($buyer->status_reason == 'Wrong Information')>
                                      Wrong Information</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="form-label text-success">Status Comment</label>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                    <input type="text" class="form-control" placeholder="Status Comment" value="{{$buyer->status_comment}}"
                                      maxlength="100" name="status_comment"
                                      value="">
                                  </div>
                                </div>
                               </div>
                            </div>
                            {{--  --}}
                          
                          
                        <div class="row mt-4">

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label text-success ">Contact Person Name</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" placeholder="First Name" maxlength="100"
                                  name="first_name" value="{{ $buyer->first_name }}" required>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label text-success ">Contact Person Surname</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" placeholder="Last Name" maxlength="100"
                                  name="last_name" value="{{ $buyer->last_name }}" required>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label text-success ">Contact Person Email</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="email" class="form-control" placeholder="E-Mail" maxlength="150"
                                  name="email" value="{{ $buyer->email }}" required>
                              </div>
                            </div>
                          </div>
                          
                             
                              <div class="col-md-2">
                                <div class="form-group">
                                  <label class="form-label text-success">Phonecode *</label>
                                  <div class="input-group mb-3">
                                   <select class="form-control bg-white single"  name="phonecode" id="phonecode-select" style="padding: 0; text-align: center;">
                                       <option value=""></option>
                                       @foreach(getCountries() as $country)
                                       <option value="{{$country->phonecode}}" @selected($buyer->phonecode == $country->phonecode)  data-image="{{ $country->flag_icon}}">{{$country->phonecode}}</option>
                                       @endforeach
                                   </select>
                                  </div>
                                </div>
                              </div>
                                
                          
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="form-label text-success ">Mobile No.</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="number" min="0" class="form-control" placeholder="Phone No"
                                  name="phone" value="{{ $buyer->phone }}">
                              </div>
                            </div>
                          </div>
                          
                            <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label text-success ">Password</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="password" min="0" class="form-control" placeholder="Password"
                                  name="password" >
                              </div>
                            </div>
                          </div>
                          
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label text-success ">Confirm Password</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="password" min="0" class="form-control" placeholder="Password"
                                  name="password_confirmation" >
                              </div>
                            </div>
                          </div>

                          <div class="col-md-12 my-3">
                            <button class="btn btn-success">Save</button>
                          </div>


                        </div>



                      </div>

                    </div>
                  </div>
                </div>

              </div>

            </div>
            <!-- /.box -->

          </form>
        </div>
        <!-- /.col-->
      </section>
    </div>
    <!-- ./row -->

    <!-- /.content -->
  </div>
  
  
  <script>
       $(document).ready(function() {
            
             
            $('#phonecode-select,#companyphonecode').select2({
                templateResult: formatState,
                templateSelection: formatState
            });
        
           
            function formatState(state) {
                if (!state.id) {
                    return state.text; // Return the text for placeholder
                }
        
                var baseUrl = $(state.element).data('image');
                var $state = $(
                    '<span><img src="' + baseUrl + '" class="img-flag" style="width: 20px; margin-right: 10px;"/>' + state.text + '</span>'
                );
                return $state;
            }
        });
  </script>
@endsection
