@extends('customer.partials-fn.seller.header')
@section('content')

<style>

#heading {
    text-transform: uppercase;
    color: #673AB7;
    font-weight: normal
}

#msform {
    text-align: center;
    position: relative;
    margin-top: 20px
}

#msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;
    position: relative
}

.form-card {
    text-align: left
}

#msform fieldset:not(:first-of-type) {
    display: none
}



#msform .action-button {
    width: 100px;
    background: #673AB7;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 0px 10px 5px;
    float: right
} 
 #msform .action-button:hover,
#msform .action-button:focus {
    background-color: #311B92
}

#msform .action-button-previous {
    width: 100px;
    background: #616161;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px 10px 0px;
    float: right
}

#msform .action-button-previous:hover,
#msform .action-button-previous:focus {
    background-color: #000000
}

.card {
    z-index: 0;
    border: none;
    position: relative
}

.fs-title {
    font-size: 25px;
    color: #673AB7;
    margin-bottom: 15px;
    font-weight: normal;
    text-align: left
}

.purple-text {
    color: #673AB7;
    font-weight: normal
}

.steps {
    font-size: 25px;
    color: gray;
    margin-bottom: 10px;
    font-weight: normal;
    text-align: right
}

.fieldlabels {
    color: gray;
    text-align: left
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey
}

#progressbar .active {
    color: #673AB7
}

#progressbar li {
    list-style-type: none;
    font-size: 15px;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400
}

#progressbar #account:before {
    font-family: FontAwesome;
    content: "\f13e"
}

#progressbar #personal:before {
    font-family: FontAwesome;
    content: "\f007"
}

#progressbar #payment:before {
    font-family: FontAwesome;
    content: "\f030"
}

#progressbar #confirm:before {
    font-family: FontAwesome;
    content: "\f00c"
}

#progressbar li:before {
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    color: #ffffff;
    background: lightgray;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: lightgray;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #673AB7
}

.progress {
    height: 10px
}

.progress-bar {
    background-color: #673AB7
}

