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
                    <h2>Messages</h2>
                    
                </div>
                <section class="ps-store-box col-sm-12">
                    <div class="ps-section__header">
                        <!--<p><b>Total Records : {{count(Auth::guard('buyer')->user()->addresses)}}</b></p>-->
                        <p><a>Total Records : {{count(Auth::guard('buyer')->user()->addresses)}}</b></p>
                    </div>
                    <div class="ps-section_header2 d-flex justify-content-end my-4">
                            
                            <div class="ps-section_export ml-4 ">
                              
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#startChatingModal" class="ps-btn">
                                      Send New Message
                                    </a>
                                
                            </div>
                        </div>
                </section>
                
                <div class="ps-section__content p-0">
                    <div class="table-responsive">
                        <table class="table ps-table--responsive account__table table-bordered" id="products-table">
                            <thead>
                                <tr>
                                    <th style="width:10%;">S. No</th>
                                    <th style="width:25%;">Name</th>
                                    <th style="width:25%;">Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Data loaded dynamically via DataTables --}}
                            </tbody>
                        </table>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
</div>






<!--Architect and QS Status Modal-->
<div class="modal fade" id="startChatingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Start Chating</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('buyer.save-chat-message')}}" method="post">
                @csrf
                
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>User Type</label>
                                <select class="form-select" name="receiver_type" id="receiver_type">
                                    <option value="Select"> Select</option>
                                    <option value="developer"> Developer</option>
                                    <option value="architect"> Architect</option>
                                    <option value="contractor"> Contractor</option>
                                    <option value="supplier"> Supplier</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Users</label>
                                <select class="form-select" name="receiver_id" id="receiver_id">
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-12 ">
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea  min="0" name="message" value="" placeholder="Write something here....." class="form-control" ></textarea>
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
<!--End of QS Status Modal-->

<!-- Scripts -->
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.bootstrap4.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<script>
    $('#products-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('buyer.chat-message') }}",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'user_detail', name: 'user_detail' },
            { data: 'action', name: 'action' }, 
        ]
    });



</script>

<script>
    let suppliers   = @json($suppliers);
    let contractors = @json($contractors);
    let architects  = @json($architects);
    let developers  = @json($developers);
    
    $('#receiver_type').on('change', function () {
        let user_type = this.value;
        let options = '<option value="">Select User</option>'; // optional placeholder
    
        if (user_type === 'supplier') {
            suppliers.forEach(function (value) {
                options += `<option value="${value.id}">ID : ${value.id} | ${value.ar_name} ${value.ar_last_name}</option>`;
            });
        }else if (user_type === 'contractor') {
            contractors.forEach(function (value) {
                options += `<option value="${value.id}">ID : ${value.id} | ${value.first_name} ${value.last_name}</option>`;
            });
        }else if (user_type === 'architect') {
            architects.forEach(function (value) {
                options += `<option value="${value.id}">ID : ${value.id} | ${value.first_name} ${value.last_name}</option>`;
            });
        }else if (user_type === 'developer') {
            developers.forEach(function (value) {
                options += `<option value="${value.id}">ID : ${value.id} | ${value.first_name} ${value.last_name}</option>`;
            });
        }
    
        
        $('#receiver_id').html(options);
    });
</script>



<!-- Main Container -->
@endsection













