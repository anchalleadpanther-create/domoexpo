@extends('user.header')
@section('userContent')
<div class="content-wrapper" style="min-height: 1019px;">
    <div class="container-full">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h3 class="page-title">Products</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item" aria-current="page">Ecommerce</li>
                                <li class="breadcrumb-item active" aria-current="page">All Products Rating</li>
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


                                                <th width="20%" class="sorting_asc" tabindex="0"
                                                    aria-controls="example1" rowspan="1" colspan="1"
                                                    aria-sort="ascending"
                                                    aria-label="Patient ID: activate to sort column descending">Customer
                                                    Name
                                                </th>
                                                <th width="25%" class="sorting_asc" tabindex="0"
                                                    aria-controls="example1" rowspan="1" colspan="1"
                                                    aria-sort="ascending"
                                                    aria-label="Patient ID: activate to sort column descending">Rating

                                                </th>
                                                <th width="35%" class="sorting_asc" tabindex="0"
                                                    aria-controls="example1" rowspan="1" colspan="1"
                                                    aria-sort="ascending"
                                                    aria-label="Patient ID: activate to sort column descending">Rating
                                                    Description

                                                </th>
                                                <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                                    aria-sort="ascending" aria-label="Patient ID: activate to sort
                                                        column descending">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form method="post" id="sort-form"
                                                action="{{ route('admin.products.update-sort') }}">
                                                @csrf
                                                @method('PUT')
                                                @foreach ($productRatings as $product)
                                                <input type="hidden" name="sku[]" value="{{ $product->sku }}">
                                                <tr class="hover-primary odd" role="row">

                                                    <td>
                                                        <span class='text-primary'>{{ $product->user->first_name }}
                                                            {{ $product->user->last_name }}</span>

                                                    </td>

                                                    <td>
                                                        <span class='text-primary'>{{ $product->star}} </span>
                                                    </td>

                                                    <td>
                                                        <span class='text-primary'>{{ $product->review}} </span>
                                                    </td>


                                                    <td>
                                                        <!-- Button trigger modal -->



                                                        <a href="{{ route('admin.ratingStatus', [$product->id, $product->status === 1 ? 0 : 1]) }}"
                                                            title="{{ $product->status === 1 ? 'Tap to Disable' : 'Tap to Enable' }}"
                                                            class="badge badge-pill badge-success disable"
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

                                            </form>
                                        </tbody>
                                    </table>
                                </div>
                                {{ $productRatings->links() }}
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