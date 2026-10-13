@extends('customer.partials-fn.buyer.header')
@section('content')
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
<style>
.revised-row .slide-content {
    max-height: 0;
    overflow: hidden;
    transition: max-height 1s ease;
}

.revised-row.show .slide-content {
    max-height: 1000px; /* or a large enough value */
}
</style>

<!-- Main Container -->
<div class="container product_table--listing">
    <div class="row justify-content-center">
        <div class="col-lg-9 offset-lg-3">
            <div class="ps-section__right">
                <div class="ps-form__header mb-5 col-sm-12">
                    <h2>Project Document</h2>
                    <p>Information about your current plan and usages</p>
                </div>

                <section class="ps-store-box col-sm-12">
                    <div class="ps-section__header">
                        <p><b>Total Records : {{count($documents)}} </b></p>
                        <div class="ps-section_header2">
                            
                            
                            <div class="ps-section_export ml-4">
                                @if(request()->filled('receiver_id') && request()->filled('receiver_type'))
                                    <a data-toggle="modal" data-target="#sentDocumentModal" data-boq-id="{{request()->query('boq_id') ?? ''}}"  href="javascript:void(0)" class="ps-btn" >
                                      Sent Document
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </section> 

                <section class="ps-store-box col-sm-12">
                    <div class="ps-section__header">
                        <form action="{{route('buyer.buyer-rfq')}}" method="get" class=" w-100">
                            <div class="ps-section_header2 w-100">
                                <input class="form-control  w-50 " type="text" id="search" name="search" placeholder="Search Project ID and Description ">
                                <button type="submit" class="ps-btn ml-3" id="filter-submit">Search</button>
                                <a href="{{route('buyer.buyer-rfq')}}" class="ps-btn ps-btn-black ml-3" id="clear-filters"> Reset</a>
                            </div>
                        </form>
                    </div>
                </section>

                <div class="ps-section__content p-0">
                    <div class="table-responsive">
                        
                        
                        <table class="table table-bordered table-hover table-striped table-responsive-sm" id="products-table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>IDs</th>
                                    <th>Sender </th>
                                    <th>Receiver </th>
                                    <th>Document</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($documents as $doc)
                                <tr   style="background:@if($doc->created_by == 'Developer') #e4ebfe; @endif">
                                    <td>
                                        <p class="mb-1"><strong>DOC ID:</strong> {{ $doc->id }}</p>
                                        @if(!empty($doc->boq_id))
                                        <p class="mb-1"><strong>BOQ ID:</strong> {{ $doc->boq_id }}</p>
                                        @endif
                                        
                                    </td>
                                    <td>
                                        Name: {{$doc->sender->full_name ?? ''}} ({{$doc->sender->account_type ?? ''}})
                                    </td>
                                    
                                    <td>
                                        Name: {{$doc->receiver->full_name ?? ''}} ({{$doc->receiver->account_type ?? ''}})
                                    </td>
                                    
                                    <td>
                                        <a class="btn btn-success" @if(!empty($doc->document)) href="{{asset('uploads/document_file/'.$doc->document)}}" @else onclick="alert('Document not available.')" @endif target="_blank">Show</a>
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





<!--Sent Document Modal Modal-->
<div class="modal fade" id="sentDocumentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Quotation Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('buyer.save-user-shared-document')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="boq_id" id="boq_id" value="{{request()->query('boq_id')}}">
                
                <input type="hidden" name="receiver_id" value="{{request()->query('receiver_id')}}" id="receiver_id">
                <input type="hidden" name="receiver_type" value="{{request()->query('receiver_type')}}" id="receiver_type">
                
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            
                                <div class="form-group">
                                    <label>Document</label>
                                    <input type="file" name="document_file" accept="image/*,.pdf" class="form-control">
                                </div>
                       
                        </div>
                       
                        
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn ps-btn ml-3" data-dismiss="modal">Close</button>-->
                    <button type="submit" class="btn btn-success">submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--End of Sent Document Modal Modal-->





<!-- Main Container -->



@endsection