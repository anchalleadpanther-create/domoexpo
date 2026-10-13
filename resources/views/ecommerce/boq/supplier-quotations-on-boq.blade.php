



@extends('user.header')
@section('userContent')
<style>
  .box {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    border: 1px solid #e3e6f0;
  }

  .box-header {
    padding: 20px;
    border-bottom: 1px solid #e3e6f0;
  }

  .box-title {
    margin: 0;
    font-size: 18px;
    font-weight: 600;
    color: #333;
  }

  .box-body {
    padding: 20px;
  }

  .card-table {
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
  }

  /* Buyer Form Styles */
  .bg-danger-light {
    background-color: #ffcacf;
  }

  .bg-primary-light {
    background-color: #badbff;
  }

  .bg-success-light {
    background-color: #d4edda;
  }

  .form-step {
    display: none;
  }

  .form-step.active {
    display: block;
  }

  .progressbar {
    counter-reset: step;
    display: flex;
    justify-content: space-between;
    padding-left: 0;
    list-style: none;
  }

  .progressbar li {
    position: relative;
    text-align: center;
    flex: 1;
    color: #999;
  }

  .progressbar li::before {
    content: counter(step);
    counter-increment: step;
    width: 30px;
    height: 30px;
    display: block;
    margin: 0 auto 10px;
    border-radius: 50%;
    background: #ccc;
    color: white;
    line-height: 30px;
  }

  .progressbar li::after {
    content: '';
    position: absolute;
    width: 100%;
    height: 2px;
    background: #ccc;
    top: 15px;
    left: -50%;
    z-index: -1;
  }

  .progressbar li:first-child::after {
    content: none;
  }

  .progressbar li.active {
    color: #000;
  }

  .progressbar li.active::before,
  .progressbar li.active::after {
    background: #000;
  }

  /* MODAL FIXES */
  .modal {
    z-index: 1055 !important;
  }

  .modal-backdrop {
    z-index: 1050 !important;
  }

  .modal-header {
    background: #fff !important;
    border-bottom: 1px solid #dee2e6 !important;
    color: #333 !important;
  }

  .modal-title {
    color: #333 !important;
  }

  .close {
    color: #666 !important;
    font-weight: 400 !important;
  }

  .close:hover {
    color: #000 !important;
  }

  .modal-content {
    border-radius: 8px !important;
  }

  .modal-body {
    color: #333 !important;
  }
</style>

