@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 1019px;">
    <div class="container-full">
      <section class="content">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-12">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">Buyers</h4>
                <a href="{{ route('admin.buyers.create') }}" class="btn btn-sm btn-bold btn-primary pull-right">+
                  Buyer</a>
                <a href="{{ route('admin.buyers.export-buyers') }}"
                  class="btn btn-sm btn-bold btn-primary me-2 pull-right">Export All</a>
                <div class="row mt-20">
                  <form method="get" action="{{ route('admin.buyers.index', ['new', '0']) }}">
                    <div class="col-3">
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search via Name, Email & Phone Number"
                          aria-label="Search via Name, Email & Phone Number" aria-describedby="basic-addon2"
                          name="search" value="{{ request()->get('search') }}">
                        <button type="submit" class="input-group-text bg-info" id="basic-addon2">Search</button>
                      </div>
                    </div>
                  </form>

                </div>
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
                                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" aria-label="KYC"> Name</th>

                            <th width="15%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" aria-label="KYC"> Email</th>
                                
                            <th width="15%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" aria-label="KYC">Phone</th>
                                
                                
                            <th width="15%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" aria-label="KYC">Membership</th>

                                
                              <th width="15%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" aria-label="KYC">Account</th>



                              <th width="10%" @class([
                                  'd-none' => Auth::user()->permission?->permission_type === 'view',
                              ]) tabindex="0" aria-controls="example2"
                                rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">
                                Action</th>

                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($buyers as $key => $buyer)
                              <tr role="row" class="odd">
                                <td align="left" class="sorting_1">
                                  {{ $key + 1 ?? '' }}
                                </td>
                                <td align="left">
                                  ID :   {{ $buyer->id ?? '' }}<br>
                                  Name : {{ $buyer->fullName }}<br>
                                  <b>Joined On : </b>{{ $buyer->created_at->format('d M, Y') }}
                                </td>
                                <td>
                                    {{ $buyer->email }}
                                </td>
                                
                                <td>
                                    {{ $buyer->phone }}
                                </td>
                                
                                <td align="left">
                                    
                                    @if($buyer->account_type != 'Buyer')
                                  
                                   Start : <span class=" text-success"> {{ !empty($buyer->membership_start_date) ? date('d M Y',strtotime($buyer->membership_start_date)) ?? '' : '--' }}</span> <br>
                                   End : <span class=" text-danger"> {{ !empty($buyer->membership_start_date) ? date('d M Y',strtotime($buyer->membership_expiry_date)) ?? '' : '--'  }} </span> <br>
                                @endif
                                </td>
                                
                                <td align="left">
                                  Type : <span class=" text-success"> {{ $buyer->account_type ?? '' }}</span> <br>
                                  @if ($buyer->status == 1)
                                    Status :   <span class=" text-primary">Approved</span> <br>
                                  @elseif($buyer->status == 0)
                                    Status :   <span class=" text-danger">New</span> <br>
                                  @elseif($buyer->status == 0)
                                  Status :   <span class=" text-danger">Inactive</span> <br>
                                  @endif
                                </td>
                               
                                
                                <td @class([
                                    'd-none' => Auth::user()->permission?->permission_type === 'view',
                                ])>
                                  
                                  <a href="{{ route('admin.buyers.edit', $buyer->id) }}"
                                    class="waves-effect waves-light btn btn-default btn-flat mb-5"
                                    title="Edit info of {{ $buyer->fullName }}"
                                    style="width:100%;font-size:12px;background:#989898 !important;color:#fff !important">
                                    Edit Info
                                  </a>
                                  <a href="{{ route('admin.buyers.address.create', $buyer->id) }}"
                                    class="waves-effect waves-light btn btn-default btn-flat mb-5"
                                    title="Add an address on behalf of {{ $buyer->fullName }}"
                                    style="width:100%;font-size:12px;background:#989898 !important;color:#fff !important">
                                    Add New Address
                                  </a>
                                  
                                @if($buyer->account_type != 'Buyer')
                                  
                                  <a href="javascript:void(0)" data-user-id="{{$buyer->id}}" data-bs-toggle="modal"  data-bs-target="#freePlanModal" class="waves-effect waves-light btn btn-default btn-flat mb-5 freePlanModal"
                                    style="width:100%;font-size:12px;background:#989898 !important;color:#fff !important"> Active Free Plan
                                  </a>
                                @endif
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                    {{ $buyers->links() }}
                  </div>

                </div>
              </div>
            </div>
          </div>

        </div>
      </section>
      <!-- /.content -->
    </div>
  </div>
  
  
    <!-- Modal -->
<div class="modal fade" id="freePlanModal" tabindex="-1" aria-labelledby="freePlanModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="freePlanModalLabel">Active Free Plan </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('admin.buyers.activete-subscription-plan')}}" method="post">
          @csrf
            <input type="hidden" name="buyer_id">
            <div class="modal-body">
            <div class="form-group">
                <label class="form-label">Select Duration</label>
                <select class="form-select" name="duration">
                    <option value="">select</option>
                    <option value="1 Month">1 Month</option>
                    <option value="3 Months">3 Months</option>
                    <option value="6 Months">6 Months</option>
                    <option value="1 Year">1 Year</option>
                </select>
            </div>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="Submit" class="btn btn-primary">Active Plan</button>
            </div>
      
      </form>
    </div>
  </div>
</div>


<script>
    $(document).ready(function(){
        $('.freePlanModal').on('click',function(){
            $('input[name="buyer_id"]').val('');
            let userID  = $(this).data('userId');
            $('input[name="buyer_id"]').val(userID);
        })
    })
</script>
@endsection
