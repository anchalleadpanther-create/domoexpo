@extends('customer.partials-fn.buyer.header')
@section('content')
<script src="https://littletags.webkype.co/allUsers/axios.js"></script>
<style>
    /* Your custom CSS */
    /* Ensure the processing background is transparent */
    #products-table_processing {
        background-color: transparent !important;
        border: none !important;
        box-shadow: none !important;
        color: #000 !important;
        /* Customize text color */
    }

    .dataTables_filter {
        display: none;
    }

    #products-table_wrapper .dt-search {
        display: none;
    }
</style>
<!-- Main Container -->
<div class="container product_table--listing">
    <div class="row justify-content-center">
        <div class="col-lg-9 offset-lg-2">
            <div class="ps-section__right">
                <div class="ps-form__header mb-5 col-sm-12">
                    <h2>Notifications</h2>
                    
                </div>
                <section class="ps-store-box col-sm-12">
                    <div class="ps-section__header">
                        <!--<p><b>Total Records : {{count(Auth::guard('buyer')->user()->addresses)}}</b></p>-->
                        
                    </div>
                </section>
                
                <div class="ps-section__content p-0">
                    <div class="table-responsive">
                        <table class="table ps-table--responsive account__table table-bordered" id="products-table">
                            <thead>
                                <tr>
                                    <th style="width:10%;">S No</th>
                                    <th  style="text-align:center;width:20%;">Title</th>
                                    <th>Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($notifications as $key =>  $notification)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$notification->title ?? ''}}</td>
                                        <td>{{$notification->message ?? ''}}</td>
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



<!-- Main Container -->
@endsection