<!-- Content Wrapper -->
<div class="content-wrapper " style="min-height: 630px;">
  <div class="container-full  my-5">
    <!-- Content Header -->
    <div class="content-header">
      <div class="d-flex align-items-center">
        <div class="me-auto">
          <h3 class="page-title">BOQ Request Form</h3>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Dashboard</li>
              <li class="breadcrumb-item active">BOQ Details</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="row ">
        <div class="col-12">
          <div class="box">
            <div class="box-header with-border">
              <h4 class="box-title">BOQ Request Form</h4>
            </div>

            <div class="box-body p-0">
              <div class="ps-my-account">
                <div class="ps-form--account ps-tab-root ps-form--account-width" style="border-radius:10px !important">
                  <ul class="progressbar mb-4">
                    <li class="active">Project Info</li>
                    <li>BOQ Details</li>
                  </ul>

                  <!-- Step 1 -->
                  <div class="form-step active">
                    <div id="category-groups-wrapper">
                      @if(isset($project->getBoqMainItem) && count($project->getBoqMainItem) > 0)
                      @foreach($project->getBoqMainItem as $mainKey => $mainItem)
                      <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center bg-light p-2 border">
                          <div>
                            <strong>Category {{ $mainKey + 1 }} :</strong>
                            <span class="text-success">{{ $mainItem->getCategory?->category_name ?? '' }} ({{count($mainItem->getSubItem) ?? 0}})</span>
                          </div>
                        </div>

                        <div style="overflow-x: auto;">
                          <table class="table table-bordered table-striped mb-0" style="min-width: 1500px;">
                            <thead class="bg-light">
                              <tr class="fw-bold text-nowrap">
                                <th>Sub category</th>
                                <th>Sub Sub Category</th>
                                <th>Supplier Quotations</th>
                                <th>Description</th>
                                <th>Unit</th>
                                <th>Qty</th>
                                <th>Rate</th>
                                <th>Amount</th>
                                <th>Reference</th>
                                <th class="bg-danger-light">Rate from architect</th>
                                <th class="bg-primary-light">Rate to architect + Mark up</th>
                                <th class="bg-success-light">Amount</th>
                                <th>Contractor Remarks</th>
                                <th>View Supplier Rates</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($mainItem->getSubItem as $subKey => $subItem)
                              <tr>
                                <td>{{ $subItem->getSubCategory?->category_name ?? 'N/A' }}</td>
                                <td>{{ $subItem->getSubSubCategory?->category_name ?? 'N/A' }}</td>
                                <td>{{ count($subItem->getSupplierRate) ?? 'N/A' }}</td>
                                <td>{{ $subItem->description ?? '' }}</td>
                                <td>{{ $subItem->unit ?? '' }}</td>
                                <td>{{ $subItem->quantity ?? '' }}</td>
                                <td>{{ $subItem->rate ?? '' }}</td>
                                <td>{{ $subItem->amount ?? '' }}</td>
                                <td>
                                  @if(isset($subItem->reference_file))
                                  <a class="text-success" target="_blank" href="{{ asset('uploads/rfq/'.$subItem->attachment_file) }}">
                                    <i class="fa fa-download"></i>
                                  </a>
                                  @else
                                  N/A
                                  @endif
                                </td>
                                <td class="bg-danger-light">{{ $subItem->amount ?? '' }}</td>
                                <td class="bg-primary-light">{{ $subItem->getSupplierRate()->where('contractor_id',$contractor_id)->where('boq_sub_item_id',$subItem->id)->first()?->total_contractor_rate ??  0 }}</td>
                                <td class="bg-success-light">{{ $subItem->getSupplierRate()->where('contractor_id',$contractor_id)->where('boq_sub_item_id',$subItem->id)->first()?->total_contractor_rate ??  '' }}</td>
                                <td>{{ $subItem->getSupplierRate()->where('contractor_id',$contractor_id)->where('boq_sub_item_id',$subItem->id)->first()?->contractor_remark ??  0 }}</td>

                                @if($mainItem->getCategory?->category_name != 'Contractor Work')
                                <td class="text-center">
                                  <button type="button" class="btn btn-md btn-dark" data-toggle="modal" data-target="#supplierRatesModal{{$subItem->id}}" data-backdrop="static">
                                    View Supplier Rates
                                  </button>

                                    <!-- Supplier Rate Modal -->
                                        <div class="modal fade" id="supplierRatesModal{{$subItem->id}}" tabindex="-1" role="dialog" aria-labelledby="supplierRatesModalLabel" aria-hidden="true">
                                                                      <div class="modal-dialog modal-xl" role="document">
                                                                        <div class="modal-content">
                                                                    
                                                                          <div class="modal-header">
                                                                            <h5 class="modal-title" id="supplierRatesModalLabel">Supplier Rate Details </h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                              <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                          </div>
                                                                           <form class="markupForm" action="{{ route('buyer.add-contractor-markup-to-quote-architect') }}" method="post">
                                                                                @csrf
                                                                            
                                                                                <!-- Hidden fields that will get populated by JavaScript -->
                                                                                <input type="hidden" name="added_contractor_markup" class="final-added-contractor-markup">
                                                                                <input type="hidden" name="supplier_rate_id" class="final-supplier-rate-id">
                                                                            
                                                                                <div class="modal-body">
                                                                                    <h6 class="mb-3">Item Basic Info</h6>
                                                                                    <table class="table table-bordered table-striped mb-0 mb-4">
                                                                                        <thead class="bg-light">
                                                                                            <tr class="text-nowrap">
                                                                                                <th>Sub Category</th>
                                                                                                <th>Sub Sub Category</th>
                                                                                                <th>Unit</th>
                                                                                                <th>Quantity</th>
                                                                                                <th>Rate</th>
                                                                                                <th>Architect Amount</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td>{{ $subItem->getSubCategory?->category_name ?? 'N/A' }}</td>
                                                                                                <td>{{ $subItem->getSubSubCategory?->category_name ?? 'N/A' }}</td>
                                                                                                <td>{{ $subItem->unit ?? '' }}</td>
                                                                                                <td>{{ $subItem->quantity ?? '' }}</td>
                                                                                                <td>{{ $subItem->rate ?? '' }}</td>
                                                                                                <td>{{ $subItem->amount ?? '' }}</td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                            
                                                                                    <h6 class="my-3">Supplier Quotations</h6>
                                                                                    <div class="table-responsive">
                                                                                        <table class="table table-bordered table-striped">
                                                                                            <thead class="bg-light">
                                                                                                <tr class="text-nowrap">
                                                                                                    <th>#</th>
                                                                                                    <th>Supplier Name</th>
                                                                                                    <th>Supplier Rate</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @php $i = 1; @endphp
                                                                                                @if(!empty($subItem->getSupplierRate))
                                                                                                    @foreach($subItem->getSupplierRate()->where('contractor_id',$contractor_id)->get() as $supplierRate)
                                                                                                        <tr>
                                                                                                            <!-- Hidden supplier rate ID in each row -->
                                                                                                            <input type="hidden" class="supplier_rate_id" value="{{ $supplierRate->id }}">
                                                                            
                                                                                                            <td>{{ $i++ }}</td>
                                                                                                            <td>
                                                                                                                {{ $supplierRate->supplier->biz_company ?? '' }}
                                                                                                                <button type="button" class="btn btn-md btn-dark" data-toggle="modal" data-target="#supplierDetail{{$supplierRate->id}}">
                                                                                                                    <i class="fa fa-info"></i>
                                                                                                                </button>
                                                                                                                
                                                                                                                
                                                                                                                    <!-- Supplier Detail Modal -->
                                                                                                                    <div class="modal fade" id="supplierDetail{{$supplierRate->id}}" tabindex="-1" role="dialog" aria-labelledby="supplierRatesModalLabel" aria-hidden="true">
                                                                                                                      <div class="modal-dialog modal-dialog-centered modal-md" role="document"> <!-- Centered -->
                                                                                                                        <div class="modal-content border-warning shadow-lg">
                                                                                                                    
                                                                                                                          <div class="modal-header text-white">
                                                                                                                            <h5 class="modal-title" id="supplierRatesModalLabel">Supplier Information</h5>
                                                                                                                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                                                                                              <span aria-hidden="true">&times;</span>
                                                                                                                            </button>
                                                                                                                          </div>
                                                                                                                    
                                                                                                                          <div class="modal-body bg-light">
                                                                                                                            <div class="row">
                                                                                                                              <div class="col-12">
                                                                                                                                <table class="table table-borderless table-sm">
                                                                                                                                  <tbody>
                                                                                                                                    <tr>
                                                                                                                                      <th class="text-secondary" style="width: 180px;">Supplier Name:</th>
                                                                                                                                      <td><strong>{{$supplierRate->supplier->biz_name}}</strong></td>
                                                                                                                                    </tr>
                                                                                                                                    <tr>
                                                                                                                                      <th class="text-secondary">Email:</th>
                                                                                                                                      <td>{{$supplierRate->supplier->biz_email}}</td>
                                                                                                                                    </tr>
                                                                                                                                    <tr>
                                                                                                                                      <th class="text-secondary">Phone:</th>
                                                                                                                                      <td>{{$supplierRate->supplier->biz_phonecode}} {{$supplierRate->supplier->biz_phone}}</td>
                                                                                                                                    </tr>
                                                                                                                                    
                                                                                                                                    <tr>
                                                                                                                                      <th class="text-secondary">Total Experience:</th>
                                                                                                                                      <td>2 years</td>
                                                                                                                                    </tr>
                                                                                                                                   
                                                                                                                                    <tr>
                                                                                                                                      <th class="text-secondary">Company Name:</th>
                                                                                                                                      <td>{{$supplierRate->supplier->biz_company}}</td>
                                                                                                                                    </tr>
                                                                                                                                  </tbody>
                                                                                                                                </table>
                                                                                                                              </div>
                                                                                                                            </div>
                                                                                                                          </div>
                                                                                                                    
                                                                                                                          <div class="modal-footer bg-white">
                                                                                                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                                                                                                                          </div>
                                                                                                                    
                                                                                                                        </div>
                                                                                                                      </div>
                                                                                                                    </div>

                                                                                                            </td>
                                                                                                            <td class="supplier-rate">{{ $supplierRate->total_supplier_rate ?? 0.00 }}</td>
                                                                                                            
                                                                                                        </tr>
                                                                                                    @endforeach
                                                                                                @endif
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                    <button type="submit" class="btn btn-primary">Send Quotation</button>
                                                                                </div>
                                                                            </form>

                                                                        </div>
                                                                      </div>
                                                                    </div>

                                </td>
                                
                                @endif
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                      @endforeach
                      @endif
                    </div>
                  </div>

                  <!-- Step 2 -->
                  <div class="form-step">
                    <table class="table table-bordered table-striped  rounded">
                                            <thead class=" text-dark text-center">
                                                <tr>
                                                    <th width="50%">Project Detail</th>
                                                    <th>Address</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="bg-light">
                                                        <p class="mb-0"><strong>Project Name:</strong> {{ $project->project_name ?? '' }}</p>
                                                        <p class="mb-0"><strong>Client Name:</strong> {{ $project->client_name ?? '' }}</p>
                                                        <p class="mb-0"><strong>BOQ Type:</strong> {{ $project->boq_type ?? '' }}</p>
                                                        <p class="mb-0"><strong>Deadline:</strong> {{ $project->boq_deadline ?? '' }}</p>
                                                        <p class="mb-0"><strong>Validity Till:</strong> {{ $project->validity_date ?? '' }}</p>
                                                    </td>
                                                    <td class="bg-light">
                                                        <p class="mb-0"><strong>Project Address:</strong> {{ $project->project_address ?? '' }}</p>
                                                        <p class="mb-0"><strong>Project City:</strong> {{ $project->projectCity->name ?? '' }}</p>
                                                        <p class="mb-0"><strong>Project Area:</strong> {{ $project->projectArea->name ?? '' }}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="bg-light">
                                                        <p class="mb-0"><strong>Reference Documents : </p>
                                                    </td>
                                                    <td class="bg-light">
                                                        
                                                        @if(isset($project->attachment_file_one))
                                                            <a class="text-success" target="_blank" href="{{asset('uploads/rfq/'.$project->attachment_file_one )}}"> Reference 1 <i class="fa fa-download"></i></a>
                                                        @endif
                                                        
                                                         @if(isset($project->attachment_file_two))
                                                          |  <a class="text-success" target="_blank" href="{{asset('uploads/rfq/'.$project->attachment_file_two )}}"> Reference 2 <i class="fa fa-download"></i></a>
                                                        @endif
                                                        
                                                         @if(isset($project->attachment_file_three))
                                                           | <a class="text-success" target="_blank" href="{{asset('uploads/rfq/'.$project->attachment_file_three )}}"> Reference 3 <i class="fa fa-download"></i></a>
                                                        @endif
                                                        
                                                         @if(isset($project->attachment_file_four))
                                                           | <a class="text-success" target="_blank" href="{{asset('uploads/rfq/'.$project->attachment_file_four )}}"> Reference 4 <i class="fa fa-download"></i></a>
                                                        @endif
                                                       
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                  </div>

                  <!-- Navigation -->
                  <div class="row form-navigation mt-4">
                    <div class="col-12">
                      <button type="button" class="btn btn-secondary px-4" id="prevBtn" onclick="prevStep()" style="display:none;">Previous</button>
                      <button type="button" class="btn btn-primary px-4 float-end" id="nextBtn" onclick="nextStep()">Next</button>
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