.fit-image {
    width: 100%;
    object-fit: cover
}
</style>
<!-- Main Container -->
<div class="container">
   <div class="row justify-content-center">
      <div class="col-lg-7 offset-lg-2">
         <div class="ps-section__right">
            <div class="ps-form__header mb-5">
               <h2> Add Product</h2>
               <p>Here’s a guide to get started. As your business grows, you’ll get fresh tips and insights here.</p>
            </div>
            <!--PEN CONTENT  -->
            <div class="content">
                <!--content inner-->
                <div class="content__inner">
                    
                    <div class="container-fluid ">
                        <!--multisteps-form-->
                            <div class="row justify-content-center">
                                <div class="col-12 col-sm-10 col-md-10 col-lg-12 col-xl-12 text-center p-0 mt-3 mb-2">
                                    <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                                       
                                        <form id="msform"  action="{{ route('seller.products.store') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                           <input type="hidden" name="seller_id" id="" value="{{auth()->guard('vendor')->user()->id}}">
                                            <div class="progress mx-auto" style="width:95%">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div> <br> <!-- fieldsets -->
                                            <!-- Choose Category FielsSets -->
                                            <fieldset class="col-sm-12">
                                                <div class="form-card">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-7">
                                                            <h4 class="mb-4 login_heading">Choose Category</h4>
                                                        </div>
                                                        
                                                    </div> 
                                                    
                                                        <div class="row">
                                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                                                <div class="form-group mb-2">
                                                                    <label class="mb-0 mt-4">Root Category:</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                                                <div class="form-group mb-4">
                                                                    <select class="form-control category" name="category[]" data-type='sub-category' onchange="getMoreCategories(this)" required>
                                                                        <option value="">Select category</option>
                                                                        @foreach (getCategories() as $category)
                                                                            <option value="{{ $category->id }}">{{$category->category_name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                        <div class="row sub-categories"></div> 
                                                        <div class="row sub-sub-categories"></div> 
                                                        <div class="row sub-sub-sub-categories"></div> 
                                                        <div class="row sub-sub-sub-sub-categories"></div> 
                                                    </div> 
                                                <input type="button" name="next" class="next action-button ps-btn ps-btn--sm blue-bg res-w100" value="Next" />
                                            </fieldset>

                                            <!-- Product Basic Detail FielsSets -->
                                            <fieldset class="col-sm-12">
                                                <div class="form-card">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-7">
                                                             <h4 class="mb-4 login_heading">Add Basic Product info</h4>
                                                        </div>
                                                        <div class="col-5">
                                                            <h2 class="steps"></h2>
                                                        </div>
                                                    </div> 
                                                    
                                                    <div class="row">
                                                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Product Short name:*</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <input class="form-control"  name="name" value="{{ old('name') }}"
                                                                    placeholder="Product Title" required maxlength="200">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Full Product Description :*</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <textarea class="form-control"  name="description"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Seller SKU Code :*</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <input type="text" class="form-control" name="sku" value="{{ old('sku') }}"
                                                                    placeholder="Product SKU" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="row">
                                                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Brand:</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <select class="form-control" name="brand_id">
                                                                    <option value="">select </option>
                                                                    @foreach ($brands as $value)
                                                                        <option value="{{$value->id}}">{{$value->brand_name}} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Country Of Origin:</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <select class="form-control" name="country_of_origin">
                                                                    <option value="">select </option>
                                                                    @foreach (getCountries() as $value)
                                                                      <option value="{{$value->id}}" {{old('country_of_origin') == $value->id ? "selected" : ""}}>{{ $value->name }}</option>
                                                                   @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- <div class="row">
                                                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Youtube URL:</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <input class="form-control" type="url" placeholder="http://www.example.com" class="form-control"
                                                                name="youtube_url" value="{{ old('youtube_url') }}" maxlength="500">
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    
                                                    <div class="row">
                                                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-0">Product image (upto 6) <br>First image will be Main Image (only jpg,jpeg files allowed):<br>
                                                                    Image Size Should be less then 1 MB<br>
                                                                    <span style="color:red">Image Dimension should be 900X900</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <input class="form-control product-images" type="file" name="product_images[]" 
                                                                        accept="image/jpeg, image/jpg" multiple>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="row">
                                                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Product image (upto 5):</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <img src="{{ asset('allUsers/image-icon.png') }}" class="img_wrapper">
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                  
                                                    <div class="row">
                                                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Product Specifications:</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <textarea class="form-control"  name="product_specification"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-0">Upload Specification Document :<br>
                                                                    <span style="color:red">PDF Size Should be less then 1 MB</span></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <input class="form-control" type="file" name="specification_document_file" 
                                                                accept="pdf, doc, image/jpeg, image/jpg">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Search Keywords (Separated By Comma) :</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <input class="form-control" type="text" name="search_keywords" placeholder="Type the keywords to optimize search engines">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="button" name="next" class="next action-button ps-btn ps-btn--sm blue-bg res-w100" value="Next" /> 
                                                <input type="button" name="previous" class="previous action-button-previous ps-btn ps-btn--sm blue-bg res-w100" value="Previous" />
                                           
                                           
                                            </fieldset>

                                             <!-- Product Packaging FielsSets -->
                                             <fieldset class="col-sm-12">
                                                <div class="form-card">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-7">
                                                           <h4 class="mb-4 login_heading">Add Product Packaging</h4>
                                                        </div>
                                                        <div class="col-5">
                                                            <h2 class="steps"></h2>
                                                        </div>
                                                    </div> 

                                                    <div class="row">
                                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Selling Unit:</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <select class="form-control" name="selling_unit">
                                                                    <option value="">select </option>
                                                                    @foreach (getDropdowns("Selling Unit")->dropdownValues as $value)
                                                                        @if($value->displayflag == 1)
                                                                            <option value="{{$value->dropdown_value}}">{{$value->dropdown_value}} </option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                   
                                                    <div class="row">
                                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Quantity:</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <input class="form-control" type="number" name="quantity" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>   
                                                    <div class="row">
                                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Packing Type:</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <select class="form-control" name="packing_type">
                                                                    <option value="">select </option>
                                                                    @foreach (getDropdowns("Packing Type")->dropdownValues as $value)
                                                                        @if($value->displayflag == 1)
                                                                            <option value="{{$value->dropdown_value}}">{{$value->dropdown_value}} </option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Selling Volume :</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <select class="form-control" name="selling_volume">
                                                                    <option value="">select </option>
                                                                    @foreach (getDropdowns("Volume")->dropdownValues as $value)
                                                                        @if($value->displayflag == 1)
                                                                            <option value="{{$value->dropdown_value}}">{{$value->dropdown_value}} </option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Base Unit:</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <select class="form-control" name="packaging_base_unit">
                                                                    <option value="">select </option>
                                                                    @foreach (getDropdowns("Base Unit")->dropdownValues as $value)
                                                                        @if($value->displayflag == 1)
                                                                            <option value="{{$value->dropdown_value}}">{{$value->dropdown_value}} </option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                
                                                <input type="button" name="next" class="next action-button ps-btn ps-btn--sm blue-bg res-w100" value="Next" /> 
                                                <input type="button" name="previous" class="previous action-button-previous ps-btn ps-btn--sm blue-bg res-w100" value="Previous" />
                                           
                                            </fieldset>

                                            <!-- Choose Add Product Attributes -->
                                            <fieldset class="col-sm-12">
                                                <div class="form-card">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-7">
                                                             <h4 class="mb-4 login_heading">Add Product Attributes</h4>
                                                        </div>
                                                        <div class="col-5">
                                                        </div>
                                                    </div> 

                                                    <div class="row">
                                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Material :</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <select class="form-select" name="type_value_id2[]" id="material">
                                                                    @foreach($materials as $key => $value)
                                                                        <option value="{{$value->id}}">{{$value->type_value}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Sizes :</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <select class="form-select" name="type_value_id1[]" id="sizes">
                                                                    @foreach($sizes as $key => $value)
                                                                        <option value="{{$value->id}}">{{$value->type_value}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Color :</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <select class="form-select" name="type_value_id0[]" id="">
                                                                    @foreach($colors as $key => $value)
                                                                        <option value="{{$value->id}}">{{$value->type_value}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Customizable :</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <select class="form-select" name="is_customizable" id="is_customizable">
                                                                    <option value="1">Yes</option>
                                                                    <option value="0">No</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Product Labels :</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 ">
                                                            <div class="row">
                                                            @foreach (getDropdowns("Products Label")->dropdownValues as $value)
                                                                @if($value->displayflag == 1)
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group mb-3 mt-3">
                                                                            <div class="ps-checkbox  ">
                                                                                <input class="form-control" type="checkbox"  value="{{$value->dropdown_value}}" id="services{{$value->dropdown_value}}" name="product_label[]">
                                                                                <label for="services{{$value->dropdown_value}}">{{$value->dropdown_value}}</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>   
                                                <input type="button" name="next" class="next action-button ps-btn ps-btn--sm blue-bg res-w100" value="Next" />
                                                <input type="button" name="previous" class="previous action-button-previous ps-btn ps-btn--sm blue-bg res-w100" value="Previous" />

                                            </fieldset>
                                            
                                            <!-- Choose Add Product Attributes -->
                                            <fieldset class="col-sm-12">
                                                <div class="form-card">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-7">
                                                           <h4 class="mb-4 login_heading">Product Pricing</h4>
                                                        </div>
                                                        <div class="col-5">
                                                        </div>
                                                    </div> 


                                                    <div class="row">
                                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-3">Suggested Price :</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                                                            
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group mb-4">
                                                                        <input class="form-control" onkeyup="calculateDiscount(this),calculateGST(e)" type="number" min="0" step="0.01" name="rrp[]" placeholder="Enter Price">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group mb-4">
                                                                        <input class="form-control" onkeyup="calculateDiscount(this)" type="number" min="0" step="0.01" name="discount[]" placeholder="Discount %">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group mb-4">
                                                                        <input class="form-control" type="number" min="0" step="0.01" name="price_unit[]" placeholder="Unit Price" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                             
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-3">VAT :</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <div class="form-group mb-4">
                                                                        <input class="form-control" name="gst" type="text" placeholder="5.00" onkeyup="calculateGST(this)">
                                                                    </div>
                                                                </div>
                                                                <div class="col-auto pt-3">%</div>
                                                                <div class="col-sm-3 ">
                                                                    <div class="form-group mb-4">
                                                                        <input class="form-control" type="text" placeholder="0" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-auto pt-3">Amount</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   


                                                    
                                                    </div>   
                                                <input type="button" name="next" class="next action-button ps-btn ps-btn--sm blue-bg res-w100" value="Next" />
                                                <input type="button" name="previous" class="previous action-button-previous ps-btn ps-btn--sm blue-bg res-w100" value="Previous" />

                                            </fieldset>

                                             <!-- Product Price & Warranty & Returns -->
                                            <fieldset class="col-sm-12">
                                                <div class="form-card">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-7">
                                                            <h4 class="mb-4 login_heading">Warranty & Returns</h4>
                                                        </div>
                                                        <div class="col-5">
                                                            <h2 class="steps"></h2>
                                                        </div>
                                                    </div> 

                                                    <!-- --------------------------- -->

                                                    <div class="row">
                                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Return Policy :</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <select class="form-control" name="return_policy">
                                                                    <option value="">select </option>
                                                                    @foreach (getDropdowns("Return Policy")->dropdownValues as $value)
                                                                        @if($value->displayflag == 1)
                                                                            <option value="{{$value->dropdown_value}}">{{$value->dropdown_value}} </option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Return Policy Descriptions:</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <textarea class="form-control" type="text" name="return_description" placeholder=""></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Exchange & Return Conditions:</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <textarea class="form-control" type="text" name="return_conditions" placeholder=""></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Replacement :</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 ">
                                                            <div class="row">
                                                                <div class="form-group  mx-4 mb-4">
                                                                    <input class="" type="radio" name="is_replacement" value="1" id="replacement_yes" placeholder="">
                                                                    <label for="replacement_yes">Yes</label>
                                                                </div>
                                                                <div class="form-group  mx-4  mb-4">
                                                                    <input class="" type="radio" name="is_replacement" value="0" id="replacement_no"  placeholder="">
                                                                    <label for="replacement_no">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--<div class="row">-->
                                                    <!--    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">-->
                                                    <!--        <div class="form-group mb-2">-->
                                                    <!--            <label class="mb-0 mt-4">Refund :</label>-->
                                                    <!--        </div>-->
                                                    <!--    </div>-->
                                                    <!--    <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 ">-->
                                                    <!--        <div class="row">-->
                                                    <!--            <div class="form-group mx-4 mb-4">-->
                                                    <!--                <input class="" type="radio" name="is_refund" value="1" id="refund_yes" placeholder="">-->
                                                    <!--                <label for="refund_yes">Yes</label>-->
                                                    <!--            </div>-->
                                                    <!--            <div class="form-group  mx-4 mb-4">-->
                                                    <!--                <input class="" type="radio" name="is_refund" value="0" id="refund_no"  placeholder="">-->
                                                    <!--                <label for="refund_no">No</label>-->
                                                    <!--            </div>-->
                                                    <!--        </div>-->
                                                    <!--    </div>-->
                                                    <!-- </div>-->

                                                    
                                                     <div class="row">
                                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Lead Time :</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <input class="form-control" type="text" name="lead_time" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">MOQ :</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <input class="form-control" type="text" name="moq" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Warranty :</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 ">
                                                                <div class="row mb-3">
                                                                    <div class="col-xl-8 col-lg-8">
                                                                        <div class="form-group mb-0">
                                                                            <div class="ps-radio ">
                                                                                <select class="form-select" name="warranty">
                                                                                    <option value="0">No</option>
                                                                                    <option value="1">Yes</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-4">
                                                                    <input class="form-control" type="text" name="warranty_terms" placeholder="Enter warranty details">
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <!-- ----------------------------- -->
                                                  
                                                </div> 
                                                
                                                <input type="submit" name="Submit" class=" action-button ps-btn ps-btn--sm blue-bg res-w100" value="Submit" /> 
                                                <input type="button" name="previous" class="previous action-button-previous ps-btn ps-btn--sm blue-bg res-w100" value="Previous" />
                                           
                                            </fieldset>
                                       
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
</div>
<!-- Main Container -->

<!-- <script src="js/main.js"></script> -->

<script>
    // this function gets and sets categories, brands, filters and options dynamically to the front end.
    function getMoreCategories(e) {
      let category_id = +e.value;
      let type = e.dataset.type;
      let setType;
      let mappedBrandTemplate = '';
      let brandTemplate = '';
      let parent_category_id = document.querySelector('.category').value;
      if (type === 'sub-category') {
        document.querySelector('.sub-sub-categories').innerHTML = '';
        document.querySelector('.sub-sub-sub-categories').innerHTML = '';
        document.querySelector('.sub-sub-sub-sub-categories').innerHTML = '';
        setType = 'sub-sub-category';
      }
      if (type === 'sub-sub-category') {
        document.querySelector('.sub-sub-sub-categories').innerHTML = '';
        document.querySelector('.sub-sub-sub-sub-categories').innerHTML = '';
        setType = 'sub-sub-sub-category';
      }
      if (type === 'sub-sub-sub-category') {
        document.querySelector('.sub-sub-sub-sub-categories').innerHTML = '';
        setType = 'sub-sub-sub-sub-category';
      }
      $.ajax({
        async: false,
        method: "get",
        url: route('get-categories-filters-and-product-types'),
        data: {
          category_id,
          parent_category_id
        },
        dataType: 'json',
        success: function(data) {
          let optionsTemplate = ``;

          data.data.categories.forEach(category => {
            optionsTemplate += `
                <option value="${ category.id }">${ category.category_name }</option>
              `;
          });

          let categoryTemplate = ``;
          if (data.data.categories.length > 0) {
            categoryTemplate = `<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                        <div class="form-group mb-2">
                                            <label class="mb-0 mt-4"> ${ type }:</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                        <div class="form-group mb-4">
                                            <select class="form-control" name="category[]" data-type="${ setType }"  onchange="getMoreCategories(this)" >
                                                <option value="">Select category</option>
                                                ${optionsTemplate}
                                            </select>
                                        </div>
                                    </div>`;

          }
          if (type === 'sub-category') {
            document.querySelector('.sub-categories').innerHTML = categoryTemplate;
          }
          if (type === 'sub-sub-category') {
            document.querySelector('.sub-sub-categories').innerHTML = categoryTemplate;
          }
          if (type === 'sub-sub-sub-category') {
            document.querySelector('.sub-sub-sub-categories').innerHTML = categoryTemplate;
          }
          if (type === 'sub-sub-sub-sub-category') {
            document.querySelector('.sub-sub-sub-sub-categories').innerHTML = categoryTemplate;
          }
        }

      }); 

    }



    function calculateDiscount(e) {
        // Get the price input field
        let priceInput = e.closest('.row').querySelector('input[name="rrp[]"]');
        let price = parseFloat(priceInput.value) || 0;

        // Get the discount input field
        let discountInput = e.closest('.row').querySelector('input[name="discount[]"]');
        let discount = parseFloat(discountInput.value) || 0;

        // Limit the discount value to 100%
        if (discount > 100) {
            discount = 100;
            discountInput.value = 100;
        }

        // Calculate the discounted amount
        let discountedAmount = price - (price * discount / 100);

        // Update the unit price field
        let discountedPriceInput = e.closest('.row').querySelector('input[name="price_unit[]"]');
        discountedPriceInput.value = discountedAmount.toFixed(2);
    }


    function calculateGST(e) {
    // Get the last RRP input value
    let rrps = document.querySelectorAll('input[name="rrp[]"]');
    let lastRrp = parseFloat(rrps[rrps.length - 1].value) || 0;

    // Get the GST percentage input field value
    let gstInput = document.querySelector('input[name="gst"]');
    let gstPercentage = parseFloat(gstInput.value) || 0;

    // Calculate the GST amount based on the last RRP input value
    let gstAmount = (gstPercentage / 100) * lastRrp;

    // Get the amount input field (the one to the right of the GST input)
    let amountInput = gstInput.closest('.row').querySelector('input[readonly]');

    // Set the calculated amount in the readonly input
    amountInput.value = gstAmount.toFixed(2);
}




</script>

<script>
$(document).ready(function() {

    var current_fs, next_fs, previous_fs; // Fieldsets
    var opacity;
    var current = 1; // Current step
    var steps = $("fieldset").length; // Total number of steps

    // Initialize the progress bar
    setProgressBar(current);

    // Next button click handler
    $(".next").click(function() {

        current_fs = $(this).parent(); // Current fieldset
        next_fs = $(this).parent().next(); // Next fieldset

        // Show the next fieldset
        next_fs.show();

        // Hide the current fieldset with a fade-out effect
        current_fs.animate({ opacity: 0 }, {
            step: function(now) {
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({ 'opacity': opacity });
            },
            duration: 500
        });

        // Update the progress bar
        setProgressBar(++current);
    });

    // Previous button click handler
    $(".previous").click(function() {

        current_fs = $(this).parent(); // Current fieldset
        previous_fs = $(this).parent().prev(); // Previous fieldset

        // Show the previous fieldset
        previous_fs.show();

        // Hide the current fieldset with a fade-out effect
        current_fs.animate({ opacity: 0 }, {
            step: function(now) {
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({ 'opacity': opacity });
            },
            duration: 500
        });

        // Update the progress bar
        setProgressBar(--current);
    });

    // Function to update the progress bar
    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar").css("width", percent + "%");
    }

    // Prevent form submission for demo purposes
    $(".submit").click(function() {
        return false;
    });

});

</script>
      

@endsection