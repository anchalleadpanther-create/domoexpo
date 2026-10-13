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

 <link rel="stylesheet" href="https://christianbayer.github.io/image-uploader/dist/image-uploader.min.css">

<!-- Main Container -->
<div class="container">
   <div class="row justify-content-center">
      <div class="col-lg-7 offset-lg-2">
         <div class="ps-section__right">
            <div class="ps-form__header mb-5">
               <h2> Get ready to sell</h2>
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
                                        <form id="msform" action="{{ route('seller.products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                           <input type="hidden" name="seller_id" id="" value="{{auth()->guard('vendor')->user()->id}}">
                                            <div class="progress mx-auto" style="width:95%">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div> <br> <!-- fieldsets -->
                                           

                                            <!-- Product Basic Detail FielsSets -->
                                            <fieldset class="col-sm-12">
                                                <div class="form-card">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-7">
                                                            <h4 class="mb-4 login_heading">Product Basic Detail</h4>
                                                        </div>
                                                        <div class="col-5">
                                                            <h2 class="steps"></h2>
                                                        </div>
                                                    </div> 
                                                    
                                                    <div class="row">
                                                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Product Short name :*</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <input class="form-control"  name="name" value="{{ $product->name }}"
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
                                                                <textarea class="form-control" name="description">{{ $product->description }}</textarea>
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
                                                                <input type="text" class="form-control" name="sku" value="{{ $product->sku }}"
                                                                    placeholder="Product SKU" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <!--<div class="row">-->
                                                    <!--    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">-->
                                                    <!--        <div class="form-group mb-2">-->
                                                    <!--            <label class="mb-0 mt-4">Image:</label>-->
                                                    <!--        </div>-->
                                                    <!--    </div>-->
                                                    <!--    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">-->
                                                    <!--        <div class="form-group mb-4">-->
                                                    <!--            <img src="{{(!$product->images->isEmpty() ? asset('uploads/products/' . $product->images[0]->image) : asset('allUsers/no-image.png'))}}" class="img_wrapper">-->
                                                    <!--        </div>-->
                                                    <!--    </div>-->
                                                    <!--</div>-->

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
                                                            <div class="form-group mb-4 input-images">
                                                                <div class="product-images"></div>
                                                                <!--<input class="form-control " type="file" name="product_images[]" -->
                                                                <!--        accept="image/jpeg, image/jpg" multiple>-->
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Product Specifications (Type field):</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <textarea class="form-control"  name="product_specification">{{$product->product_specification}}</textarea>
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
                                                                <input class="form-control" type="text" name="search_keywords" value="{{$product->search_keywords}}" placeholder="">
                                                            </div>
                                                        </div>   
                                                    </div>
                                                </div>
                                                <input type="button" name="next" class="next action-button ps-btn--sm blue-bg res-w100" value="Next" /> 
                                                <input type="button" name="previous" class="previous action-button-previous ps-btn--sm blue-bg res-w100" value="Previous" />
                                           
                                           
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
                                                                            <option value="{{$value->dropdown_value}}" {{$product->selling_unit == $value->dropdown_value ? "selected" : ""}}>{{$value->dropdown_value}} </option>
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
                                                                <input class="form-control" type="number" name="quantity" value="{{$product->quantity}}" placeholder="">
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
                                                                            <option value="{{$value->dropdown_value}}"  {{$product->packing_type == $value->dropdown_value ? "selected" : ""}}>{{$value->dropdown_value}} </option>
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
                                                                            <option value="{{$value->dropdown_value}}"  {{$product->selling_volume == $value->dropdown_value ? "selected" : ""}}>{{$value->dropdown_value}} </option>
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
                                                                            <option value="{{$value->dropdown_value}}"   {{$product->packaging_base_unit == $value->dropdown_value ? "selected" : ""}}>{{$value->dropdown_value}} </option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                
                                                <input type="button" name="next" class="next action-button ps-btn--sm blue-bg res-w100" value="Next" /> 
                                                <input type="button" name="previous" class="previous action-button-previous ps-btn--sm blue-bg res-w100" value="Previous" />
                                           
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
                                                                        <option value="{{$value->id}}" {{$product->type_value_id_3 == $value->id ? "selected" : ""}}>{{$value->type_value}}</option>
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
                                                                        <option value="{{$value->id}}"  {{$product->type_value_id_2 == $value->id ? "selected" : ""}}>{{$value->type_value}}</option>
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
                                                                        <option value="{{$value->id}}"  {{$product->type_value_id_1 == $value->id ? "selected" : ""}}>{{$value->type_value}}</option>
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
                                                                    <option value="1"  {{$product->is_customizable == 1 ? "selected" : ""}}>Yes</option>
                                                                    <option value="0" {{$product->is_customizable == 0 ? "selected" : ""}}>No</option>
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
                                                                                <input class="form-control" type="checkbox"  value="{{$value->dropdown_value}}" id="services{{$value->dropdown_value}}"
                                                                                 {{in_array($value->dropdown_value,explode(',',$product->product_labels)) ? "checked" : ""}} name="product_label[]">
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
                                                <input type="button" name="next" class="next action-button ps-btn--sm blue-bg res-w100" value="Next" />
                                                <input type="button" name="previous" class="previous action-button-previous ps-btn--sm blue-bg res-w100" value="Previous" />

                                            </fieldset>


                                            <!--  -->

                                            <!-- Choose Products Price -->
                                            <fieldset class="col-sm-12">
                                                <div class="form-card">
                                                    <div class="row">
                                                         <div class="col-12 col-sm-7">
                                                            <h4 class="mb-4 login_heading">Product Price & Warranty & Returns</h4>
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
                                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
                                                            <div class="row">
                                                                <div class="col-sm-4 ">
                                                                    <div class="form-group mb-4">
                                                                        <input class="form-control" value="{{$product->rrp}}" onkeyup="calculateDiscount(this),calculateGST(e)" type="number" min="0" step="0.01" name="rrp[]" placeholder="Enter Price">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 ">
                                                                    <div class="form-group mb-4">
                                                                        <input class="form-control"  value="{{$product->discount}}" onkeyup="calculateDiscount(this)" type="number" min="0" step="0.01" name="discount[]" placeholder="Discount %">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 ">
                                                                    <div class="form-group mb-4">
                                                                        <input class="form-control" type="number"  value="{{$product->price_unit}}"  min="0" step="0.01" name="price_unit[]" placeholder="Unit Price" readonly>
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
                                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
                                                            <div class="row">
                                                                <div class="col-sm-3 ">
                                                                    <div class="form-group mb-4">
                                                                        <input class="form-control" name="gst" value="{{$product->gst}}"  type="text" placeholder="0" onkeyup="calculateGST(this)">
                                                                    </div>
                                                                </div>
                                                                <div class="col-auto pt-3">%</div>
                                                                <div class="col-sm-3 ">
                                                                    <div class="form-group mb-4">
                                                                        <input class="form-control" type="text" name="gst_value" value="{{$product->gst_value}}" placeholder="0" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-auto pt-3">Amount</div>
                                                            </div>
                                                        </div>

                                                    </div>


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
                                                                            <option value="{{$value->dropdown_value}}"  {{$product->return_policy == $value->dropdown_value ? "selected" : ""}}>{{$value->dropdown_value}} </option>
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
                                                                <textarea class="form-control" type="text" name="return_description" placeholder="">{{$product->return_description}}</textarea>
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
                                                                <textarea class="form-control" name="return_conditions">{{$product->return_conditions}}</textarea>
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
                                                                    <input class="" type="radio" name="is_replacement" value="1"  {{$product->is_replacement == 1 ? "checked" : ""}} id="replacement_yes" placeholder="">
                                                                    <label for="replacement_yes">Yes</label>
                                                                </div>
                                                                <div class="form-group  mx-4  mb-4">
                                                                    <input class="" type="radio" name="is_replacement" value="0" {{$product->is_replacement == 0 ? "checked" : ""}} id="replacement_no"  placeholder="">
                                                                    <label for="replacement_no">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Refund :</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 ">
                                                            <div class="row">
                                                                <div class="form-group mx-4 mb-4">
                                                                    <input class="" type="radio" name="is_refund" value="1" {{$product->is_refund == 1 ? "checked" : ""}} id="refund_yes" placeholder="">
                                                                    <label for="refund_yes">Yes</label>
                                                                </div>
                                                                <div class="form-group  mx-4 mb-4">
                                                                    <input class="" type="radio" name="is_refund" value="0"  {{$product->is_refund == 0 ? "checked" : ""}} id="refund_no"  placeholder="">
                                                                    <label for="refund_no">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                     </div>

                                                    
                                                        
                                                    <div class="row">
                                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Lead Time :</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <input class="form-control" type="text" name="lead_time" placeholder="" value="{{$product->lead_time}}">
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
                                                                <input class="form-control" type="text" name="moq"  value="{{$product->moq}}" placeholder="">
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
                                                                                <option value="0"  {{$product->warranty == 0 ? "selected" : "" }} >No</option>
                                                                                <option value="1"  {{$product->warranty == 1 ? "selected" : "" }}>Yes</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-4">
                                                                <input class="form-control" type="text" name="warranty_terms" value="{{ $product->warranty_terms }}" placeholder="Enter warranty details">
                                                            </div>
                                                        </div>
                                                    </div>
                                                        
                                                    </div> 
                                                <input type="submit" name="Submit" class=" action-button ps-btn--sm blue-bg res-w100" value="Submit" /> 
                                                <input type="button" name="previous" class="previous action-button-previous ps-btn--sm blue-bg res-w100" value="Previous" />
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
@php
    $preloaded = [];
    foreach ($product->images as $image) {
        $preloaded[] = [
            'id' => $image->id,
            'src' => asset('uploads/products/' . $image->image)  // Full image path
        ];
    }