<!-- REQUIRED SCRIPTS FOR MODALS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('allUsers/customer/js/my-scripts.js')}}"></script>

<script>
  $(document).ready(function() {
    // Fix modal backdrop issues
    $('.modal').on('show.bs.modal', function() {
      $('.modal-backdrop').css('z-index', '1050');
      $(this).css('z-index', '1055');
    });

    // Modal form validation
    $('.markupForm').on('submit', function(e) {
      const selectedRadio = $(this).find('input[name="send_quotation_to"]:checked');
      if (!selectedRadio.length) {
        alert('Please select a supplier.');
        e.preventDefault();
        return false;
      }
    });
  });

  // STEP NAVIGATION
  let currentStep = 1;

  function showStep(step) {
    $('.form-step').removeClass('active').eq(step - 1).addClass('active');
    $('.progressbar li').removeClass('active').slice(0, step).addClass('active');
    $('#prevBtn').toggle(step > 1);
    $('#nextBtn').toggle(step < 2);
  }

  function nextStep() {
    if (currentStep < 2) {
      currentStep++;
      showStep(currentStep);
    }
  }

  function prevStep() {
    if (currentStep > 1) {
      currentStep--;
      showStep(currentStep);
    }
  }
  $(function() {
    showStep(1);
  });

  // MARKUP CALCULATION
  $(document).on('keyup', '.contractor-markup', function() {
    let markup = parseFloat($(this).val()) || 0;
    let row = $(this).closest('tr');
    let supplierRate = parseFloat(row.find('.supplier-rate').text()) || 0;
    let finalRate = supplierRate + markup;
    row.find('.final-rate-to-architect').text(finalRate.toFixed(2));
  });
</script>
@endsection