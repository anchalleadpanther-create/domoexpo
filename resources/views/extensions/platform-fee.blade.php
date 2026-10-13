@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <div class="content-header">
        <div class="d-flex align-items-center">
          <div class="me-auto">
            <h3 class="page-title">Platform Fees</h3>
            <div class="d-inline-block align-items-center">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">Setup</li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="">Set Platform Fees</a></li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- Main content -->
      <section class="content">
        @include('extensions.alerts')
      <div class="row justify-content-center">
          <div class="col-12 col-md-8">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Set Platform Fees</h4>
              </div>
              <div class="card-body">
                <form action="{{route('admin.update-platform-fees')}}" method="post">
                    @csrf
                  <div class="row">
                    <div class="col-md-12">
                        
                        <div class="row mb-3"> 
                          <div class="col-md-4"></div>
                          <div class="col-md-3">
                            <p class="fst-italic"><strong>Fee Type</strong></p>
                          </div>
                          <div class="col-md-3">
                            <p class="fst-italic"><strong>Fee Value</strong></p>
                          </div>
                          <div class="col-md-2">
                            <p class="fst-italic"><strong>Status</strong></p>
                          </div>
                        </div>
                      @foreach($fees as $fee)
                        <div class="row mb-3"> 
                          <div class="col-md-4">
                            <h5>{{ $fee->fee_name ?? 'N/A' }} :</h5>
                            <p class="text-muted  fst-italic">{{ $fee->fee_desc ?? 'No description available' }}</p>
                          </div>
                          <div class="col-md-3">
                              <select class="form-control bg-white" name="fee_type[]" >
                                  @if($fee->fee_key != 'VAT')
                                    <option value="Flat" {{ $fee->fee_type  == "Flat" ? "selected" :  ""}}>Flat</option>
                                  @endif
                                  @if($fee->fee_key == 'VAT')
                                  <option value="Percentage" {{ $fee->fee_type  == "Percentage" ? "selected" :  ""}}>Percentage</option>
                                  @endif
                              </select>
                          </div>
                          <div class="col-md-3">
                            <input type="number" class="form-control" name="fees[]" min="0" value="{{ $fee->fee  ?? 0}}" placeholder="Enter Fee Amount">
                          </div>
                          
                          <div class="col-md-2">
                              <select class="form-control bg-white" name="status[]" >
                                  <option value="1" {{ $fee->status  == "1" ? "selected" :  ""}}>Active</option>
                                  <option value="0" {{ $fee->status  == "0" ? "selected" :  ""}}>In Active</option>
                              </select>
                          
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                  <!-- Submit button -->
                  <div class="row mt-4">
                    <div class="col-md-12 text-right">
                      <button type="submit" class="btn btn-success">Save Changes</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
      </div>

      </section>
    </div>
  </div>
@endsection
