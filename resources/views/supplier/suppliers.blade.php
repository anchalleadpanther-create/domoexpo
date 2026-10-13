@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 1019px;">
    <div class="container-full">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-12">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">Designer</h4>
                {{-- <a href="{{ route('admin.suppliers.create') }}" class="btn btn-sm btn-bold btn-primary pull-right">+
                  Designer</a> --}}
                <a href="{{ route('admin.export-suppliers') }}" class="btn btn-sm btn-bold btn-primary pull-right">Export
                  All</a>
                <div class="row mt-20">
                  <form method="get" action="{{ route('admin.supplier.index', ['new', '0']) }}">
                    <div class="col-3">
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search via Name, Email & Phone Number"
                          aria-label="Search via Name, Email & Phone Number" aria-desc    ribedby="basic-addon2"
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
                                aria-label="Sl#: activate to sort column descending">#
                              </th>
                        
                               <th width="30%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" aria-label="Auth Representative">Personal Info</th>

                              <th width="30%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" aria-label="Auth Representative">Membership </th>

                        
                             
                              <th width="25%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" aria-label="Registration">Status
                              </th>
                            

                              
                              <th width="10%" @class([
                                  'd-none' => Auth::user()->permission?->permission_type === 'view',
                              ]) tabindex="0" aria-controls="example2"
                                rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">
                                Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($suppliers as $key => $supplier)
                              <tr role="row" class="odd">
                                <td align="left" class="sorting_1">
                                  {{ ++$key }}
                                </td>

                                <td align="left">

                                  <div class="row">
                                   
                                    <div class="col-sm-12">
                                      <a href="#">Name: {{ $supplier->biz_name }}</a>
                                      <span class="d-block text-muted">Business Name: {{ $supplier->business_name }}</span>
                                      <span class="d-block text-muted">Phone:{{ $supplier->biz_phone }}</span>
                                      <span class="d-block text-muted">Email: {{ $supplier->biz_email }}</span>
                                      <span class="d-block text-muted">Position: {{ $supplier->getSellerPosition?->dropdown_value   }}</span>

                                      <span class="d-block text-muted">Onboarding on:
                                        {{ $supplier->created_at->format('d M, Y h:i A') }}</span>
                                    
                                    </div>
                                  </div>
                                </td>
                                <td align="left">
                                    
                                    @if($supplier->account_type != 'Buyer')
                                      
                                       Start : <span class=" text-success"> {{ !empty($supplier->membership_start_date) ? date('d M Y',strtotime($supplier->membership_start_date)) ?? '' : '--' }}</span> <br>
                                       End : <span class=" text-danger"> {{ !empty($supplier->membership_expiry_date) ? date('d M Y',strtotime($supplier->membership_expiry_date)) ?? '' : '--' }} </span> <br>
                                    @endif
                                </td>
                       
                                <td align="left">
                                      Receive Quotation Status :   <span class=" text-primary">{{$supplier->receiveQuotationStatus ?? 'Enabled'}}</span> <br>
                                      Supplier Login Status :   <span class=" text-primary">{{$supplier->supplierLoginStatus ?? 'Enabled'}}</span> <br>
                                      Supplier Account Status :   <span class=" text-primary">{{$supplier->supplierAcountStatus ?? 'Enabled'}}</span> <br>
                                </td>
                             
                             
                                <td @class([
                                    'd-none' => Auth::user()->permission?->permission_type === 'view',
                                ])>

                                <a href="{{ route('admin.suppliers.show', $supplier->id) }}" class="waves-effect waves-light btn btn-default btn-flat mb-5"
                                    style="width:100%;font-size:12px;background:#989898 !important;color:#fff !important">View/edit Details
                                  </a>

                                  <a href="{{ route('admin.suppliers.edit', $supplier->id) }}"
                                    class="waves-effect waves-light btn btn-default btn-flat mb-5 d-none "
                                    style="width:100%;font-size:12px;background:#989898 !important;color:#fff !important">
                                    Update</a>
                                  <a href="{{ route('admin.supplier.status', [$supplier->id, $supplier->status === 1 ? 0 : 1]) }}"
                                    class="waves-effect waves-light btn btn-default btn-flat mb-5"
                                    title="{{ $supplier->status === 1 ? 'Tap to Disable' : 'Tap to Enable' }}"
                                    style="width:100%;font-size:12px;background:#989898 !important;color:#fff !important">
                                    @if ($supplier->status === 1)
                                      Enabled
                                    @else
                                      Disabled
                                    @endif
                                  </a>
                                  
                                  <a href="{{ route('admin.supplier.quotation-status', [$supplier->id, $supplier->quotation_status == 1 ? 0 : 1]) }}"
                                    class="waves-effect waves-light btn btn-default btn-flat mb-5"
                                    title="{{ $supplier->quotation_status === 1 ? 'Tap to Disable' : 'Tap to Enable' }}"
                                    style="width:100%;font-size:12px;background:#989898 !important;color:#fff !important">
                                    @if ($supplier->quotation_status === 1)
                                      Receive Quotation Enabled
                                    @else
                                      Receive Quotation Disabled
                                    @endif
                                  </a>
                                  
                                  <a href="{{route('admin.supplier.mapped-category',[$supplier->id])}}"  class="waves-effect waves-light btn btn-default btn-flat mb-5"
                                    style="width:100%;font-size:12px;background:#989898 !important;color:#fff !important"> Mapped Category
                                  </a>
                                  
                                  
                                  <a href="javascript:void(0)" data-supplier-id="{{$supplier->id}}" data-bs-toggle="modal"  data-bs-target="#freePlanModal" class="waves-effect waves-light btn btn-default btn-flat mb-5 freePlanModal"
                                    style="width:100%;font-size:12px;background:#989898 !important;color:#fff !important"> Active Free Plan
                                  </a>
                                  
                                  
                                  
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                    {{ $suppliers->links() }}
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
      <form action="{{route('admin.supplier.activete-subscription-plan')}}" method="post">
          @csrf
            <input type="hidden" name="supplier_id">
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
            $('input[name="supplier_id"]').val('');
            let supplierID  = $(this).data('supplierId');
            $('input[name="supplier_id"]').val(supplierID);
        })
    })
</script>
@endsection