@endphp


<!-- <script src="js/main.js"></script> -->

<script type="text/javascript" src="https://christianbayer.github.io/image-uploader/dist/image-uploader.min.js"></script>

<script>

   $(document).ready(function(){
    // Convert PHP preloaded array to a JSON format that JS can read
    let preloaded = @json($preloaded);
    
    // Initialize the image uploader with preloaded images
    $('.product-images').imageUploader({
        preloaded: preloaded,
        imagesInputName: 'product_images',    // Name for new images
        preloadedInputName: 'old',            // Name for preloaded images (existing)
        maxSize: 2 * 1024 * 1024,             // Max file size: 2MB
        maxFiles: 6                           // Max number of files: 6
    });
});





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
    $(document).ready(function(){

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            var current = 1;
            var steps = $("fieldset").length;

            setProgressBar(current);

    $(".next").click(function(){

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        // //Add Class Active
        // $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
        step: function(now) {
        // for making fielset appear animation
        opacity = 1 - now;

        current_fs.css({
        'display': 'none',
        'position': 'relative'
        });
        next_fs.css({'opacity': opacity});
        },
        duration: 500
        });
        setProgressBar(++current);
    });

$(".previous").click(function(){

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //Remove class active
            // $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();

            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
            step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;

            current_fs.css({
            'display': 'none',
            'position': 'relative'
            });
            previous_fs.css({'opacity': opacity});
            },
            duration: 500
            });
            setProgressBar(--current);
            });

            function setProgressBar(curStep){
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar")
            .css("width",percent+"%")
            }

            $(".submit").click(function(){
            return false;
            })

});
</script>
      

@endsection