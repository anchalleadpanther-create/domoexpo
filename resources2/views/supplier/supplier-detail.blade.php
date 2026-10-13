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
                                      <div class="col-sm-12">
                                          
                                                <form action="{{ route('admin.supplier.access-status', $supplier->id) }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('GET')
                                                    <!---->
                                                    <div class="row grey-bg-clr">
                                                        <h5 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                          stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                                          <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                          <circle cx="12" cy="7" r="4"></circle>
                                                        </svg> Seller Status</h5>
                                                        <div class="col-md-12">
                                                            <hr>
                                                        </div>
                                                              
                                                          <div class="clearfix"></div>
                                                          
                                                          <div class="col-md-4">
                                                            <div class="form-group">
                                                              <label class="form-label text-success">Select Status</label>
                                                              <select class="single" name="supplier_status">
                                                                <option>Select</option>
                                                                <option @if ($supplier->supplier_status === 1) selected @endif value="1">Approved
                                                                  Supplier
                                                                </option>
                                                                <option @if ($supplier->supplier_status === 2) selected @endif value="2">Disapprove
                                                                  Supplier</option>
                                                                <option @if ($supplier->supplier_status === 3) selected @endif value="3">On Hold
                                                                  Supplier
                                                                </option>
                                                              </select>
                                                            </div>
                                                          </div>
                                                          
                                                          <div class="col-md-4">
                                                            <div class="form-group">
                                                              <label class="form-label text-success">Status Reason</label>
                                                              <select class="single" name="supplier_status_reason">
                                                                <option value="">Select</option>
                                                                <option @if ($supplier->supplier_status_reason === 'Document Incomplete') selected @endif value="Document Incomplete">
                                                                  Document Incomplete
                                                                </option>
                                                                <option @if ($supplier->supplier_status_reason === 'Criteria Mismatch') selected @endif value="Criteria Mismatch">
                                                                  Criteria Mismatch</option>
                                                                <option @if ($supplier->supplier_status_reason === 'Wrong Information') selected @endif value="Wrong Information">
                                                                  Wrong Information</option>
                                                              </select>
                                                            </div>
                                                          </div>
                                                          
                                                          <div class="col-md-4">
                                                            <div class="form-group">
                                                              <label class="form-label text-success">Status Comment</label>
                                                              <div class="input-group mb-3">
                                                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                                                <input type="text" class="form-control" placeholder="Status Comment"
                                                                  maxlength="100" name="supplier_status_comment"
                                                                  value="{{ $supplier->supplier_status_comment }}">
                                                              </div>
                                                            </div>
                                                          </div>
                                                          
                                                          <div class="col-md-12 pull-right">
                                                              <div class="clearfix">
                                                                <button type="submit" class="waves-effect waves-light btn btn-dark mb-5">
                                                                    <i class="fa fa-check"></i> Save
                                                                </button>
                                                              </div>
                                                           </div>
                                                    </div>
                                                    <!---->
                                                </form>
                                                
                                                
                                                <form action="{{ route('admin.supplier.change-password') }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="supplier_id" value="{{$supplier->id}}">
                                                    <!---->
                                                    <div class="row grey-bg-clr">
                                                        <h5 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                          stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                                          <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                          <circle cx="12" cy="7" r="4"></circle>
                                                        </svg> Change Password</h5>
                                                        <div class="col-md-12">
                                                            <hr>
                                                        </div>
                                                              
                                                          <div class="clearfix"></div>
                                                          
                                                          <div class="col-md-6">
                                                            <div class="form-group">
                                                              <label class="form-label text-success ">Password</label>
                                                              <div class="input-group mb-3">
                                                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                                                <input type="password" min="0" class="form-control" placeholder="Password"
                                                                  name="password" >
                                                              </div>
                                                            </div>
                                                          </div>
                                                          
                                                          
                                                          <div class="col-md-6">
                                                            <div class="form-group">
                                                              <label class="form-label text-success ">Confirm Password</label>
                                                              <div class="input-group mb-3">
                                                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                                                <input type="password" min="0" class="form-control" placeholder="Password"
                                                                  name="password_confirmation" >
                                                              </div>
                                                            </div>
                                                          </div>
                              
                                                          
                                                          <div class="col-md-12 pull-right">
                                                              <div class="clearfix">
                                                                <button type="submit" class="waves-effect waves-light btn btn-dark mb-5">
                                                                    <i class="fa fa-check"></i> Save
                                                                </button>
                                                              </div>
                                                           </div>
                                                    </div>
                                                    <!---->
                                                </form>
                                          
                                          
                                          
                                          
                                          
                                          <div class="row grey-bg-clr">
                                              <h5 class="mb-0 text-danger">
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                                      <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                      <circle cx="12" cy="7" r="4"></circle>
                                                  </svg>
                                                  Personal Info
                                              </h5>
                                              <div class="col-md-12">
                                                  <hr>
                                              </div>
                                              <div class="clearfix"></div>

                                              <table class="table table-striped">
                                                  <tbody>
                                                      <tr>
                                                          <th scope="row">First Name: </th>
                                                          <td>{{ @$supplier->biz_name }}</td>
                                                          <th scope="row">Sur Name: </th>
                                                          <td>{{ @$supplier->biz_surname }}</td>
                                                      </tr>
                                                     
                                                      <tr>
                                                          <th scope="row">Phone:</th>
                                                          <td>{{ @$supplier->biz_phonecode }} {{ @$supplier->biz_phone }}</td>
                                                          <th>Email: </th>
                                                          <td>{{ @$supplier->biz_email }}</td>
                                                      </tr>
                                                      <tr>
                                                          <th>Onboarding on:</th>
                                                          <td>{{ @$supplier->created_at->format('d M, Y h:i A') }}</td>
                                                          <th>Last updated:</th>
                                                          <td>{{ @$supplier->updated_at->format('d M, Y h:i A') }}</td>
                                                      </tr>
                                                     
                                                  </tbody>
                                              </table>
                                          </div>

                                          <!-- Company Profile -->
                                          <div class="row mt-30">
                                              <h5 class="mb-0 text-danger">
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                                      <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                      <circle cx="12" cy="7" r="4"></circle>
                                                  </svg>
                                                  Company Profile
                                              </h5>
                                              <div class="col-md-12">
                                                  <hr>
                                              </div>
                                              <div class="clearfix"></div>
                                              <!-- conpany Basic Info-->
                                              <table class="table table-striped">
                                                  <tbody>
                                                      <tr><th class="text-success" scope="row" colspan="4">Basic Info</th></tr>
                                                      <tr>
                                                          <th>Company Name: </th>
                                                          <td>{{ @$supplier->biz_company }}</td>
                                                          <th scope="row">Company Establishment Year: </th>
                                                          <td>{{ @$supplier->company_establishment_date }}</td>
                                                      </tr>
                                                      <tr>
                                                          <th scope="row">Short Name: </th>
                                                          <td>{{ @$supplier->company_short_name }}</td>
                                                          <th>Customer Service Email: </th>
                                                          <td>{{ @$supplier->customer_service_email }}</td>
                                                      </tr>
                                                      <tr>
                                                          <th scope="row">Phone Number (Landline): </th>
                                                          <td>{{ @$supplier->phone_number }}</td>
                                                          <th>Trade License: </th>
                                                          <td>{{ @$supplier->trade_license }}</td>
                                                      </tr>
                                                      <tr>
                                                          <th scope="row">VAT number: </th>
                                                          <td>{{ @$supplier->vat_number }}</td>
                                                          
                                                          
                                                      </tr>
                                                  </tbody>
                                              </table>
                                              
                                              <!--Company Sales Contact-->
                                               <table class="table table-striped">
                                                  <tbody>
                                                      
                                                      <tr><th class="text-success" scope="row" colspan="4">Sales Contact</th></tr>
                                                      <tr>
                                                          <th scope="row"> Name: </th>
                                                          <td>{{ @$supplier->sales_contact_name }}</td>
                                                          <th>Position: </th>
                                                          <td>{{ @$supplier->salesContactPosition->dropdown_value }}</td>
                                                      </tr>
                                                      <tr>
                                                          <th>Email </th>
                                                          <td>{{ @$supplier->sales_contact_email }}</td>
                                                          <th scope="row">Mobile Number: </th>
                                                          <td>{{ @$supplier->sales_contact_number }}</td>
                                                      </tr>
                                                      
                                                      
                                                      <tr><th class="text-success" scope="row" colspan="4">Finance & Accounting Contact</th></tr>
                                                      <tr>
                                                          <th scope="row"> Name: </th>
                                                          <td>{{ @$supplier->finance_contact_person_name }}</td>
                                                          <th>Position: </th>
                                                          <td>{{ @$supplier->financeContactPosition->dropdown_value }}</td>
                                                      </tr>
                                                      <tr>
                                                          <th>Email </th>
                                                          <td>{{ @$supplier->finance_contact_email }}</td>
                                                          <th scope="row">Mobile Number: </th>
                                                          <td>{{ @$supplier->finance_person_mobile_number }}</td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                              
                                              <!--Company Address-->
                                               <table class="table table-striped">
                                                  <tbody>
                                                      
                                                        <tr><th class="text-success" scope="row" colspan="4">Company Address</th></tr>
                                                        <tr>
                                                              <th>Unit No. </th>
                                                              <td>{{ @$supplier->biz_office_floor }}</td>
                                                              <th scope="row">Building name: </th>
                                                              <td>{{ @$supplier->biz_office_building_name }}</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                          <th scope="row"> Street name: </th>
                                                          <td>{{ @$supplier->biz_office_street_name }}</td>
                                                          <th scope="row"> PO Box: </th>
                                                          <td>{{ @$supplier->biz_office_po_box }}</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                          <th scope="row"> City: </th>
                                                          <td>{{ @$supplier->officeCity->name }}</td>
                                                          
                                                          <th scope="row"> State: </th>
                                                          <td>{{ @$supplier->officeState->name }}</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                          <th scope="row"> Country: </th>
                                                          <td>{{ @$supplier->officeCountry->name }}</td>
                                                        </tr>

                                                  </tbody>
                                              </table>
                                              
                                              <!--Bank Details-->
                                               <table class="table table-striped">
                                                  <tbody>
                                                      
                                                        <tr><th class="text-success" scope="row" colspan="4">Bank Details</th></tr>
                                                        <tr>
                                                              <th>Bank Account Name: </th>
                                                              <td>{{ @$supplier->biz_bank_name }}</td>
                                                              <th scope="row">Bank Account Number: </th>
                                                              <td>{{ @$supplier->biz_bank_acc_no }}</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                          <th scope="row"> Bank Branch: </th>
                                                          <td>{{ @$supplier->biz_bank_branch_name }}</td>
                                                          <th scope="row"> PO Box: </th>
                                                          <td>{{ @$supplier->biz_office_po_box }}</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                          <th scope="row"> IBAN: </th>
                                                          <td>{{ @$supplier->biz_iban }}</td>
                                                          
                                                          <th scope="row"> Swift Code (BIC): </th>
                                                          <td>{{ @$supplier->biz_bank_swift_code }}</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            
                                                          <th scope="row"> Bank Name: </th>
                                                          <td>{{ @$supplier->biz_bank_name }}</td>
                                                          <th scope="row"> Country: </th>
                                                          <td>{{ @$supplier->sellerBankCountry->name }}</td>
                                                        </tr>
                                                        <tr>  
                                                          <th scope="row"> State: </th>
                                                          <td>{{ @$supplier->sellerBankState->name }}</td>
                                                        </tr>

                                                  </tbody>
                                              </table>
                                          </div>


                                          <!-- Online Store -->
                                          <div class="row mt-30">
                                              <h5 class="mb-0 text-danger">
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                                      <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                      <circle cx="12" cy="7" r="4"></circle>
                                                  </svg>
                                                 Online Store
                                              </h5>
                                              <div class="col-md-12">
                                                  <hr>
                                              </div>
                                              <div class="clearfix"></div>
                                              <table class="table table-striped">
                                                  <tbody>
                                                      
                                                      <tr>
                                                          <th >Logo</th>
                                                          <td>
                                                              <a class="avatar avatar-md" href="{{ isset($supplier->biz_company_logo) ? asset('uploads/supplier') . '/' . $supplier->biz_company_logo : asset('allUsers/user/images/avatar/avatar-1.png') }}" style="width:80px;height:auto" target="_blank">
                                                                  <img src="{{ isset($supplier->biz_company_logo) ? asset('uploads/supplier') . '/' . $supplier->biz_company_logo : asset('allUsers/user/images/avatar/avatar-1.png') }}" class="bg-success-light" alt="...">
                                                              </a>
                                                          </td>
                                                          
                                                          <th scope="row">Home page image : </th>
                                                          <td>
                                                              <a class="avatar avatar-md" href="{{ isset($supplier->biz_home_page_image) ? asset('uploads/supplier') . '/' . $supplier->biz_home_page_image : asset('allUsers/no-image.png') }}" style="width:80px;height:auto" target="_blank">
                                                                  <img src="{{ !empty($supplier->biz_home_page_image) ? asset('uploads/supplier') . '/' . $supplier->biz_home_page_image : asset('allUsers/no-image.png') }}" class="bg-success-light" alt="...">
                                                              </a>
                                                          </td>  
                                                      </tr>
                                                      <tr>
                                                          <th scope="row">Business Type : </th>
                                                          <td>
                                                              {{ @$supplier->suppllierDescribedSeller()->pluck('dropdown_value')->implode(', ') ?? "" }}
                                                          </td>
                                                          <th scope="row">Brief About Company : </th>
                                                          <td>
                                                              {{ @$supplier->company_full_desc ?? "" }}
                                                          </td>
                                                      </tr>
                                                      
                                                      <tr>
                                                          <th scope="row">Core business offerings and specialization : </th>
                                                          <td>
                                                              <ol>
                                                                  @if(!empty($supplier->business_offering_one))
                                                                  <li>{{$supplier->business_offering_one}}</li>
                                                                  @endif
                                                                  @if(!empty($supplier->business_offering_two))
                                                                  <li>{{$supplier->business_offering_two}}</li>
                                                                  @endif
                                                                  @if(!empty($supplier->business_offering_three))
                                                                  <li>{{$supplier->business_offering_three}}</li>
                                                                  @endif
                                                                  @if(!empty($supplier->business_offering_four))
                                                                  <li>{{$supplier->business_offering_four}}</li>
                                                                  @endif
                                                              </ol>
                                                          </td>
                                                          
                                                          <th scope="row">Online Channels : </th>
                                                          <td>
                                                              <ol>
                                                                  @if(!empty($supplier->biz_website))
                                                                  <li><a href="{{$supplier->biz_website}}" target="_blank">Website Link</a></li>
                                                                  @endif
                                                                  @if(!empty($supplier->linkedin_url))
                                                                  <li><a href="{{$supplier->linkedin_url}}" target="_blank">Linkedin URL</a></li>
                                                                  @endif
                                                                  @if(!empty($supplier->instagram_url))
                                                                  <li><a href="{{$supplier->instagram_url}}" target="_blank">Instagram URL </a></li>
                                                                  @endif
                                                                  @if(!empty($supplier->facebook_url))
                                                                  <li><a href="{{$supplier->facebook_url}}" target="_blank">Facebook URL</a></li>
                                                                  @endif
                                                              </ol>
                                                          </td>
                                                      </tr>
                                                    
                                                      
                                                      <tr>
                                                          <th scope="row">Quality Certificates</th>
                                                          <td>
                                                             {{ $qualifications ?? "" }} 
                                                          </td>
                                                          
                                                          <th scope="row">Sustainability Certificates</th>
                                                          <td>
                                                             {{ $sustainabilities ?? "" }} 
                                                          </td>
                                                          
                                                      </tr>
                                                      <tr>
                                                         <th scope="row">Other Certificates</th>
                                                          <td>
                                                             {{ $others_certifications ?? "" }} 
                                                          </td> 
                                                      </tr>

                                                  </tbody>
                                              </table>
                                              
                                              
                                              <table class="table table-striped">
                                                  <tbody>
                                                      <tr><th class="text-success" scope="row" colspan="4">References</th></tr>
                                                      <tr>
                                                          
                                                          <th scope="row"># </th>
                                                          <th scope="row">Cliant Name </th>
                                                          <th scope="row">Client Location </th>
                                                          <th scope="row">Testimonial </th>
                                                       
                                                      </tr>
                                                      
                                                        @foreach ($clientTestimonials as $key =>  $value)
                                                           <tr>
                                                              <th scope="row">{{ $key+1 }}</th>
                                                              <td>
                                                              Name :  {{$value->client_name}} <br>
                                                              @if(!empty($value->catelogue))
                                                                 View Catalogue : <a href="{{ !empty($value->catelogue) ? asset('uploads/supplier/catelogue/' . $value->catelogue) : '#' }}" target="_blank">
                                                                 <span class="text-primary">View</span>
                                                                 </a>
                                                              @endif
                                                              </td>
                                                              <td>{{@$value->getClientCountry->name}},{{$value->client_city}}</td>
                                                              <td>{{$value->testimonial}}</td>
                                                           </tr>
                                                        @endforeach
                                                  </tbody>
                                              </table>
                                          </div> 

                                          <!--  Point Of Sales -->
                                          <div class="row mt-30">
                                              <h5 class="mb-0 text-danger">
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                                      <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                      <circle cx="12" cy="7" r="4"></circle>
                                                  </svg>
                                                  Point Of Sales
                                              </h5>
                                              <div class="col-md-12">
                                                  <hr>
                                              </div>
                                              <div class="clearfix"></div>
                                              <table class="table table-striped">
                                                  <tbody>
                                                      <tr><th class="text-success" scope="row" colspan="4">Service Location</th></tr>
                                                      <tr>
                                                          <th scope="row">Selling Scope : </th>
                                                          <td> {{ @$supplier->selling_scope }}</td>
                                                          <th>Countries:</th>
                                                          <td> {{ @$supplier->suppllierCountries()->pluck('name')->implode(', ') }}</td>
                                                      </tr>
                                                      
                                                      <tr>
                                                          <th scope="row">Target Customer: </th>
                                                          <td  colspan="4"> {{ @$supplier->suppllierDescribedSeller()->pluck('dropdown_value')->implode(', ') ?? "" }}</td>

                                                      </tr>
                                                      
                                      
                                                  </tbody>
                                              </table>
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
  <script>
    window.addEventListener('DOMContentLoaded', (event) => {
      localStorage.setItem('stateId', $('.biz-state').select2().val());
    });
  </script>
  <script>
    function copyBizAddressToOffice(e) {
      let bizCompanyName = document.querySelector('.biz-company').value;
      let bizAddress = document.querySelector('.biz-address').value;
      let bizCountry = document.querySelector('.biz-country').value;
      let bizState = document.querySelector('.biz-state').value;
      let bizCity = document.querySelector('.biz-city').value;
      let bizZip = document.querySelector('.biz-zip').value;
      if (e.checked) {
        document.querySelector('.office-company').value = bizCompanyName;
        document.querySelector('.office-address').value = bizAddress;
        document.querySelector('.office-country').value = bizCountry;
        let element = document.querySelector('.office-country');
        element.onchange();
        document.querySelector('.office-city').value = bizCity;
        document.querySelector('.office-zip').value = bizZip;
      } else {
        document.querySelector('.office-company').value = '';
        document.querySelector('.office-address').value = '';
        document.querySelector('.office-country').value = '';
        document.querySelector('.office-state').value = '';
        document.querySelector('.office-city').value = '';
        document.querySelector('.office-zip').value = '';
      }
      setTimeout(setState, 1200);
      $('.office-country').select2({
        width: '100%',
        dropdownCssClass: "max-z-index",
        allowClear: true,
        placeholder: 'Select',
      });
    }

    function setState() {
      if (localStorage.getItem('stateId') === null) {
        document.querySelector('.office-state').value = bizState;
      } else {
        document.querySelector('.office-state').value = localStorage.getItem('stateId');
      }
      $('.office-state').select2({
        width: '100%',
        dropdownCssClass: "max-z-index",
        allowClear: true,
        placeholder: 'Select',
      });
    }
  </script>
@endsection
