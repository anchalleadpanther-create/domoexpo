@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 1019px;">
    <div class="container-full"> 
      <!-- Content Header (Page header) -->
       
      <!-- Main content -->
      <section class="content">
        <div class="row">
         
            <div class="col-12">
              <div class="row">
                  <div class="col-xl-12 col-12">

                    <div class="box">
                          <div class="box-body">
                            <div class="tab-content">
                                  <div class="tab-pane active" id="home4" role="tabpanel">
                                      <div class="row">
                                    
                                          <div class="col-sm-6">
                                              <div class="row grey-bg-clr">
                                                  <h5 class="mb-0 text-danger">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                                          <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                          <circle cx="12" cy="7" r="4"></circle>
                                                      </svg>
                                                      Mapped Category
                                                  </h5>
                                                  <div class="col-md-12">
                                                      <hr>
                                                  </div>
                                                  <div class="clearfix"></div>
    
                                                  <table class="table table-striped">
                                                      
                                                      <tbody>
                                                          <tr>
                                                              <th>Sr. No.</th>
                                                              <th>Category Type</th>
                                                              <th>Category Name</th>
                                                              <!--<th>Action</th>-->
                                                          </tr>
                                                         
                                                      </tbody>
                                                      <tbody>
                                                        
                                                          @foreach($supplier->mappedCategories()->whereHas('category', fn($q) => $q->where('parent_id', 0))->with('category')->get() as $key => $category)
                                                
                                                          <tr>
                                                              <td>{{$key + 1}}</td>
                                                              <td>{{$category->category_type ?? ''}}</td>
                                                              <td>{{$category->category->category_name ?? ''}}</td>
                                                              <!--<td><a href="javascript:void(0)" class="text-danger">Delete</a></td>-->
                                                          </tr>
                                                          @endforeach
                                                         
                                                      </tbody>
                                                  </table>
                                              </div>
                                          </div>
                                          
                                          <div class="col-sm-1"></div>
                                           <div class="col-sm-5">
                                              <div class="row grey-bg-clr">
                                                  <h5 class="mb-0 text-danger">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                                          <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                          <circle cx="12" cy="7" r="4"></circle>
                                                      </svg>
                                                      Map Category
                                                  </h5>
                                                  <div class="col-md-12">
                                                      <hr>
                                                  </div>
                                                  <div class="clearfix"></div>
    
                                                        <form action="{{route('admin.supplier.map-supplier-category')}}" method="post">
                                                            @csrf
                                                            <input value="{{$supplier->id}}" name="supplier_id">
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <label>Select Type</label>
                                                                    <select class="form-control" name="category_type" id="categoryType">
                                                                        <option value="Product">Product</option>
                                                                        <!--<option value="Service">Service</option>-->
                                                                    </select>
                                                                </div>    
                                                                
                                                                <div class="col-8">
                                                                    <label>Select Category</label>
                                                                    <select class="form-control" name="category_id" id="categorySelect" required>
                                                                        <option value="">Select Category</option>
                                                                        @foreach(getCategories() as $category)
                                                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                
                                                                <div class="col-12 my-2">
                                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        
                                              </div>
                                          </div>
                                          
                                            
                                      </div>
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                  </div>
                            </div>
                        </div>
                  </div>


                  </div>


              </div>
            <!-- /.box -->
        </div>
        <!-- /.col-->
      </section>
    </div>
    <!-- ./row -->

    <!-- /.content -->
  </div>
@endsection
