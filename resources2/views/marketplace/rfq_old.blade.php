@extends('purchasync.partials.header')
@section('customerContent')
<main id="homepage-photo" class="seller_page">

    


    <section class="ps-home-share-work gap-pb50 why-sellSection">
        <div class="container">
            <h2 class="mb-5">Request for <span class="font-weight-bold blue-text">Quotations</span> </h2>
            <form action="{{route('save-rfq')}}" method="post" enctype="multipart/form-data" autocomplate="off">
                @csrf
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group mb-4">
                            <label class="mb-2">Name :</label>
                            <input class="form-control" name="name" value="{{  auth()->guard('buyer')->user()->first_name ? auth()->guard('buyer')->user()->first_name .' '. auth()->guard('buyer')->user()->last_name : old('name') }}" type="text" />
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group mb-4">
                            <label class="mb-2">Email Address :</label>
                            <input class="form-control" name="email" value="{{  auth()->guard('buyer')->user()->email ? auth()->guard('buyer')->user()->email  : old('email') }}" type="text" />
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group mb-4">
                            <label class="mb-2">Mobile No. :</label>
                            <input class="form-control" name="mobile" value="{{  auth()->guard('buyer')->user()->phone ? auth()->guard('buyer')->user()->phone  : old('mobile') }}" type="number" min="0" />
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group mb-4">
                            <label class="mb-2">Country :</label>
                            <select class="form-control" name="country_id" >
                                <option value="">Select Country</option>  
                                @foreach (getCountries() as $country)
                                    <option value="{{$country->id}}"  {{old('country_id') == $country->id ? 'selected' : ''}}>{{$country->name}}</option>  
                                @endforeach  
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group mb-4">
                            <label class="mb-2">Quotation Type :</label>
                            <select class="form-control" name="quotation_type" >
                                <option value="product" {{old('quotation_type') == "product" ? 'selected' : ''}}>product	</option>  
                                <option value="service" {{old('quotation_type') == "service" ? 'selected' : ''}}>service	</option>  
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group mb-4">
                            <label class="mb-2">Category :</label>
                            <select class="form-control category" name="category[]" data-type='sub-category' onchange="getMoreCategories(this)" >
                                <option value="">Select Category</option>  
                                @foreach (getCategories() as $category)
                                    <option value="{{$category->id}}"  {{old('category_id') == $category->id ? 'selected' : ''}}>{{$category->category_name}}</option>  
                                @endforeach 
                            </select>
                        </div>
                    </div>
                    
                    
                    <div class="col-sm-4 sub-categories"></div> 
                    <div class="col-sm-4 sub-sub-categories"></div> 
                    <div class="col-sm-4 sub-sub-sub-categories"></div> 
                    <div class="col-sm-4 sub-sub-sub-sub-categories"></div> 
                    
                    <div class="col-sm-12">
                        <div class="form-group mb-4">
                            <label class="mb-2">Requirement :</label>
                            <textarea class="form-control" rows="5" name="requirement">{{old('requirement')}}</textarea>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group mb-4">
                            <label class="mb-2">Quantity :</label>
                            <input type="number" min="0" name="quantity"  value="{{old('quantity')}}" class="form-control">
                        </div>
                    </div>
                

                    <div class="col-sm-4">
                        <div class="form-group mb-4">
                            <label class="mb-2">Upload RFQ :</label>
                            <input type="file" min="0" class="form-control" name="upload_rfq_file">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group mb-4">
                            <input type="submit" class="ps-btn " >
                        </div>
                    </div>

                    
                </div>
            </form>
        </div> <!-- row  -->
    </section>
</main>
<style>
    .header--standard .header__top,
    .header--standard .navigation,
    .header--standard .header__content-center,
    .header .header__extra {
        display: none;
    }

    body .header--standard .header__content {
        padding: 30px 0;
    }
</style>
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
            categoryTemplate = `<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <div class="form-group mb-2">
                                            <label class="mb-0 mt-4"> ${ type }:</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
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





    document.querySelector('select[name=quotation_type]').addEventListener('change', function(e) {
        let quotation_type = e.target.value;
        let categories = [];

        // Fetch categories based on quotation type
        if (quotation_type == 'service') {
            categories = {!! json_encode(getServiceCategories()) !!}; // Convert to JS array
        } else {
            categories = {!! json_encode(getCategories()) !!}; // Convert to JS array
        }

        // Get the target select element where options will be replaced
        let categorySelect = document.querySelector('select[name=category_id]');
        categorySelect.innerHTML = ''; // Clear existing options

        // Create new options and append to the category select element
        categories.forEach(function(category) {
            const newItem = document.createElement('option');
            newItem.value = category.id; // Assuming category has an 'id' field
            newItem.textContent = category.category_name; // Assuming category has a 'category_name' field
            categorySelect.appendChild(newItem); // Append the new option
        });

        // console.log(categories); // Log the categories to the console for debugging
    });
</script>


@endsection