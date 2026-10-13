@extends('user.header')
@section('userContent')
<div class="content-wrapper" style="min-height: 1019px;">
    <div class="container-full">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h3 class="page-title">Reviews</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item" aria-current="page">Platform</li>
                                <li class="breadcrumb-item active" aria-current="page">All Reviews</li>
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
                                <div class="row mb30 account-filters">
                                    <div class="col-sm-10">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            
                            
                            
                            <div class="table-responsive rounded card-table">
                                <div id="example1_wrapper"
                                    class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <form method="get">
                                        <div class="row">
                                            <div class="col-sm-2">
                                               <label for="reviewer">Select Reviewer</label>
                                               <select class="form-control bg-white" id="reviewer" name="reviewer">
                                                   <option value="">Select</option>
                                                   <option value="Supplier" @selected(request()->query('reviewer') == 'Supplier')>Supplier</option>
                                                   <option value="Buyer" @selected(request()->query('reviewer') == 'Buyer')>Buyer</option>
                                                   <option value="Contractor" @selected(request()->query('reviewer') == 'Contractor')>Contractor</option>
                                                   <option value="Architect" @selected(request()->query('reviewer') == 'Architect')>Architect</option>
                                                   <option value="Product" @selected(request()->query('reviewer') == 'Product')>Product</option>
                                               </select>
                                            </div>
                                            
                                            <div class="col-sm-2">
                                               <label for="reviewed_for">Select Reviewed For</label>
                                               <select class="form-control bg-white" id="reviewed_for" name="reviewed_for">
                                                   <option value="">Select</option>
                                                   <option value="Supplier" @selected(request()->query('reviewed_for') == 'Supplier')>Supplier</option>
                                                   <option value="Buyer" @selected(request()->query('reviewed_for') == 'Buyer')>Buyer</option>
                                                   <option value="Contractor" @selected(request()->query('reviewed_for') == 'Contractor')>Contractor</option>
                                                   <option value="Architect" @selected(request()->query('reviewed_for') == 'Architect')>Architect</option>
                                               </select>
                                            </div>
                                            
                                            <div class="col-sm-2">
                                               <label for="reviewed_for">Select Status</label>
                                               <select class="form-control bg-white" id="status" name="status">
                                                   <option value="">Select</option>
                                                   <option value="1" @selected(request()->query('status') == '1')>Approved</option>
                                                   <option value="0" @selected(request()->query('status') == '0')>Disapproved</option>
                                               </select>
                                            </div>
                                            
                                            <div class="col-sm-4 mt-4">
                                                <button class="btn btn-primary" type="submit">Filter</button>
                                                 <a class="btn btn-secondary" href="{{route('admin.ratings')}}">Reset</a>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="row">
                                        <div class="col-sm-12">
                                        </div>
                                    </div>


                                    <table class="table border-no dataTable no-footer" id="example1" role="grid"
                                        aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                
                                                <th width="5%" class="sorting_asc" tabindex="0"
                                                    aria-controls="example1" rowspan="1" colspan="1"
                                                    aria-sort="ascending"
                                                    aria-label="Patient ID: activate to sort column descending">
                                                    Sr No.
                                                </th>

                                                <th width="20%" class="sorting_asc" tabindex="0"
                                                    aria-controls="example1" rowspan="1" colspan="1"
                                                    aria-sort="ascending"
                                                    aria-label="Patient ID: activate to sort column descending">
                                                    Reviewer
                                                </th>
                                                
                                                <th width="15%" class="sorting_asc" tabindex="0"
                                                    aria-controls="example1" rowspan="1" colspan="1"
                                                    aria-sort="ascending"
                                                    aria-label="Patient ID: activate to sort column descending">
                                                    Review For
                                                </th>
                                                <th width="20%" class="sorting_asc" tabindex="0"
                                                    aria-controls="example1" rowspan="1" colspan="1"
                                                    aria-sort="ascending"
                                                    aria-label="Patient ID: activate to sort column descending">Rating

                                                </th>
                                                <th width="55%" class="sorting_asc" tabindex="0"
                                                    aria-controls="example1" rowspan="1" colspan="1"
                                                    aria-sort="ascending"
                                                    aria-label="Patient ID: activate to sort column descending">Rating
                                                    Description

                                                </th>
                                                <th tabindex="0"  width="5%" aria-controls="example1" rowspan="1" colspan="1"
                                                    aria-sort="ascending" aria-label="Patient ID: activate to sort
                                                        column descending">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach ($ratings as $key => $product)
                                                    <tr class="odd" role="row">
                                                        
                                                        <td>
                                                            {{$key + 1}}
                                                        </td>
                                                        
                                                        <td>
                                                            <span>{{ $product->user->first_name ?? '' }}
                                                                {{ $product->user->last_name ?? '' }}</span>
                                                             <br>   
                                                            <span>Type : <b>{{ $product->user_type ?? '' }} </b></span>
                                                        </td>
                                                        
                                                         <td>
                                                            <span>
                                                                @if($product->user_type == 'Supplier'){
                                                                    {{ $product->reviewFor->ar_name ?? '' }}
                                                                    {{ $product->reviewFor->ar_surname ?? '' }}
                                                                @elseif($product->user_type == 'Product')
                                                                    {{ $product->reviewFor->name ?? '' }}
                                                                @else
                                                                    {{ $product->reviewFor->first_name ?? '' }}
                                                                    {{ $product->reviewFor->last_name ?? '' }}
                                                                @endif
                                                            </span>
                                                             <br>   
                                                            <span>Type : <b>{{ $product->type ?? '' }} </b></span>
                                                        </td>
    
    
                                                        <td>
                                                            <span>
                                                                 @php
                                                                    $avg = $product->star ?? 0; // Default to 0 if no ratings
                                                                    $filledStars = floor($avg);
                                                                    $halfStar = ($avg - $filledStars) >= 0.5;
                                                                @endphp
                                                                
                                                                <div class="stars">
                                                                    @for ($i = 1; $i <= 5; $i++)
                                                                        @if ($i <= $filledStars)
                                                                            <i class="fa fa-star text-primary" aria-hidden="true"></i>
                                                                        @elseif ($halfStar && $i == $filledStars + 1)
                                                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                                                        @else
                                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                                        @endif
                                                                    @endfor
                                                                </div>
                                                            </span>
                                                        </td>
    
                                                        <td>
                                                            <span>{{ $product->review ?? ''}} </span>
                                                        </td>
    
                                                        <td>
                                                            <!-- Button trigger modal -->
                                                            <a href="{{ route('admin.ratingStatus', [$product->id, $product->status === 1 ? 0 : 1]) }}"
                                                                title="{{ $product->status === 1 ? 'Tap to Disapproved' : 'Tap to Approved' }}"
                                                                class="badge badge-pill badge-{{ $product->status === 1 ? 'primary' : 'secondary' }} disable"
                                                                catid="0011-0">
                                                                @if ($product->status === 1)
                                                                <i class="fa fa-toggle-on"></i>
                                                                @else
                                                                <i class="fa fa-toggle-off"></i>
                                                                @endif
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{ $ratings->appends(request()->query())->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script type="text/javascript" src="{{ asset('allUsers/user/products.js') }}"></script>
@endsection